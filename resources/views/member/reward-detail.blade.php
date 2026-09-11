@extends('member.layouts.app')

@php
    $title = 'CHIAMATES - Detail Reward';
    $memberPoints = optional(auth()->user()->member)->points ?? 0;
    $rewardPoints = $reward->points_required ?? 0;
    $canRedeem = $memberPoints >= $rewardPoints && ($reward->stock > 0);
@endphp


@section('content')

<style>

    /* =====================================================
       PAGE HEADER
    ===================================================== */

    .reward-detail-header {
        margin-bottom: 25px;
    }


    .reward-back {
        display: inline-flex;

        align-items: center;

        gap: 8px;

        margin-bottom: 18px;

        color: var(--muted);

        font-size: 11px;

        font-weight: 700;

        transition: 0.2s ease;
    }


    .reward-back:hover {
        color: var(--green-dark);
    }


    .reward-detail-label {
        margin-bottom: 7px;

        color: var(--green-dark);

        font-size: 10px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: 0.6px;
    }


    .reward-detail-title {
        margin-bottom: 7px;

        font-size: 29px;

        line-height: 1.2;
    }


    .reward-detail-description {
        max-width: 720px;

        color: var(--muted);

        font-size: 13px;

        line-height: 1.6;
    }


    /* =====================================================
       DETAIL LAYOUT
    ===================================================== */

    .reward-detail-layout {
        display: grid;

        grid-template-columns:
            minmax(0, 1.15fr)
            minmax(300px, 0.85fr);

        gap: 22px;

        align-items: start;
    }


    /* =====================================================
       REWARD CARD
    ===================================================== */

    .reward-main-card {
        overflow: hidden;

        background: var(--white);

        border:
            1px solid var(--border);

        border-radius: 18px;

        box-shadow:
            0 12px 35px
            rgba(61, 91, 38, 0.07);
    }


    .reward-visual {
        position: relative;

        min-height: 285px;

        padding: 30px;

        display: flex;

        align-items: center;

        justify-content: center;

        overflow: hidden;

        background:
            linear-gradient(
                135deg,
                var(--green-dark),
                var(--green)
            );
    }


    .reward-visual::before {
        content: "";

        position: absolute;

        width: 220px;

        height: 220px;

        top: -100px;

        right: -50px;

        border-radius: 50%;

        background:
            rgba(255,255,255,0.10);
    }


    .reward-visual::after {
        content: "";

        position: absolute;

        width: 150px;

        height: 150px;

        bottom: -90px;

        left: -50px;

        border-radius: 50%;

        background:
            rgba(255,255,255,0.08);
    }


    .reward-ticket {
        position: relative;

        z-index: 2;

        width: min(410px, 90%);

        padding: 27px 25px;

        border-radius: 15px;

        background: var(--white);

        box-shadow:
            0 18px 40px
            rgba(25, 45, 15, 0.18);

        text-align: center;
    }


    .reward-ticket-category {
        margin-bottom: 9px;

        color: var(--green-dark);

        font-size: 9px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: 1px;
    }


    .reward-ticket-icon {
        width: 58px;

        height: 58px;

        margin:
            0 auto 13px;

        border-radius: 14px;

        background: var(--green-light);

        color: var(--green-dark);

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 22px;

        font-weight: 800;
    }


    .reward-ticket-name {
        color: var(--text);

        font-size: 19px;

        font-weight: 800;

        line-height: 1.35;
    }


    .reward-ticket-points {
        margin-top: 8px;

        color: var(--green-dark);

        font-size: 13px;

        font-weight: 800;
    }


    /* =====================================================
       DESCRIPTION
    ===================================================== */

    .reward-description-box {
        padding: 23px 25px;
    }


    .reward-section-title {
        margin-bottom: 11px;

        font-size: 15px;

        font-weight: 800;
    }


    .reward-description-text {
        color: var(--muted);

        font-size: 11px;

        line-height: 1.8;
    }


    .reward-info-list {
        margin-top: 20px;

        display: flex;

        flex-direction: column;
    }


    .reward-info-row {
        padding: 13px 0;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        border-bottom:
            1px solid #EDF1E9;
    }


    .reward-info-row:last-child {
        border-bottom: 0;
    }


    .reward-info-label {
        color: var(--muted);

        font-size: 10px;
    }


    .reward-info-value {
        color: var(--text);

        font-size: 10px;

        font-weight: 800;

        text-align: right;
    }


    /* =====================================================
       REDEEM PANEL
    ===================================================== */

    .redeem-card {
        padding: 24px;

        background: var(--white);

        border:
            1px solid var(--border);

        border-radius: 18px;

        box-shadow:
            0 12px 35px
            rgba(61, 91, 38, 0.07);
    }


    .redeem-card-title {
        margin-bottom: 5px;

        font-size: 17px;

        font-weight: 800;
    }


    .redeem-card-subtitle {
        margin-bottom: 21px;

        color: var(--muted);

        font-size: 10px;

        line-height: 1.6;
    }


    /* =====================================================
       POINT BALANCE
    ===================================================== */

    .point-box {
        margin-bottom: 14px;

        padding: 16px;

        border-radius: 12px;

        background: var(--green-light);
    }


    .point-box-label {
        margin-bottom: 6px;

        color: var(--muted);

        font-size: 9px;

        font-weight: 700;
    }


    .point-box-value {
        color: var(--green-dark);

        font-size: 24px;

        font-weight: 800;
    }


    .point-box-unit {
        color: var(--muted);

        font-size: 10px;

        font-weight: 700;
    }


    /* =====================================================
       COST
    ===================================================== */

    .cost-box {
        padding: 16px;

        border:
            1px solid var(--border);

        border-radius: 12px;

        background: #FCFDFB;
    }


    .cost-row {
        display: flex;

        justify-content: space-between;

        gap: 15px;

        padding: 9px 0;

        font-size: 10px;
    }


    .cost-row + .cost-row {
        border-top:
            1px solid #EDF1E9;
    }


    .cost-label {
        color: var(--muted);
    }


    .cost-value {
        font-weight: 800;

        text-align: right;
    }


    .cost-value.green {
        color: var(--green-dark);
    }


    /* =====================================================
       BUTTON
    ===================================================== */

    .redeem-button {
        width: 100%;

        min-height: 47px;

        margin-top: 17px;

        padding: 12px 18px;

        border: 0;

        border-radius: 11px;

        background:
            linear-gradient(
                135deg,
                var(--green-dark),
                var(--green)
            );

        color: var(--white);

        font-size: 11px;

        font-weight: 800;

        cursor: pointer;

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease,
            opacity 0.2s ease;
    }


    .redeem-button:hover {
        transform: translateY(-1px);

        box-shadow:
            0 8px 20px
            rgba(92, 148, 29, 0.22);
    }


    .redeem-button.disabled {
        background: #D8DDD3;

        color: #81877B;

        cursor: not-allowed;

        box-shadow: none;
    }


    .redeem-button.disabled:hover {
        transform: none;
    }


    /* =====================================================
       WARNING
    ===================================================== */

    .redeem-warning {
        margin-top: 12px;

        padding: 11px 12px;

        border-radius: 9px;

        background: #FFF7E7;

        color: #916B20;

        font-size: 9px;

        line-height: 1.6;
    }


    .redeem-success {
        margin-top: 12px;

        padding: 11px 12px;

        border-radius: 9px;

        background: var(--green-light);

        color: var(--green-dark);

        font-size: 9px;

        line-height: 1.6;
    }


    /* =====================================================
       NOTE
    ===================================================== */

    .reward-note {
        margin-top: 15px;

        color: var(--muted);

        font-size: 8px;

        line-height: 1.6;

        text-align: center;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 900px) {

        .reward-detail-layout {
            grid-template-columns: 1fr;
        }


        .redeem-card {
            order: -1;
        }

    }


    @media (max-width: 600px) {

        .reward-detail-title {
            font-size: 25px;
        }


        .reward-visual {
            min-height: 240px;

            padding: 20px;
        }


        .reward-ticket {
            padding: 22px 18px;
        }


        .reward-ticket-name {
            font-size: 17px;
        }


        .reward-description-box {
            padding: 20px;
        }


        .redeem-card {
            padding: 20px;
        }

    }

