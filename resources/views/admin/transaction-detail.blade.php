@extends('admin.layouts.app')

@section('title', 'Detail Transaksi')

@section('content')

<style>

    .transaction-detail-page {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .detail-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 24px;

    }


    .detail-header-left {

        min-width: 0;

    }


    .detail-back {

        display: inline-flex;

        align-items: center;

        gap: 7px;

        margin-bottom: 9px;

        color: #7d897c;

        font-size: 10px;

        font-weight: 700;

        text-decoration: none;

    }


    .detail-back:hover {

        color: #579719;

    }


    .detail-title {

        margin: 0;

        color: #29422d;

        font-size: 20px;

        font-weight: 800;

        letter-spacing: -.02em;

    }


    .detail-subtitle {

        margin: 6px 0 0;

        color: #929d91;

        font-size: 11px;

    }


    .detail-status {

        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 9px 13px;

        border-radius: 10px;

        background: #eef7e7;

        color: #579719;

        font-size: 10px;

        font-weight: 800;

        white-space: nowrap;

    }


    .detail-status-dot {

        width: 7px;

        height: 7px;

        border-radius: 50%;

        background: #65ad20;

    }


    /* =====================================================
       GRID
    ====================================================== */

    .detail-grid {

        display: grid;

        grid-template-columns:
            minmax(0, 1.55fr)
            minmax(300px, .75fr);

        gap: 18px;

    }


    /* =====================================================
       CARD
    ====================================================== */

    .detail-card {

        background: #ffffff;

        border:
            1px solid #e5ede1;

        border-radius: 15px;

        overflow: hidden;

        box-shadow:
            0 3px 14px rgba(47, 75, 43, .035);

    }


    .detail-card + .detail-card {

        margin-top: 18px;

    }


    .detail-card-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 17px 19px;

        border-bottom:
            1px solid #edf2ea;

    }


    .detail-card-title {

        margin: 0;

        color: #334a35;

        font-size: 12px;

        font-weight: 800;

    }


    .detail-card-description {

        margin: 3px 0 0;

        color: #9aa49a;

        font-size: 9px;

    }


    .detail-card-body {

        padding: 19px;

    }


    /* =====================================================
       TRANSACTION NUMBER
    ====================================================== */

    .transaction-number-box {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 15px;

        border-radius: 12px;

        background: #f7faf5;

        border:
            1px solid #edf2e9;

    }


    .transaction-number-label {

        margin: 0 0 5px;

        color: #99a398;

        font-size: 8px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .06em;

    }


    .transaction-number {

        margin: 0;

        color: #29422d;

        font-size: 15px;

        font-weight: 800;

    }


    .transaction-date {

        margin: 4px 0 0;

        color: #929d91;

        font-size: 9px;

    }


    /* =====================================================
       INFO ROW
    ====================================================== */

    .info-list {

        display: flex;

        flex-direction: column;

    }


    .info-row {

        display: flex;

        align-items: flex-start;

        justify-content: space-between;

        gap: 20px;

        padding: 12px 0;

        border-bottom:
            1px solid #f0f3ee;

    }


    .info-row:first-child {

        padding-top: 0;

    }


    .info-row:last-child {

        padding-bottom: 0;

        border-bottom: 0;

    }


    .info-label {

        color: #929d91;

        font-size: 10px;

    }


    .info-value {

        max-width: 65%;

        color: #3f5141;

        font-size: 10px;

        font-weight: 700;

        text-align: right;

        word-break: break-word;

    }


    /* =====================================================
       MEMBER
    ====================================================== */

    .member-box {

        display: flex;

        align-items: center;

        gap: 12px;

        padding: 14px;

        border-radius: 12px;

        background: #f8faf7;

        border:
            1px solid #edf2e9;

    }


    .member-avatar {

        width: 42px;

        height: 42px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        border-radius: 12px;

        background: #65ad20;

        color: #ffffff;

        font-size: 13px;

        font-weight: 800;

    }


    .member-info {

        min-width: 0;

        flex: 1;

    }


    .member-name {

        margin: 0 0 3px;

        color: #344936;

        font-size: 11px;

        font-weight: 800;

    }


    .member-code {

        margin: 0;

        color: #929d91;

        font-size: 9px;

    }


    .member-detail-link {

        color: #579719;

        font-size: 9px;

        font-weight: 800;

        text-decoration: none;

    }


    .member-detail-link:hover {

        text-decoration: underline;

    }


    /* =====================================================
       PAYMENT
    ====================================================== */

    .payment-method {

        display: inline-flex;

        align-items: center;

        padding: 6px 9px;

        border-radius: 7px;

        background: #f1f6ed;

        color: #579719;

        font-size: 9px;

        font-weight: 800;

    }


    /* =====================================================
       SUMMARY
    ====================================================== */

    .summary-card {

        position: sticky;

        top: 84px;

    }


    .summary-total {

        padding: 19px;

        background: #f7faf5;

        border-bottom:
            1px solid #edf2e9;

    }


    .summary-total-label {

        margin: 0 0 6px;

        color: #929d91;

        font-size: 9px;

    }


    .summary-total-value {

        margin: 0;

        color: #29422d;

        font-size: 25px;

        font-weight: 800;

        letter-spacing: -.03em;

    }


    .summary-list {

        padding: 18px 19px;

    }


    .summary-row {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 9px 0;

    }


    .summary-row-label {

        color: #929d91;

        font-size: 10px;

    }


    .summary-row-value {

        color: #3e5040;

        font-size: 10px;

        font-weight: 700;

        text-align: right;

    }


    .summary-row.points {

        margin-top: 5px;

        padding: 12px;

        border-radius: 10px;

        background: #eef7e7;

    }


    .summary-row.points
    .summary-row-label {

        color: #579719;

        font-weight: 700;

    }


    .summary-row.points
    .summary-row-value {

        color: #579719;

        font-size: 13px;

    }


    /* =====================================================
       TIMELINE
    ====================================================== */

    .timeline {

        display: flex;

        flex-direction: column;

    }


    .timeline-item {

        position: relative;

        display: flex;

        gap: 12px;

        padding-bottom: 17px;

    }


    .timeline-item:last-child {

        padding-bottom: 0;

    }


    .timeline-line {

        position: absolute;

        top: 17px;

        left: 6px;

        width: 1px;

        height: calc(100% - 5px);

        background: #dfe9da;

    }


    .timeline-item:last-child
    .timeline-line {

        display: none;

    }


    .timeline-dot {

        width: 13px;

        height: 13px;

        margin-top: 2px;

        flex-shrink: 0;

        border-radius: 50%;

        background: #65ad20;

        border:
            3px solid #eef7e7;

        position: relative;

        z-index: 1;

    }


    .timeline-content {

        min-width: 0;

    }


    .timeline-title {

        margin: 0 0 3px;

        color: #425342;

        font-size: 10px;

        font-weight: 800;

    }


    .timeline-text {

        margin: 0;

        color: #99a398;

        font-size: 9px;

        line-height: 1.5;

    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 900px) {

        .detail-grid {

            grid-template-columns: 1fr;

        }


        .summary-card {

            position: static;

        }

    }


    @media (max-width: 600px) {

        .detail-header {

            align-items: flex-start;

            flex-direction: column;

        }


        .detail-title {

            font-size: 18px;

        }


        .detail-status {

            align-self: flex-start;

        }


        .detail-card-body {

            padding: 15px;

        }


        .detail-card-header {

            padding: 15px;

        }


        .transaction-number-box {

            align-items: flex-start;

            flex-direction: column;

        }


        .info-row {

            gap: 10px;

        }


        .info-value {

            max-width: 55%;

        }

    }

