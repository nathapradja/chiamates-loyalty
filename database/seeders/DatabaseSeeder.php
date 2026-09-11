<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin CHIAMATES',
            'email' => 'admin@chiamates.test',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        $kasir = User::create([
            'name' => 'Kasir CHIAMATES',
            'email' => 'kasir@chiamates.test',
            'password' => Hash::make('password123'),
            'role' => 'kasir',
        ]);

        $user = User::create([
            'name' => 'Member CHIAMATES',
            'email' => 'member@chiamates.test',
            'password' => Hash::make('password123'),
            'role' => 'member',
        ]);

        \App\Models\Member::create([
            'user_id' => $user->id,
            'member_code' => 'CM-000001',
            'qr_token' => \Illuminate\Support\Str::uuid(),
            'qr_expires_at' => now()->addMinutes(5),
            'phone' => '085871746229',
            'address' => 'Jl. Salad Day No. 10',
            'birth_date' => '2005-08-15',
            'gender' => 'male',
            'points' => 128,
            'status' => 'active',
        ]);
    }
}