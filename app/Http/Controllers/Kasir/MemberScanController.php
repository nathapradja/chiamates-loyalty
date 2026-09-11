<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberScanController extends Controller
{
    /**
     * Menampilkan halaman scan Member.
     */
    public function index(): View
    {
        return view('kasir.scan-member');
    }

    /**
     * Mencari Member berdasarkan QR Token.
     */
    public function find(Request $request)
    {
        $request->validate([
            'qr_token' => [
                'required',
                'string',
            ],
        ]);

        // Tambahkan trim() di sini untuk membersihkan spasi/enter otomatis dari scanner
        $query = trim($request->qr_token);

        $member = Member::with('user')
            ->where('qr_token', $query)
            ->orWhere('member_code', $query)
            ->first();

        if (! $member) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'QR Member tidak valid atau tidak terdaftar di sistem.',
                ], 404);
            }

            return view('kasir.scan-member', [
                'error' => 'QR Member tidak valid atau tidak ditemukan.',
            ]);
        }

        // Cek kedaluwarsa QR Token (jika query cocok dengan qr_token dinamis)
        if ($member->qr_token === $query && $member->qr_expires_at && $member->qr_expires_at->isPast()) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'QR Code member sudah kedaluwarsa (lebih dari 5 menit). Minta member untuk menekan "Perbarui QR".',
                ], 422);
            }
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'member' => [
                    'id' => $member->id,
                    'name' => $member->user->name ?? 'Member',
                    'member_code' => $member->member_code,
                    'phone' => $member->phone ?? '-',
                    'points' => $member->points ?? 0,
                ],
                'redirect_url' => route('kasir.transaction.input', ['member_id' => $member->id]),
            ]);
        }

        return view('kasir.scan-member', [
            'member' => $member,
        ]);
    }
}