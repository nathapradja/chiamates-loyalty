@extends('admin.layouts.app')

@section('title', 'Edit Pengguna')

@section('content')

<style>
    .form-card { max-width: 650px; margin: 0 auto; background: #fff; border: 1px solid #e1eadb; border-radius: 18px; padding: 28px; }
    .form-group { margin-bottom: 18px; }
    .form-label { display: block; margin-bottom: 6px; font-size: 13px; font-weight: 700; color: #29422d; }
    .form-control { width: 100%; padding: 11px 14px; border: 1px solid #dce5d7; border-radius: 10px; font-size: 13px; outline: none; box-sizing: border-box; }
</style>

<div class="form-card">
    <h2 style="font-size:22px; font-weight:800; color:#18351c; margin-bottom:20px;">Edit Pengguna</h2>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Nama Lengkap *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">Email *</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
            <div class="form-group">
                <label class="form-label">Password Baru (Kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control" minlength="8">
            </div>
            <div class="form-group">
                <label class="form-label">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="form-control" minlength="8">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Role Pengguna *</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
                <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
            </select>
        </div>

        <div style="margin-top:24px; display:flex; gap:10px;">
            <button type="submit" style="padding:12px 24px; background:#65ad20; color:#fff; border:none; border-radius:10px; font-weight:800; cursor:pointer;">Perbarui Pengguna</button>
            <a href="{{ route('admin.users.index') }}" style="padding:12px 20px; border:1px solid #dce5d7; border-radius:10px; color:#74806e; text-decoration:none; font-size:13px; font-weight:700;">Batal</a>
        </div>
    </form>
</div>

@endsection
