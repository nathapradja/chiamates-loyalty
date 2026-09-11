@extends('admin.layouts.app')

@section('title', 'Kelola Reward')

@section('content')

<style>
    .admin-page {
        width: 100%;
        max-width: 1300px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .page-title h1 {
        margin: 0 0 4px;
        font-size: 26px;
        font-weight: 850;
        color: #18351c;
    }

    .page-title p {
        margin: 0;
        font-size: 13px;
        color: #718071;
    }

    .btn-create {
        padding: 10px 18px;
        border-radius: 11px;
        background: #65ad20;
        color: #fff;
        font-weight: 800;
        font-size: 13px;
        text-decoration: none;
        box-shadow: 0 6px 16px rgba(101,173,32,.18);
        transition: .2s ease;
    }

    .btn-create:hover {
        background: #579719;
    }

    .table-card {
        background: #fff;
        border: 1px solid #e1eadb;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(52, 91, 31, .05);
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .admin-table th {
        padding: 14px 18px;
        background: #f7faf5;
        border-bottom: 1px solid #e3ebe0;
        font-size: 11px;
        font-weight: 800;
        color: #687568;
        text-transform: uppercase;
    }

    .admin-table td {
        padding: 14px 18px;
        border-bottom: 1px solid #edf2ea;
        font-size: 13px;
        color: #29422d;
        vertical-align: middle;
    }

    .badge-status {
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 800;
    }

    .badge-active { background: #eef7e7; color: #579719; }
    .badge-inactive { background: #fee2e2; color: #dc2626; }

    .action-btn {
        padding: 5px 10px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
        border: 1px solid #dce7d8;
        background: #fff;
        color: #3b5034;
        margin-right: 4px;
    }

    .action-btn:hover {
        background: #f4f8ed;
        border-color: #65ad20;
    }

    /* Tambahan style untuk foto di tabel */
    .reward-thumbnail {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #dce5d7;
        background: #f7faf5;
    }

    .reward-no-image {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        background: #f0f4ec;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        color: #a0a79a;
        font-weight: 700;
        text-align: center;
        line-height: 1.2;
    }
</style>

<div class="admin-page">
    <div class="page-header">
        <div class="page-title">
            <h1>Kelola Reward Event</h1>
            <p>Atur daftar reward dan event loyalty Chiamates Superfood</p>
        </div>
        <a href="{{ route('admin.rewards.create') }}" class="btn-create">+ Tambah Reward Baru</a>
    </div>

    @if(session('success'))
        <div style="margin-bottom:20px; padding:12px 16px; background:#eef7e7; border:1px solid #dcebd0; color:#579719; border-radius:10px; font-size:13px; font-weight:700;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card">
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <!-- Tambahan Header Foto -->
                        <th style="width: 70px;">Foto</th>
                        <th>Nama Reward</th>
                        <th>Poin Dibutuhkan</th>
                        <th>Stok</th>
                        <th>Periode Event</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rewards as $reward)
                        <tr>
                            <!-- Tambahan Data Foto -->
                            <td>
                                @if($reward->image)
                                    <img src="{{ asset('storage/' . $reward->image) }}" alt="{{ $reward->name }}" class="reward-thumbnail">
                                @else
                                    <div class="reward-no-image">No<br>Foto</div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $reward->name }}</strong>
                                <div style="font-size:11px; color:#74806e;">{{ Str::limit($reward->description, 50) }}</div>
                            </td>
                            <td><strong style="color:#65ad20;">{{ number_format($reward->points_required) }} Poin</strong></td>
                            <td>{{ $reward->stock }} pcs</td>
                            <td>
                                @if($reward->start_date || $reward->end_date)
                                    {{ optional($reward->start_date)->format('d M Y') ?? '-' }} s/d {{ optional($reward->end_date)->format('d M Y') ?? '-' }}
                                @else
                                    Permanen
                                @endif
                            </td>
                            <td>
                                <span class="badge-status {{ $reward->status == 'active' ? 'badge-active' : 'badge-inactive' }}">
                                    {{ strtoupper($reward->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.rewards.edit', $reward->id) }}" class="action-btn">Edit</a>
                                <form action="{{ route('admin.rewards.destroy', $reward->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus reward ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn" style="color:#dc2626; cursor:pointer;">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <!-- Ubah colspan menjadi 7 karena ada tambahan kolom foto -->
                            <td colspan="7" style="text-align:center; padding:40px; color:#879287;">Belum ada data reward. Tambahkan reward baru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="padding:16px;">
            {{ $rewards->links() }}
        </div>
    </div>
</div>

@endsection