@extends('admin.layouts.app')

@section('title', 'Daftar Penukaran Reward (Redeem)')

@section('content')

<style>
    .admin-page { width: 100%; max-width: 1300px; margin: 0 auto; }
    .page-header { margin-bottom: 24px; }
    .page-title h1 { margin: 0 0 4px; font-size: 26px; font-weight: 850; color: #18351c; }
    .table-card { background: #fff; border: 1px solid #e1eadb; border-radius: 18px; overflow: hidden; }
    .admin-table { width: 100%; border-collapse: collapse; }
    .admin-table th { padding: 14px 18px; background: #f7faf5; border-bottom: 1px solid #e3ebe0; font-size: 11px; font-weight: 800; color: #687568; text-transform: uppercase; }
    .admin-table td { padding: 14px 18px; border-bottom: 1px solid #edf2ea; font-size: 13px; color: #29422d; }
</style>

<div class="admin-page">
    <div class="page-header">
        <div class="page-title">
            <h1>Daftar Penukaran Reward (Redeem)</h1>
            <p>Riwayat checkout dan penukaran resi reward member Chiamates</p>
        </div>
    </div>

    <div class="table-card">
        <div style="overflow-x:auto;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Kode Resi</th>
                        <th>Tanggal Checkout</th>
                        <th>Member</th>
                        <th>Reward</th>
                        <th>Poin Digunakan</th>
                        <th>Kasir Pemproses</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($redeemHistories as $rdm)
                        <tr>
                            <td><strong>{{ $rdm->redeem_code }}</strong></td>
                            <td>{{ $rdm->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                <strong>{{ $rdm->member->user->name ?? '-' }}</strong>
                                <div style="font-size:11px; color:#74806e;">ID: {{ $rdm->member->member_code ?? '-' }}</div>
                            </td>
                            <td><strong>{{ $rdm->reward->name ?? 'Reward' }}</strong></td>
                            <td style="color:#dc2626; font-weight:800;">-{{ number_format($rdm->points_used) }} Poin</td>
                            <td>{{ $rdm->kasir->name ?? '-' }}</td>
                            <td>
                                <span style="padding:4px 10px; border-radius:20px; font-size:10px; font-weight:800; background:{{ $rdm->status=='success'?'#eef7e7':'#fef3c7' }}; color:{{ $rdm->status=='success'?'#579719':'#d97706' }};">
                                    {{ $rdm->status == 'success' ? 'SELESAI / DIPROSES' : 'PENDING CHECKOUT' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align:center; padding:40px; color:#879287;">Belum ada riwayat redeem reward.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="padding:16px;">
            {{ $redeemHistories->links() }}
        </div>
    </div>
</div>

@endsection
