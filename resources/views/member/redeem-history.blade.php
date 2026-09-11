@extends('member.layouts.app')

@php
    $title = 'CHIAMATES - Riwayat Redeem';
    $redeemHistories = $redeemHistories ?? collect();
    $totalRedeem = $totalRedeem ?? $redeemHistories->count();
    $totalPointsUsed = $totalPointsUsed ?? $redeemHistories->where('status', 'success')->sum('points_used');
@endphp


@section('content')

<style>

    /* =====================================================
       HEADER
    ===================================================== */

    .redeem-history-header {
        margin-bottom: 25px;
    }


    .redeem-history-label {
        margin-bottom: 7px;

        color: var(--green-dark);

        font-size: 10px;
        font-weight: 800;

        text-transform: uppercase;
        letter-spacing: 0.6px;
    }


    .redeem-history-title {
        margin-bottom: 7px;

        font-size: 29px;
        line-height: 1.2;
    }


    .redeem-history-description {
        max-width: 700px;

        color: var(--muted);

        font-size: 13px;
        line-height: 1.6;
    }


    /* =====================================================
       SUMMARY
    ===================================================== */

    .redeem-summary-grid {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 15px;

        margin-bottom: 22px;
    }


    .redeem-summary-card {
        padding: 19px;

        background: var(--white);

        border: 1px solid var(--border);

        border-radius: 15px;

        box-shadow:
            0 8px 25px
            rgba(61, 91, 38, 0.05);
    }


    .redeem-summary-label {
        margin-bottom: 7px;

        color: var(--muted);

        font-size: 9px;
        font-weight: 700;

        text-transform: uppercase;
        letter-spacing: 0.4px;
    }


    .redeem-summary-value {
        color: var(--text);

        font-size: 23px;
        font-weight: 800;
    }


    .redeem-summary-unit {
        color: var(--muted);

        font-size: 9px;
        font-weight: 700;
    }


    .redeem-summary-value.green {
        color: var(--green-dark);
    }


    /* =====================================================
       HISTORY CARD
    ===================================================== */

    .redeem-history-card {
        overflow: hidden;

        background: var(--white);

        border: 1px solid var(--border);

        border-radius: 18px;

        box-shadow:
            0 12px 35px
            rgba(61, 91, 38, 0.07);
    }


    .redeem-history-card-header {
        padding: 21px 23px;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        border-bottom: 1px solid var(--border);
    }


    .history-card-title {
        font-size: 15px;
        font-weight: 800;
    }


    .history-card-subtitle {
        margin-top: 4px;

        color: var(--muted);

        font-size: 9px;
    }


    .history-count {
        flex: 0 0 auto;

        padding: 7px 10px;

        border-radius: 8px;

        background: var(--green-light);

        color: var(--green-dark);

        font-size: 9px;
        font-weight: 800;
    }


    /* =====================================================
       TABLE
    ===================================================== */

    .redeem-table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    .redeem-table {
        width: 100%;

        border-collapse: collapse;

        min-width: 680px;
    }


    .redeem-table th {
        padding: 13px 18px;

        background: #FAFCF8;

        color: var(--muted);

        font-size: 8px;
        font-weight: 800;

        text-align: left;

        text-transform: uppercase;
        letter-spacing: 0.4px;

        white-space: nowrap;
    }


    .redeem-table td {
        padding: 17px 18px;

        border-top: 1px solid #EDF1E9;

        color: var(--text);

        font-size: 10px;

        vertical-align: middle;
    }


    .redeem-table tbody tr {
        transition: background 0.2s ease;
    }


    .redeem-table tbody tr:hover {
        background: #FCFDFB;
    }


    /* =====================================================
       REWARD NAME
    ===================================================== */

    .history-reward {
        display: flex;

        align-items: center;

        gap: 11px;
    }


    .history-reward-icon {
        flex: 0 0 auto;

        width: 36px;
        height: 36px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: var(--green-light);

        color: var(--green-dark);

        font-size: 12px;
        font-weight: 800;
    }


    .history-reward-name {
        font-size: 10px;
        font-weight: 800;

        line-height: 1.35;
    }


    .history-reward-category {
        margin-top: 3px;

        color: var(--muted);

        font-size: 8px;
    }


    /* =====================================================
       REDEEM CODE
    ===================================================== */

    .redeem-code {
        color: var(--green-dark);

        font-size: 9px;
        font-weight: 800;

        white-space: nowrap;
    }


    /* =====================================================
       POINT
    ===================================================== */

    .redeem-point {
        font-weight: 800;

        white-space: nowrap;
    }


    .redeem-point::before {
        content: "-";

        margin-right: 2px;

        color: #A15D5D;
    }


    /* =====================================================
       STATUS
    ===================================================== */

    .redeem-status {
        display: inline-flex;

        align-items: center;

        gap: 5px;

        padding: 6px 9px;

        border-radius: 7px;

        background: var(--green-light);

        color: var(--green-dark);

        font-size: 8px;
        font-weight: 800;

        white-space: nowrap;
    }


    .redeem-status-dot {
        width: 5px;
        height: 5px;

        border-radius: 50%;

        background: var(--green-dark);
    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .redeem-empty {
        padding: 60px 25px;

        text-align: center;
    }


    .redeem-empty-icon {
        width: 58px;
        height: 58px;

        margin: 0 auto 14px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 14px;

        background: var(--green-light);

        color: var(--green-dark);

        font-size: 21px;
        font-weight: 800;
    }


    .redeem-empty-title {
        margin-bottom: 6px;

        font-size: 15px;
        font-weight: 800;
    }


    .redeem-empty-text {
        max-width: 390px;

        margin: 0 auto;

        color: var(--muted);

        font-size: 10px;
        line-height: 1.7;
    }


    /* =====================================================
       FOOTER NOTE
    ===================================================== */

    .history-note {
        padding: 16px 20px;

        border-top: 1px solid var(--border);

        color: var(--muted);

        font-size: 8px;
        line-height: 1.6;

        text-align: center;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .redeem-summary-grid {
            grid-template-columns: 1fr;
        }


        .redeem-history-title {
            font-size: 25px;
        }


        .redeem-history-card-header {
            align-items: flex-start;

            flex-direction: column;
        }

    }

</style>



{{-- =====================================================
     HEADER
====================================================== --}}

<div class="redeem-history-header">

    <div class="redeem-history-label">
        Riwayat Redeem
    </div>


    <h1 class="redeem-history-title">
        Riwayat Penukaran Reward
    </h1>


    <p class="redeem-history-description">
        Lihat daftar reward yang pernah kamu tukarkan
        menggunakan poin CHIAMATES.
    </p>

</div>



{{-- =====================================================
     SUMMARY
====================================================== --}}

<div class="redeem-summary-grid">


    <div class="redeem-summary-card">

        <div class="redeem-summary-label">
            Total Redeem
        </div>


        <div class="redeem-summary-value">

            {{ $totalRedeem }}

            <span class="redeem-summary-unit">
                Transaksi
            </span>

        </div>

    </div>



    <div class="redeem-summary-card">

        <div class="redeem-summary-label">
            Total Poin Digunakan
        </div>


        <div class="redeem-summary-value green">

            {{ number_format($totalPointsUsed, 0, ',', '.') }}

            <span class="redeem-summary-unit">
                Poin
            </span>

        </div>

    </div>


</div>



{{-- =====================================================
     HISTORY
====================================================== --}}

<div class="redeem-history-card">


    <div class="redeem-history-card-header">

        <div>

            <div class="history-card-title">
                Daftar Riwayat Redeem
            </div>

            <div class="history-card-subtitle">
                Semua transaksi penukaran reward kamu
            </div>

        </div>


        <div class="history-count">

            {{ $totalRedeem }}
            Transaksi

        </div>

    </div>



    @if ($redeemHistories->count() > 0)

        <div class="redeem-table-wrapper">

            <table class="redeem-table">

                <thead>

                    <tr>

                        <th>
                            Reward
                        </th>

                        <th>
                            Kode Resi
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Poin
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach ($redeemHistories as $history)

                        <tr>

                            {{-- REWARD --}}
                            <td>
                                <div class="history-reward">
                                    
                                    <div>
                                        <div class="history-reward-name">
                                            {{ $history->reward->name ?? 'Reward Chiamates' }}
                                        </div>
                                        <div class="history-reward-category">
                                            Reward
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- CODE --}}
                            <td>
                                <span class="redeem-code">
                                    {{ $history->redeem_code ?? ('RDM-#' . $history->id) }}
                                </span>
                            </td>

                            {{-- DATE --}}
                            <td>
                                {{ $history->created_at->format('d M Y, H:i') }}
                            </td>

                            {{-- POINT --}}
                            <td>
                                <span class="redeem-point">
                                    {{ number_format($history->points_used, 0, ',', '.') }}
                                </span>
                            </td>

                            {{-- STATUS --}}
                            <td>
                                @if($history->status === 'pending')
                                    <span class="redeem-status" style="background:#FFF4E4; color:#D97706;">
                                        <span class="redeem-status-dot" style="background:#D97706;"></span>
                                        Menunggu di Kasir
                                    </span>
                                @elseif($history->status === 'success')
                                    <span class="redeem-status">
                                        <span class="redeem-status-dot"></span>
                                        Berhasil Selesai
                                    </span>
                                @else
                                    <span class="redeem-status" style="background:#FEE2E2; color:#DC2626;">
                                        <span class="redeem-status-dot" style="background:#DC2626;"></span>
                                        Dibatalkan
                                    </span>
                                @endif
                            </td>

                            {{-- ACTION --}}
                            <td>
                                @if($history->redeem_code)
                                    <a href="{{ route('member.reward.receipt', $history->redeem_code) }}" style="display:inline-block; padding:5px 10px; background:#78B82A; color:#fff; border-radius:6px; font-size:10px; font-weight:700; text-decoration:none;">
                                        Lihat QR Resi
                                    </a>
                                @endif
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        {{-- EMPTY STATE --}}
        <div class="redeem-empty">

            

            <h2 class="redeem-empty-title">
                Belum Ada Riwayat Redeem
            </h2>

            <p class="redeem-empty-text">
                Kamu belum pernah melakukan checkout reward. Kunjungi katalog reward dan tukarkan poin kamu!
            </p>

        </div>

    @endif



    <div class="history-note">

        Riwayat redeem akan diperbarui secara otomatis
        setelah transaksi penukaran reward berhasil.

    </div>


</div>

@endsection