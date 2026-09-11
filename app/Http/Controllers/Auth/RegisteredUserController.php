<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan halaman registrasi.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Memproses registrasi user baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Buat User
        |--------------------------------------------------------------------------
        */

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Buat Data Member
        |--------------------------------------------------------------------------
        |
        | Setiap user yang melakukan registrasi mandiri akan otomatis
        | mendapatkan data member dengan status 'pending' (menunggu approval kasir).
        |
        */

        $memberCode = 'CM-' . str_pad(\App\Models\Member::count() + 1, 6, '0', STR_PAD_LEFT);

        $user->member()->create([
            'member_code' => $memberCode,
            'qr_token' => (string) Str::uuid(),
            'qr_expires_at' => now()->addMinutes(5),
            'points' => 0, // <-- Diubah menjadi 0 (Tidak ada poin awal sebelum transaksi)
            'status' => 'pending', // <-- Diubah menjadi pending
        ]);

        /*
        |--------------------------------------------------------------------------
        | Login Otomatis
        |--------------------------------------------------------------------------
        */

        Auth::login($user);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()->route('dashboard');
    }
}