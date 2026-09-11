@extends('member.layouts.app')

@php
    $title = 'CHIAMATES - Resi Checkout Reward';
    // Karena resi sekarang bisa memuat BANYAK barang (array),
    // kita ambil data resi (QR Code, Member, Waktu) dari barang urutan pertama.
    $firstItem = $redeems->first(); 
    
    // Hitung total poin keseluruhan dari keranjang
    $grandTotalPoints = $redeems->sum('points_used');
@endphp

@section('content')

<style>
    .receipt-container {
        max-width: 650px;
        margin: 0 auto;
        padding-bottom: 50px;
    }

    .receipt-card {
        background: #ffffff;
        border: 1px solid #dce3d5;
        border-radius: 24px;
        box-shadow: 0 15px 40px rgba(61, 91, 38, 0.08);
        overflow: hidden;
        position: relative;
    }

    .receipt-top-banner {
        background: linear-gradient(135deg, #78B82A, #5C941D);
        padding: 30px 25px;
        text-align: center;
        color: #ffffff;
    }

    .receipt-icon-badge {
        width: 64px;
        height: 64px;
        margin: 0 auto 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .receipt-top-title {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 4px;
    }

    .receipt-top-subtitle {
        font-size: 12px;
        opacity: 0.9;
    }

    .receipt-body {
        padding: 32px 28px;
    }

    .receipt-qr-wrap {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 22px;
        background: #fbfdf9;
        border: 2px dashed #cfe0c2;
        border-radius: 18px;
        margin-bottom: 25px;
    }

    .receipt-qr-box {
        background: #ffffff;
        padding: 14px;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 15px;
    }

    .receipt-code-label {
        font-size: 11px;
        color: #74806e;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 4px;
    }

    .receipt-code-value {
        font-size: 22px;
        font-weight: 900;
        color: #26351d;
        letter-spacing: 1.5px;
        font-family: monospace;
        background: #eef7e4;
        padding: 6px 16px;
        border-radius: 8px;
        border: 1px solid #d5e5c7;
    }

    .receipt-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 10px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 800;
        background: #FFF4E4;
        color: #D97706;
    }

    .receipt-status-badge.success {
        background: #ECFDF5;
        color: #059669;
    }

    /* =====================================================
       TAMBAHAN CSS TABEL KERANJANG BELANJA
    ===================================================== */
    .cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 15px;
    }

    .cart-table th {
        padding: 10px 0;
        border-bottom: 2px solid #edf1ea;
        font-size: 11px;
        color: #74806e;
        text-align: left;
    }

    .cart-table td {
        padding: 12px 0;
        border-bottom: 1px dashed #edf1ea;
        font-size: 13px;
        color: #253421;
    }

    .cart-table .item-qty {
        text-align: center;
        font-weight: 800;
    }

    .cart-table .item-points {
        text-align: right;
        font-weight: 800;
        color: #5C941D;
    }

    .cart-grand-total {
        display: flex;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 2px solid #edf1ea;
        font-size: 15px;
        font-weight: 800;
        margin-bottom: 25px;
    }

    /* ===================================================== */

    .receipt-details-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 25px;
    }

    .receipt-details-table tr {
        border-bottom: 1px solid #edf1ea;
    }

    .receipt-details-table td {
        padding: 12px 0;
        font-size: 12px;
    }

    .receipt-details-table td:last-child {
        text-align: right;
        font-weight: 800;
        color: #253421;
    }

    .instruction-box {
        background: #F4F8EC;
        border-left: 4px solid #78B82A;
        padding: 16px 18px;
        border-radius: 0 12px 12px 0;
        margin-bottom: 25px;
    }

    .instruction-title {
        font-size: 12px;
        font-weight: 800;
        color: #3f6815;
        margin-bottom: 8px;
    }

    .instruction-list {
        margin: 0;
        padding-left: 18px;
        font-size: 11px;
        color: #55634e;
        line-height: 1.6;
    }

    .receipt-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .btn-receipt {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 18px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 800;
        text-align: center;
        cursor: pointer;
        transition: 0.2s ease;
        text-decoration: none;
    }

    .btn-receipt-primary {
        background: #78B82A;
        color: #ffffff;
        border: none;
    }

    .btn-receipt-primary:hover {
        background: #5C941D;
    }

    .btn-receipt-secondary {
        background: #ffffff;
        color: #55634e;
        border: 1px solid #dce3d5;
    }

    .btn-receipt-secondary:hover {
        background: #f4f7f0;
    }

    @media (max-width: 550px) {
        .receipt-actions {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="receipt-container">

    <div class="receipt-card">

        <div class="receipt-top-banner">
            <h1 class="receipt-top-title">
                Resi Checkout Reward
            </h1>
            <p class="receipt-top-subtitle">
                Tunjukkan QR Code / Resi ini kepada kasir saat bertransaksi di outlet
            </p>
        </div>

        <div class="receipt-body">

            <div class="receipt-qr-wrap">
                <div class="receipt-code-label">
                    Nomor Resi Penukaran
                </div>
                <div class="receipt-code-value">
                    {{ $firstItem->redeem_code }}
                </div>

                <div class="receipt-qr-box" style="margin-top: 15px;">
                    {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(190)->color(37, 52, 33)->generate($firstItem->redeem_code) !!}
                </div>

                @if($firstItem->status === 'pending')
                    <div class="receipt-status-badge">
                        Menunggu Diproses di Kasir
                    </div>
                @else
                    <div class="receipt-status-badge success">
                        ✓ Berhasil Ditukarkan
                    </div>
                @endif
            </div>

            <!-- TABEL KERANJANG (PERULANGAN DAFTAR REWARD) -->
            <div style="font-size: 12px; font-weight: 800; margin-bottom: 10px; color: #74806e; text-transform: uppercase;">
                Daftar Reward:
            </div>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th style="text-align: center;">Qty</th>
                        <th style="text-align: right;">Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($redeems as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->reward->name ?? 'Reward Terhapus' }}</strong>
                            <div style="font-size: 10px; color: #74806e;">{{ number_format($item->reward->points_required ?? 0, 0, ',', '.') }} poin / pcs</div>
                        </td>
                        <td class="item-qty">{{ $item->quantity }}x</td>
                        <td class="item-points">-{{ number_format($item->points_used, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- TOTAL KESELURUHAN -->
            <div class="cart-grand-total">
                <span style="color: #253421;">Total Pemotongan:</span>
                <span style="color: #E53935;">-{{ number_format($grandTotalPoints, 0, ',', '.') }} Poin</span>
            </div>

            <!-- TABEL DETAIL INFO -->
            <table class="receipt-details-table">
                <tr>
                    <td style="color:#74806e;">Member</td>
                    <td>{{ auth()->user()->name }} ({{ $member->member_code ?? '-' }})</td>
                </tr>
                <tr>
                    <td style="color:#74806e;">Waktu Checkout</td>
                    <td>{{ $firstItem->created_at->format('d M Y, H:i') }} WIB</td>
                </tr>
                <tr>
                    <td style="color:#74806e;">Berlaku Sampai</td>
                    <td>{{ $firstItem->expires_at ? $firstItem->expires_at->format('d M Y, H:i') . ' WIB' : '7 Hari' }}</td>
                </tr>
            </table>

            <div class="instruction-box">
                <div class="instruction-title">
                    Cara Klaim Reward di Kasir:
                </div>
                <ol class="instruction-list">
                    <li>Kunjungi outlet <strong>CHIAMATES / AmiFit</strong> terdekat.</li>
                    <li>Buka halaman ini dan tunjukkan <strong>QR Code</strong> atau sebutkan <strong>Nomor Resi</strong> ke kasir.</li>
                    <li>Kasir akan men-scan QR code ini untuk menyelesaikan penukaran seluruh reward dan memotong poin Anda.</li>
                    <li><strong>Catatan:</strong> Poin member Anda belum berkurang dan baru dipotong setelah diselesaikan oleh kasir.</li>
                </ol>
            </div>

            <div class="receipt-actions">
                <a href="{{ route('member.redeem.history') }}" class="btn-receipt btn-receipt-secondary">
                    Riwayat Redeem
                </a>
                <a href="{{ route('member.dashboard') }}" class="btn-receipt btn-receipt-primary">
                    Kembali ke Dashboard
                </a>
            </div>

        </div>

    </div>

</div>

@endsection