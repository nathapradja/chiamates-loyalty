@extends('admin.layouts.app')

@section('title', 'Tambah Reward Baru')

@section('content')

<style>
    .form-card {
        max-width: 700px;
        margin: 0 auto;
        background: #fff;
        border: 1px solid #e1eadb;
        border-radius: 18px;
        padding: 28px;
        box-shadow: 0 8px 30px rgba(52, 91, 31, .05);
    }
    .form-group { margin-bottom: 18px; }
    .form-label { display: block; margin-bottom: 6px; font-size: 13px; font-weight: 700; color: #29422d; }
    .form-control { width: 100%; padding: 11px 14px; border: 1px solid #dce5d7; border-radius: 10px; font-size: 13px; outline: none; box-sizing: border-box; }
    .btn-submit { padding: 12px 24px; background: #65ad20; color: #fff; border: none; border-radius: 10px; font-weight: 800; cursor: pointer; }
</style>

<div class="form-card">
    <h2 style="font-size:22px; font-weight:800; color:#18351c; margin-bottom:20px;">Tambah Reward Baru</h2>

    <form method="POST" action="{{ route('admin.rewards.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="form-label">Nama Reward *</label>
            <input type="text" name="name" class="form-control" required placeholder="Contoh: Voucher Diskon Rp 10.000 / Free Salad">
        </div>

        <div class="form-group">
            <label class="form-label">Foto Reward (Opsional)</label>
            <input type="file" name="image" class="form-control" accept="image/*" style="padding: 8px 14px;">
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi Reward</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Penjelasan detail penukaran reward"></textarea>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
            <div class="form-group">
                <label class="form-label">Poin Dibutuhkan *</label>
                <input type="number" name="points_required" class="form-control" min="1" required placeholder="1000">
            </div>
            <div class="form-group">
                <label class="form-label">Stok Reward *</label>
                <input type="number" name="stock" class="form-control" min="0" required placeholder="50">
            </div>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
            <div class="form-group">
                <label class="form-label">Tanggal Mulai (Opsional)</label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label">Tanggal Berakhir (Opsional)</label>
                <input type="date" name="end_date" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Status *</label>
            <select name="status" class="form-control" required>
                <option value="active">Aktif</option>
                <option value="inactive">Nonaktif</option>
            </select>
        </div>

        <div style="margin-top:24px; display:flex; gap:10px;">
            <button type="submit" class="btn-submit">Simpan Reward</button>
            <a href="{{ route('admin.rewards.index') }}" style="padding:12px 20px; border:1px solid #dce5d7; border-radius:10px; color:#74806e; text-decoration:none; font-size:13px; font-weight:700;">Batal</a>
        </div>
    </form>
</div>

@endsection