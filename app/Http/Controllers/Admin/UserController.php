<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('member')->latest();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->paginate(15)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:8|confirmed',
            'role'       => 'required|in:admin,kasir,member',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string',
            'gender'     => 'nullable|in:male,female',
            'birth_date' => 'nullable|date',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'],
        ]);

        if ($validated['role'] === 'member') {
            $code = 'MBR-' . strtoupper(substr(md5($user->id . time()), 0, 8));
            Member::create([
                'user_id'     => $user->id,
                'member_code' => $code,
                'phone'       => $validated['phone'] ?? null,
                'address'     => $validated['address'] ?? null,
                'gender'      => $validated['gender'] ?? null,
                'birth_date'  => $validated['birth_date'] ?? null,
                'points'      => 0,
                'status'      => 'active',
            ]);
        }

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        return redirect()->route('admin.users.edit', $user);
    }

    public function edit(User $user)
    {
        $user->load('member');
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password'   => 'nullable|string|min:8|confirmed',
            'role'       => 'required|in:admin,kasir,member',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string',
            'gender'     => 'nullable|in:male,female',
            'birth_date' => 'nullable|date',
        ]);

        $userData = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
            'role'  => $validated['role'],
        ];

        if (!empty($validated['password'])) {
            $userData['password'] = Hash::make($validated['password']);
        }

        $user->update($userData);

        if ($validated['role'] === 'member') {
            $memberData = [
                'phone'      => $validated['phone'] ?? null,
                'address'    => $validated['address'] ?? null,
                'gender'     => $validated['gender'] ?? null,
                'birth_date' => $validated['birth_date'] ?? null,
            ];
            if ($user->member) {
                $user->member->update($memberData);
            } else {
                $code = 'MBR-' . strtoupper(substr(md5($user->id . time()), 0, 8));
                Member::create(array_merge($memberData, [
                    'user_id'     => $user->id,
                    'member_code' => $code,
                    'points'      => 0,
                    'status'      => 'active',
                ]));
            }
        }

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
