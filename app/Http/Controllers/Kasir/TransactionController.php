<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\PointHistory;
use App\Models\RedeemHistory;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Verifikasi nomor resi redeem yang di-checkout customer
     */
    public function verifyResi($code)
    {
        // Ambil SEMUA barang di dalam keranjang resi (get, bukan first)
        $redeems = RedeemHistory::with(['reward', 'member.user'])
            ->where('redeem_code', $code)
            ->where('status', 'pending')
            ->get();

        if ($redeems->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor resi tidak ditemukan, sudah digunakan, atau sudah kedaluwarsa.',
            ], 404);
        }

        // --- TRIK DOMINO ---
        // Kita gabungkan data agar frontend JS lama tidak error
        $first = $redeems->first();
        $totalPointsUsed = $redeems->sum('points_used');
        
        // Format nama jadi string: "2x Tumbler, 1x Payung"
        $rewardNames = $redeems->map(function ($item) {
            $name = $item->reward->name ?? 'Reward Terhapus';
            return $item->quantity . 'x ' . $name;
        })->implode(', ');

        return response()->json([
            'success' => true,
            'redeem' => [
                'id' => $first->id,
                'code' => $first->redeem_code,
                'reward_name' => $rewardNames, // Mengirim teks gabungan
                'points_used' => $totalPointsUsed, // Mengirim total poin keseluruhan
                'member_id' => $first->member_id,
                'member_name' => $first->member->user->name ?? 'Member',
                'member_code' => $first->member->member_code ?? '-',
                'created_at' => $first->created_at->format('d M Y, H:i'),
            ]
        ]);
    }

    /**
     * Menyimpan transaksi kasir, perhitungan poin belanja, dan pemrosesan redeem/pengurangan poin
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'transaction_number' => 'required|unique:transactions,transaction_number',
            'transaction_type' => 'required|in:walk_in,ojol',
            'total' => 'required|numeric|min:0',
            'points' => 'required|integer|min:0',
            'redeem_option' => 'nullable|in:none,direct_point,resi_code,resi_scan',
            'direct_point_amount' => 'nullable|integer|min:0',
            'direct_discount_amount' => 'nullable|numeric|min:0',
            'redeem_code' => 'nullable|string',
        ]);

        $member = Member::with('user')
            ->where('id', $request->member_id)
            ->orWhere('member_code', $request->member_id)
            ->orWhere('phone', $request->member_id)
            ->first();

        if (!$member) {
            return response()->json(['success' => false, 'message' => 'Member tidak ditemukan'], 404);
        }

        try {
            DB::beginTransaction();

            $pointsEarned = (int) $request->points;
            $pointsRedeemed = 0;
            $discountAmount = 0;
            $redeemCodeUsed = null;
            $redeemRewardName = null;

            // Opsi 1: Pengurangan Poin Langsung (Diskon Belanja)
            if ($request->redeem_option === 'direct_point' && (int)$request->direct_point_amount > 0) {
                $pointsRedeemed = (int) $request->direct_point_amount;
                $discountAmount = (float) ($request->direct_discount_amount ?? 0);

                if ($member->points < $pointsRedeemed) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Poin member (' . $member->points . ' poin) tidak mencukupi untuk diskon ' . $pointsRedeemed . ' poin.',
                    ], 422);
                }

                // Potong saldo poin member
                $member->decrement('points', $pointsRedeemed);

                // Catat di Point History
                PointHistory::create([
                    'member_id' => $member->id,
                    'points' => $pointsRedeemed,
                    'type' => 'redeemed',
                    'description' => 'Penukaran poin untuk diskon belanja transaksi ' . $request->transaction_number,
                ]);
            }

            // Opsi 2 & 3: Klaim Resi Checkout Reward (Input No Resi atau Scan QR Resi)
            if (in_array($request->redeem_option, ['resi_code', 'resi_scan']) && !empty($request->redeem_code)) {
                
                // Ambil SEMUA barang (get)
                $redeems = RedeemHistory::with('reward')
                    ->where('redeem_code', $request->redeem_code)
                    ->where('status', 'pending')
                    ->get();

                if ($redeems->isEmpty()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Resi redeem ' . $request->redeem_code . ' tidak ditemukan atau sudah pernah diproses.',
                    ], 422);
                }

                $totalPointsUsed = $redeems->sum('points_used');

                if ($member->points < $totalPointsUsed) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Poin member saat ini (' . $member->points . ' poin) tidak mencukupi untuk klaim seluruh reward ini (' . $totalPointsUsed . ' poin).',
                    ], 422);
                }

                $pointsRedeemed = $totalPointsUsed;
                $redeemCodeUsed = $request->redeem_code;
                $rewardNamesArr = [];

                // Loop per-barang untuk potong stok
                foreach ($redeems as $redeemItem) {
                    $itemName = $redeemItem->reward->name ?? 'Reward';
                    $rewardNamesArr[] = $redeemItem->quantity . 'x ' . $itemName;

                    // Kurangi stok reward (Sesuai quantity/jumlah)
                    if ($redeemItem->reward && $redeemItem->reward->stock > 0) {
                        // Pastikan stok tidak minus
                        $newStock = max(0, $redeemItem->reward->stock - $redeemItem->quantity);
                        $redeemItem->reward->update(['stock' => $newStock]);
                    }

                    // Update status redeem history menjadi success
                    $redeemItem->update([
                        'status' => 'success',
                        'kasir_id' => auth()->id(),
                    ]);
                }

                $redeemRewardName = implode(', ', $rewardNamesArr);

                // Potong saldo poin member
                $member->decrement('points', $pointsRedeemed);

                // Catat point history pengurangan poin
                PointHistory::create([
                    'member_id' => $member->id,
                    'points' => $pointsRedeemed,
                    'type' => 'redeemed',
                    'description' => 'Klaim reward ' . $redeemRewardName . ' (Resi: ' . $redeemCodeUsed . ')',
                ]);
            }

            // Perolehan Poin dari Total Belanja
            if ($pointsEarned > 0) {
                $member->increment('points', $pointsEarned);
            }

            // Buat Data Transaksi
            $transaction = Transaction::create([
                'member_id' => $member->id,
                'kasir_id' => auth()->id(),
                'transaction_number' => $request->transaction_number,
                'total_amount' => $request->total,
                'type' => $request->transaction_type,
                'points_earned' => $pointsEarned,
                'points_redeemed' => $pointsRedeemed,
                'discount_amount' => $discountAmount,
                'redeem_code' => $redeemCodeUsed,
                'status' => 'success',
            ]);

            // Kaitkan transaction_id untuk SEMUA barang dalam resi
            if (isset($redeems) && $redeems->isNotEmpty()) {
                RedeemHistory::whereIn('id', $redeems->pluck('id'))->update(['transaction_id' => $transaction->id]);
            }

            // Buat history point earned
            if ($pointsEarned > 0) {
                PointHistory::create([
                    'member_id' => $member->id,
                    'points' => $pointsEarned,
                    'type' => 'earned',
                    'description' => 'Poin diperoleh dari transaksi ' . $request->transaction_number,
                    'transaction_id' => $transaction->id,
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Transaksi kasir berhasil disimpan dan diselesaikan!',
                'data' => [
                    'transaction_number' => $transaction->transaction_number,
                    'total_amount' => $transaction->total_amount,
                    'points_earned' => $transaction->points_earned,
                    'points_redeemed' => $transaction->points_redeemed,
                    'discount_amount' => $transaction->discount_amount,
                    'redeem_reward_name' => $redeemRewardName,
                    'member_name' => $member->user->name ?? 'Member',
                    'member_code' => $member->member_code,
                    'points_current' => $member->fresh()->points,
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan transaksi: ' . $e->getMessage()
            ], 500);
        }
    }
}