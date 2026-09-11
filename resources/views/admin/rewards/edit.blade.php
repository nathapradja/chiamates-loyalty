@extends('admin.layouts.app')

@section('title', 'Edit Reward')

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
    <h2 style="font-size:22px; font-weight:800; color:#18351c; margin-bottom:20px;">Edit Reward</h2>

    <form method="POST" action="{{ route('admin.rewards.update', $reward->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Nama Reward *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $reward->name) }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">Foto Reward (Opsional)</label>
            @if($reward->image)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $reward->image) }}" alt="Foto Reward" style="max-height: 120px; border-radius: 8px; border: 1px solid #dce5d7;">
                </div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*" style="padding: 8px 14px;">
            <small style="color: #74806e; font-size: 11px; margin-top: 5px; display: block;">Biarkan kosong jika tidak ingin mengubah foto.</small>
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi Reward</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $reward->description) }}</textarea>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
            <div class="form-group">
                <label class="form-label">Poin Dibutuhkan *</label>
                <input type="number" name="points_required" class="form-control" value="{{ old('points_required', $reward->points_required) }}" min="1" required>
            </div>
            <div class="form-group">
                <label class="form-label">Stok Reward *</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $reward->stock) }}" min="0" required>
            </div>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
            <div class="form-group">
                <label class="form-label">Tanggal Mulai (Opsional)</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', optional($reward->start_date)->format('Y-m-d')) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Tanggal Berakhir (Opsional)</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', optional($reward->end_date)->format('Y-m-d')) }}">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Status *</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ $reward->status == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ $reward->status == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div style="margin-top:24px; display:flex; gap:10px;">
            <button type="submit" class="btn-submit">Perbarui Reward</button>
            <a href="{{ route('admin.rewards.index') }}" style="padding:12px 20px; border:1px solid #dce5d7; border-radius:10px; color:#74806e; text-decoration:none; font-size:13px; font-weight:700;">Batal</a>
        </div>
    </form>
</div>

@endsection