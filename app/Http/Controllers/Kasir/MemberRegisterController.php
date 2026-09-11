<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MemberRegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20|unique:members,phone', // Dibuat nullable mengikuti database
            'email' => 'nullable|email|unique:users,email',
            'gender' => 'nullable|in:male,female',
            'address' => 'nullable|string',
        ]);

        $email = $request->email ?: 'member_' . Str::random(10) . '@chiamates.test';

        $user = User::create([
            'name' => $request->name,
            'email' => $email,
            'password' => Hash::make('password123'), // Password default untuk pendaftaran via kasir
            'role' => 'member',
        ]);

        $memberCode = 'CM-' . str_pad(Member::count() + 1, 6, '0', STR_PAD_LEFT);

        $member = Member::create([
            'user_id' => $user->id,
            'member_code' => $memberCode,
            'phone' => $request->phone,
            'gender' => $request->gender, // Langsung ambil dari request yang sudah divalidasi
            'address' => $request->address,
            'points' => 0, // <-- Diubah menjadi 0
            'status' => 'active', // Status otomatis aktif
            'qr_token' => (string) Str::uuid(),
            'qr_expires_at' => now()->addMinutes(5),
        ]);

        return redirect()->route('kasir.members')->with('success', 'Member berhasil didaftarkan. ID Member: ' . $memberCode);
    }
}