@extends('admin.layouts.app')

@section('title', 'Tambah Pengguna Baru')

@section('content')

<style>
    .form-card { max-width: 650px; margin: 0 auto; background: #fff; border: 1px solid #e1eadb; border-radius: 18px; padding: 28px; }
    .form-group { margin-bottom: 18px; }
    .form-label { display: block; margin-bottom: 6px; font-size: 13px; font-weight: 700; color: #29422d; }
    .form-control { width: 100%; padding: 11px 14px; border: 1px solid #dce5d7; border-radius: 10px; font-size: 13px; outline: none; box-sizing: border-box; }
</style>

<div class="form-card">
    <h2 style="font-size:22px; font-weight:800; color:#18351c; margin-bottom:20px;">Tambah Pengguna Baru</h2>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="form-group">
            <label class="form-label">Nama Lengkap *</label>
            <input type="text" name="name" class="form-control" required placeholder="Nama user">
        </div>

        <div class="form-group">
            <label class="form-label">Email *</label>
            <input type="email" name="email" class="form-control" required placeholder="user@chiamates.test">
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
            <div class="form-group">
                <label class="form-label">Password *</label>
                <input type="password" name="password" class="form-control" required minlength="8">
            </div>
            <div class="form-group">
                <label class="form-label">Konfirmasi Password *</label>
                <input type="password" name="password_confirmation" class="form-control" required minlength="8">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Role Pengguna *</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
                <option value="member">Member</option>
            </select>
        </div>

        <div style="margin-top:24px; display:flex; gap:10px;">
            <button type="submit" style="padding:12px 24px; background:#65ad20; color:#fff; border:none; border-radius:10px; font-weight:800; cursor:pointer;">Simpan Pengguna</button>
            <a href="{{ route('admin.users.index') }}" style="padding:12px 20px; border:1px solid #dce5d7; border-radius:10px; color:#74806e; text-decoration:none; font-size:13px; font-weight:700;">Batal</a>
        </div>
    </form>
</div>

@endsection
