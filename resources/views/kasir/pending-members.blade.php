@extends('kasir.layouts.app')

@section('title', 'Persetujuan Member')
@section('page-title', 'Persetujuan Member')

@push('styles')
<style>
    .pending-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
    }
    .pending-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--border);
    }
    .pending-title {
        font-size: 16px;
        font-weight: 850;
        color: var(--text);
    }
    .pending-subtitle {
        font-size: 11px;
        color: var(--muted);
        margin-top: 4px;
    }
    .pending-table-wrapper {
        overflow-x: auto;
    }
    .pending-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    .pending-table th {
        background: #F5F7F3;
        padding: 14px 24px;
        font-size: 10px;
        font-weight: 850;
        color: var(--muted);
        text-transform: uppercase;
        border-bottom: 1px solid var(--border);
    }
    .pending-table td {
        padding: 16px 24px;
        border-bottom: 1px solid var(--border);
        font-size: 12px;
        color: var(--text);
    }
    .pending-table tr:last-child td {
        border-bottom: none;
    }
    .member-name {
        font-weight: 850;
        margin-bottom: 4px;
    }
    .member-email {
        font-size: 10px;
        color: var(--muted);
    }
    .badge-pending {
        display: inline-block;
        background: #FFF8E1;
        color: #F57F17;
        border: 1px solid #FFE082;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 850;
    }
    .btn-approve {
        background: var(--green);
        color: var(--white);
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 10px;
        font-weight: 850;
        cursor: pointer;
        transition: 0.2s;
    }
    .btn-approve:hover {
        background: var(--green-dark);
    }
    .alert-success {
        background: var(--green-soft);
        color: var(--green-dark);
        border: 1px solid var(--green);
        padding: 12px 24px;
        margin: 20px 24px 0;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
    }
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: var(--muted);
    }
    .empty-icon {
        font-size: 32px;
        margin-bottom: 10px;
    }
</style>
@endpush

@section('content')
<div class="pending-card">
    <div class="pending-header">
        <div class="pending-title">Daftar Menunggu Persetujuan</div>
        <div class="pending-subtitle">Berikan persetujuan untuk member yang mendaftar secara mandiri.</div>
    </div>

    @if(session('success'))
        <div class="alert-success">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="pending-table-wrapper">
        <table class="pending-table">
            <thead>
                <tr>
                    <th>Nama & Email</th>
                    <th>ID Member</th>
                    <th>Tanggal Daftar</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendingMembers as $member)
                    <tr>
                        <td>
                            <div class="member-name">{{ $member->user->name }}</div>
                            <div class="member-email">{{ $member->user->email }}</div>
                        </td>
                        <td>
                            <span class="badge-pending">{{ $member->member_code }}</span>
                        </td>
                        <td>
                            {{ $member->created_at->format('d M Y, H:i') }}
                        </td>
                        <td style="text-align: center;">
                            <form action="{{ route('kasir.approve.member', $member->id) }}" method="POST" onsubmit="return confirm('Setujui pendaftaran member ini?');">
                                @csrf
                                <button type="submit" class="btn-approve">Setujui</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="empty-state">
                                
                                <div>Tidak ada member baru yang menunggu persetujuan.</div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pendingMembers->hasPages())
        <div style="padding: 15px 24px; border-top: 1px solid var(--border);">
            {{ $pendingMembers->links() }}
        </div>
    @endif
</div>
@endsection