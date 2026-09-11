<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Reward;
use App\Models\RedeemHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::where('status', 'active')
            ->where(function($q) {
                $q->whereNull('end_date')->orWhere('end_date', '>=', now()->format('Y-m-d'));
            })
            ->latest()
            ->get();

        return view('member.rewards', compact('rewards'));
    }

    public function show($id)
    {
        $reward = Reward::findOrFail($id);
        return view('member.reward-detail', compact('reward'));
    }

    public function confirm($id)
    {
        $reward = Reward::findOrFail($id);
        $member = auth()->user()->member;

        return view('member.redeem-confirmation', compact('reward', 'member'));
    }

    /**
     * Checkout reward (Sistem Keranjang Multi-Item): menghasilkan 1 nomor resi dan QR code untuk BANYAK barang sekaligus.
     * Poin TIDAK langsung dipotong di sini. Poin baru terpotong saat kasir memprosesnya.
     */
    public function checkout(Request $request)
    {
        $member = auth()->user()->member;

        if (!$member) {
            return redirect()->back()->with('error', 'Data member tidak ditemukan.');
        }

        // Validasi input dari form checkbox dan quantity
        $request->validate([
            'selected_rewards' => 'required|array|min:1',
            'quantities'       => 'required|array',
        ], [
            'selected_rewards.required' => 'Pilih minimal satu reward yang ingin di-redeem.'
        ]);

        $totalPointsNeeded = 0;
        $itemsToCheckout = [];

        // 1. Validasi stok tiap barang yang dipilih dan hitung total poin
        foreach ($request->selected_rewards as $rewardId) {
            $qty = $request->quantities[$rewardId] ?? 1;
            if ($qty < 1) continue; 

            $reward = Reward::findOrFail($rewardId);

            if ($reward->stock < $qty) {
                return redirect()->back()->with('error', 'Stok reward ' . $reward->name . ' tidak mencukupi.');
            }

            $pointsUsed = $reward->points_required * $qty;
            $totalPointsNeeded += $pointsUsed;

            $itemsToCheckout[] = [
                'reward'      => $reward,
                'qty'         => $qty,
                'points_used' => $pointsUsed
            ];
        }

        // 2. Cek apakah total poin member cukup untuk SELURUH keranjang
        if ($member->points < $totalPointsNeeded) {
            return redirect()->back()->with('error', 'Poin Anda saat ini (' . $member->points . ' poin) tidak mencukupi untuk total penukaran (' . $totalPointsNeeded . ' poin).');
        }

        // 3. Generate 1 kode resi unik untuk seluruh keranjang belanja ini
        $redeemCode = 'RDM-' . now()->format('Ymd') . '-' . strtoupper(Str::random(5));
        $qrToken = (string) Str::uuid();

        // 4. Simpan ke database (berulang sesuai jumlah barang berbeda yang dipilih)
        foreach ($itemsToCheckout as $item) {
            RedeemHistory::create([
                'member_id'   => $member->id,
                'reward_id'   => $item['reward']->id,
                'quantity'    => $item['qty'], // Pastikan sudah membuat migration untuk kolom quantity ini
                'redeem_code' => $redeemCode,
                'qr_token'    => $qrToken,
                'expires_at'  => now()->addDays(7),
                'points_used' => $item['points_used'],
                'status'      => 'pending',
            ]);
        }

        return redirect()->route('member.reward.receipt', ['code' => $redeemCode])
            ->with('success', 'Checkout reward berhasil! Tunjukkan QR / No. Resi ini ke kasir.');
    }

    public function receipt($code)
    {
        $member = auth()->user()->member;
        
        // UBAH dari firstOrFail() menjadi get() karena 1 resi sekarang bisa memuat BANYAK barang
        $redeems = RedeemHistory::with('reward')
            ->where('redeem_code', $code)
            ->where('member_id', $member->id)
            ->get();

        if ($redeems->isEmpty()) {
            abort(404);
        }

        return view('member.redeem-receipt', compact('redeems', 'member', 'code'));
    }

    public function history()
    {
        $member = auth()->user()->member;
        $redeemHistories = RedeemHistory::with(['reward', 'kasir'])
            ->where('member_id', $member->id)
            ->latest()
            ->get();

        $totalRedeem = $redeemHistories->count();
        $totalPointsUsed = $redeemHistories->where('status', 'success')->sum('points_used');

        return view('member.redeem-history', compact('redeemHistories', 'totalRedeem', 'totalPointsUsed'));
    }
}