</style>



{{-- =====================================================
     HEADER
====================================================== --}}

<div class="reward-detail-header">


    <a
        href="{{ route('member.rewards') }}"
        class="reward-back"
    >

        <span>
            ←
        </span>

        <span>
            Kembali ke Reward
        </span>

    </a>


    <div class="reward-detail-label">
        Detail Reward
    </div>


    <h1 class="reward-detail-title">
        {{ $reward['name'] }}
    </h1>


    <p class="reward-detail-description">
        Lihat informasi reward dan jumlah poin
        yang diperlukan untuk menukarkannya.
    </p>


</div>



{{-- =====================================================
     MAIN CONTENT
====================================================== --}}

<div class="reward-detail-layout">


    {{-- =================================================
         LEFT
    ================================================== --}}

    <section class="reward-main-card">


        {{-- VISUAL --}}

        <div class="reward-visual">


            <div class="reward-ticket">

                <div class="reward-ticket-category">
                    Reward
                </div>

                <div class="reward-ticket-icon">
                    🎁
                </div>

                <div class="reward-ticket-name">
                    {{ $reward->name }}
                </div>

                <div class="reward-ticket-points">
                    {{ number_format($rewardPoints, 0, ',', '.') }} Poin
                </div>

            </div>

        </div>

        {{-- DESCRIPTION --}}
        <div class="reward-description-box">

            <h2 class="reward-section-title">
                Tentang Reward
            </h2>

            <p class="reward-description-text">
                {{ $reward->description ?? 'Tukarkan poin Anda dengan reward menarik dari CHIAMATES.' }}
            </p>

            <div class="reward-info-list">

                <div class="reward-info-row">
                    <span class="reward-info-label">Nama Reward</span>
                    <span class="reward-info-value">{{ $reward->name }}</span>
                </div>

                <div class="reward-info-row">
                    <span class="reward-info-label">Stok Tersedia</span>
                    <span class="reward-info-value">{{ $reward->stock }} pcs</span>
                </div>

                <div class="reward-info-row">
                    <span class="reward-info-label">Poin Dibutuhkan</span>
                    <span class="reward-info-value">{{ number_format($rewardPoints, 0, ',', '.') }} Poin</span>
                </div>

                <div class="reward-info-row">
                    <span class="reward-info-label">Status</span>
                    <span class="reward-info-value">{{ $reward->stock > 0 ? 'Tersedia' : 'Habis' }}</span>
                </div>

            </div>

        </div>

    </section>

    {{-- =================================================
         RIGHT
    ================================================== --}}
    <aside class="redeem-card">

        <h2 class="redeem-card-title">
            Tukarkan Reward
        </h2>

        <p class="redeem-card-subtitle">
            Pastikan jumlah poin kamu cukup sebelum melanjutkan penukaran reward.
        </p>

        {{-- SALDO MEMBER --}}
        <div class="point-box">
            <div class="point-box-label">
                POIN KAMU
            </div>
            <div class="point-box-value">
                {{ number_format($memberPoints, 0, ',', '.') }}
                <span class="point-box-unit">Poin</span>
            </div>
        </div>

        {{-- PERHITUNGAN --}}
        <div class="cost-box">
            <div class="cost-row">
                <span class="cost-label">Harga Reward</span>
                <span class="cost-value">{{ number_format($rewardPoints, 0, ',', '.') }} Poin</span>
            </div>
            <div class="cost-row">
                <span class="cost-label">Sisa Setelah Redeem</span>
                <span class="cost-value {{ $canRedeem ? 'green' : '' }}">
                    @if ($canRedeem)
                        {{ number_format($memberPoints - $rewardPoints, 0, ',', '.') }} Poin
                    @else
                        -
                    @endif
                </span>
            </div>
        </div>

        {{-- BUTTON --}}
        @if ($canRedeem)
            <a
                href="{{ route('member.reward.confirm', ['reward' => $reward->id]) }}"
                class="redeem-button"
                style="display:flex; align-items:center; justify-content:center;"
            >
                Lanjut ke Checkout
            </a>
            <div class="redeem-success">
                Poin kamu cukup untuk menukarkan reward ini.
            </div>
        @else
            <button
                type="button"
                class="redeem-button disabled"
                disabled
            >
                @if($reward->stock <= 0)
                    Stok Reward Habis
                @else
                    Poin Tidak Mencukupi
                @endif
            </button>
            <div class="redeem-warning">
                @if($reward->stock <= 0)
                    Stok reward saat ini sedang habis.
                @else
                    Poin kamu belum mencukupi untuk menukarkan reward ini.
                @endif
            </div>
        @endif



        <div class="reward-note">

            Penukaran reward akan diproses setelah
            kamu melakukan konfirmasi.

        </div>


    </aside>


</div>

@endsection