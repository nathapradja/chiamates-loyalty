@extends('admin.layouts.app')

@section('title', 'Laporan & Statistik')

@section('content')

<style>
    .admin-page { width: 100%; max-width: 1300px; margin: 0 auto; }
    .page-header { margin-bottom: 24px; }
    .page-title h1 { margin: 0 0 4px; font-size: 26px; font-weight: 850; color: #18351c; }
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px; }
    .stat-box { background: #fff; border: 1px solid #e1eadb; border-radius: 16px; padding: 20px; box-shadow: 0 6px 20px rgba(52,91,31,.04); }
    .stat-label { font-size: 11px; font-weight: 800; color: #718071; text-transform: uppercase; margin-bottom: 6px; }
    .stat-number { font-size: 24px; font-weight: 900; color: #29422d; }
    .table-card { background: #fff; border: 1px solid #e1eadb; border-radius: 18px; overflow: hidden; margin-bottom: 24px; }
    .admin-table { width: 100%; border-collapse: collapse; }
    .admin-table th { padding: 12px 18px; background: #f7faf5; border-bottom: 1px solid #e3ebe0; font-size: 11px; font-weight: 800; color: #687568; text-transform: uppercase; }
    .admin-table td { padding: 12px 18px; border-bottom: 1px solid #edf2ea; font-size: 13px; color: #29422d; }
</style>

<div class="admin-page">
    <div class="page-header">
        <div class="page-title">
            <h1>Laporan & Statistik Loyalty System</h1>
            <p>Rekapitulasi transaksi, perolehan & penukaran poin member Chiamates</p>
        </div>
    </div>

    {{-- FILTER TANGGAL --}}
    <div style="background:#fff; border:1px solid #e1eadb; border-radius:14px; padding:18px; margin-bottom:24px;">
        <form method="GET" action="{{ route('admin.reports.index') }}" style="display:flex; align-items:center; gap:14px; flex-wrap:wrap;">
            <div>
                <label style="font-size:11px; font-weight:800; color:#29422d; display:block; margin-bottom:4px;">Dari Tanggal:</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}" style="padding:8px 12px; border:1px solid #dce5d7; border-radius:8px; font-size:13px;">
            </div>
            <div>
                <label style="font-size:11px; font-weight:800; color:#29422d; display:block; margin-bottom:4px;">Sampai Tanggal:</label>
                <input type="date" name="date_to" value="{{ request('date_to') }}" style="padding:8px 12px; border:1px solid #dce5d7; border-radius:8px; font-size:13px;">
            </div>
            <div style="margin-top:20px;">
                <button type="submit" style="padding:9px 18px; background:#65ad20; color:#fff; border:none; border-radius:8px; font-weight:800; cursor:pointer;">Filter Laporan</button>
                <a href="{{ route('admin.reports.index') }}" style="padding:9px 14px; color:#74806e; text-decoration:none; font-size:12px;">Reset</a>
            </div>
        </form>
    </div>

    {{-- STATS SUMMARY --}}
    <div class="stats-grid">
        <div class="stat-box">
            <div class="stat-label">Total Transaksi</div>
            <div class="stat-number">{{ number_format($totalTransaksi) }}</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">Total Omzet Belanja</div>
            <div class="stat-number" style="color:#65ad20;">Rp {{ number_format($totalOmzet, 0, ',', '.') }}</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">Total Poin Diberikan</div>
            <div class="stat-number" style="color:#579719;">+{{ number_format($totalPoinEarned) }} Pts</div>
        </div>
        <div class="stat-box">
            <div class="stat-label">Total Poin Ditukarkan</div>
            <div class="stat-number" style="color:#dc2626;">-{{ number_format($totalPoinRedeemed) }} Pts</div>
        </div>
    </div>

    {{-- TABEL LAPORAN TRANSAKSI --}}
    <div class="table-card">
        <div style="padding:16px 20px; border-bottom:1px solid #e7eee3; font-weight:800; font-size:15px; color:#18351c;">
            Laporan Transaksi Kasir
        </div>
        <div style="overflow-x:auto;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>No. Transaksi</th>
                        <th>Tanggal</th>
                        <th>Member</th>
                        <th>Jenis</th>
                        <th>Total Belanja</th>
                        <th>Poin Diberikan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $tx)
                        <tr>
                            <td><strong>{{ $tx->transaction_number }}</strong></td>
                            <td>{{ $tx->created_at->format('d M Y H:i') }}</td>
                            <td>{{ $tx->member->user->name ?? '-' }} ({{ $tx->member->member_code ?? '-' }})</td>
                            <td><span style="padding:3px 8px; border-radius:6px; background:#f3f7ef; font-size:11px; font-weight:800;">{{ strtoupper($tx->type) }}</span></td>
                            <td><strong>Rp {{ number_format($tx->total_amount, 0, ',', '.') }}</strong></td>
                            <td style="color:#579719; font-weight:800;">+{{ number_format($tx->points_earned) }} Pts</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center; padding:30px; color:#879287;">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="padding:16px;">
            {{ $transactions->links() }}
        </div>
    </div>

    {{-- TABEL LAPORAN REDEEM --}}
    <div class="table-card">
        <div style="padding:16px 20px; border-bottom:1px solid #e7eee3; font-weight:800; font-size:15px; color:#18351c;">
            Laporan Penukaran Reward (Redeem)
        </div>
        <div style="overflow-x:auto;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Kode Resi</th>
                        <th>Tanggal</th>
                        <th>Member</th>
                        <th>Reward</th>
                        <th>Poin Digunakan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($redeemHistories as $rdm)
                        <tr>
                            <td><strong>{{ $rdm->redeem_code }}</strong></td>
                            <td>{{ $rdm->created_at->format('d M Y H:i') }}</td>
                            <td>{{ $rdm->member->user->name ?? '-' }}</td>
                            <td>{{ $rdm->reward->name ?? 'Reward' }}</td>
                            <td style="color:#dc2626; font-weight:800;">-{{ number_format($rdm->points_used) }} Pts</td>
                            <td>
                                <span style="padding:3px 8px; border-radius:6px; font-size:10px; font-weight:800; background:{{ $rdm->status=='success'?'#eef7e7':'#fef3c7' }}; color:{{ $rdm->status=='success'?'#579719':'#d97706' }};">
                                    {{ strtoupper($rdm->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center; padding:30px; color:#879287;">Belum ada riwayat redeem.</td>
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