</style>


<div class="transaction-detail-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="detail-header">


        <div class="detail-header-left">

            <a
                href="{{ route('admin.transactions') }}"
                class="detail-back"
            >
                ← Kembali ke Transaksi
            </a>


            <h1 class="detail-title">
                Detail Transaksi
            </h1>


            <p class="detail-subtitle">
                Informasi lengkap transaksi member
            </p>

        </div>


        <div class="detail-status">

            <span class="detail-status-dot"></span>

            Berhasil

        </div>


    </div>



    <div class="detail-grid">


        {{-- =================================================
             LEFT COLUMN
        ================================================== --}}

        <div>


            {{-- TRANSACTION INFO --}}

            <div class="detail-card">


                <div class="detail-card-header">

                    <div>

                        <p class="detail-card-title">
                            Informasi Transaksi
                        </p>

                        <p class="detail-card-description">
                            Detail utama transaksi
                        </p>

                    </div>

                </div>


                <div class="detail-card-body">


                    <div class="transaction-number-box">


                        <div>

                            <p class="transaction-number-label">
                                Nomor Transaksi
                            </p>


                            <p class="transaction-number">

                                {{ $transaction->transaction_code
                                    ?? $transaction->code
                                    ?? '#' . $transaction->id
                                }}

                            </p>


                            <p class="transaction-date">

                                @if($transaction->created_at)

                                    {{ $transaction->created_at->format('d M Y, H:i') }}

                                @else

                                    -

                                @endif

                            </p>

                        </div>


                    </div>


                    <div
                        class="info-list"
                        style="margin-top: 18px;"
                    >


                        <div class="info-row">

                            <span class="info-label">
                                Status
                            </span>

                            <span class="info-value">
                                Berhasil
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Metode Pembayaran
                            </span>

                            <span class="info-value">

                                <span class="payment-method">

                                    {{ $transaction->payment_method
                                        ?? 'Cash'
                                    }}

                                </span>

                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Dibuat
                            </span>

                            <span class="info-value">

                                {{ $transaction->created_at
                                    ? $transaction->created_at->format('d M Y H:i')
                                    : '-'
                                }}

                            </span>

                        </div>


                        @if(isset($transaction->updated_at))

                            <div class="info-row">

                                <span class="info-label">
                                    Terakhir Diperbarui
                                </span>

                                <span class="info-value">

                                    {{ $transaction->updated_at->format('d M Y H:i') }}

                                </span>

                            </div>

                        @endif


                    </div>


                </div>


            </div>



            {{-- MEMBER --}}

            <div class="detail-card">


                <div class="detail-card-header">

                    <div>

                        <p class="detail-card-title">
                            Member
                        </p>

                        <p class="detail-card-description">
                            Member yang melakukan transaksi
                        </p>

                    </div>

                </div>


                <div class="detail-card-body">


                    @php

                        $member =
                            $transaction->member
                            ?? null;

                        $memberUser =
                            $member?->user
                            ?? null;

                        $memberName =
                            $memberUser?->name
                            ?? $member?->name
                            ?? 'Member';

                        $memberCode =
                            $member?->member_code
                            ?? '-';

                        $memberInitial =
                            strtoupper(
                                substr(
                                    $memberName,
                                    0,
                                    1
                                )
                            );

                    @endphp


                    <div class="member-box">


                        <div class="member-avatar">

                            {{ $memberInitial }}

                        </div>


                        <div class="member-info">

                            <p class="member-name">

                                {{ $memberName }}

                            </p>


                            <p class="member-code">

                                ID Member:
                                {{ $memberCode }}

                            </p>

                        </div>


                        @if($member)

                            <a
                                href="{{ route('admin.member.detail', $member) }}"
                                class="member-detail-link"
                            >
                                Lihat Member
                            </a>

                        @endif


                    </div>


                </div>


            </div>



            {{-- CATATAN --}}

            @if(!empty($transaction->note))

                <div class="detail-card">


                    <div class="detail-card-header">

                        <div>

                            <p class="detail-card-title">
                                Catatan
                            </p>

                        </div>

                    </div>


                    <div class="detail-card-body">

                        <p
                            style="
                                margin: 0;
                                color: #687568;
                                font-size: 10px;
                                line-height: 1.7;
                            "
                        >

                            {{ $transaction->note }}

                        </p>

                    </div>


                </div>

            @endif


        </div>



        {{-- =================================================
             RIGHT COLUMN
        ================================================== --}}

        <div>


            {{-- SUMMARY --}}

            <div
                class="detail-card summary-card"
            >


                <div class="detail-card-header">

                    <div>

                        <p class="detail-card-title">
                            Ringkasan Transaksi
                        </p>

                        <p class="detail-card-description">
                            Total pembayaran dan poin
                        </p>

                    </div>

                </div>


                <div class="summary-total">

                    <p class="summary-total-label">
                        Total Transaksi
                    </p>


                    <p class="summary-total-value">

                        Rp
                        {{ number_format(
                            $transaction->total_amount
                            ?? $transaction->amount
                            ?? $transaction->total
                            ?? 0,
                            0,
                            ',',
                            '.'
                        ) }}

                    </p>

                </div>


                <div class="summary-list">


                    <div class="summary-row">

                        <span class="summary-row-label">
                            Subtotal
                        </span>

                        <span class="summary-row-value">

                            Rp
                            {{ number_format(
                                $transaction->subtotal
                                ?? $transaction->total_amount
                                ?? $transaction->amount
                                ?? 0,
                                0,
                                ',',
                                '.'
                            ) }}

                        </span>

                    </div>


                    <div class="summary-row">

                        <span class="summary-row-label">
                            Diskon
                        </span>

                        <span class="summary-row-value">

                            Rp
                            {{ number_format(
                                $transaction->discount
                                ?? 0,
                                0,
                                ',',
                                '.'
                            ) }}

                        </span>

                    </div>


                    <div class="summary-row">

                        <span class="summary-row-label">
                            Pajak
                        </span>

                        <span class="summary-row-value">

                            Rp
                            {{ number_format(
                                $transaction->tax
                                ?? 0,
                                0,
                                ',',
                                '.'
                            ) }}

                        </span>

                    </div>


                    <div class="summary-row points">

                        <span class="summary-row-label">
                            Poin Didapat
                        </span>

                        <span class="summary-row-value">

                            +{{ $transaction->points_earned
                                ?? $transaction->points
                                ?? 0
                            }}

                        </span>

                    </div>


                </div>


            </div>


        </div>


    </div>


</div>

@endsection