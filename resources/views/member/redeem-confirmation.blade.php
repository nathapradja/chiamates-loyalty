@extends('member.layouts.app')

@php
    $title = 'CHIAMATES - Checkout Reward';

    $memberPoints = optional(auth()->user()->member)->points ?? 0;
    $rewardPoints = $reward->points_required ?? 0;
    $remainingPoints = $memberPoints - $rewardPoints;
    $canRedeem = $memberPoints >= $rewardPoints && ($reward->stock > 0);
@endphp


@section('content')

<style>

    /* =====================================================
       HEADER
    ===================================================== */

    .redeem-confirm-header {
        margin-bottom: 25px;
    }

    .redeem-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        margin-bottom: 18px;

        color: var(--muted);

        font-size: 11px;
        font-weight: 700;

        transition: 0.2s ease;
    }

    .redeem-back:hover {
        color: var(--green-dark);
    }

    .redeem-label {
        margin-bottom: 7px;

        color: var(--green-dark);

        font-size: 10px;
        font-weight: 800;

        text-transform: uppercase;
        letter-spacing: 0.6px;
    }

    .redeem-title {
        margin-bottom: 7px;

        font-size: 29px;
        line-height: 1.2;
    }

    .redeem-subtitle {
        max-width: 700px;

        color: var(--muted);

        font-size: 13px;
        line-height: 1.6;
    }


    /* =====================================================
       LAYOUT
    ===================================================== */

    .redeem-confirm-layout {
        display: grid;

        grid-template-columns:
            minmax(0, 1fr)
            minmax(300px, 380px);

        gap: 22px;

        align-items: start;
    }


    /* =====================================================
       MAIN CARD
    ===================================================== */

    .redeem-confirm-card {
        padding: 25px;

        background: var(--white);

        border: 1px solid var(--border);

        border-radius: 18px;

        box-shadow:
            0 12px 35px
            rgba(61, 91, 38, 0.07);
    }


    .confirm-card-title {
        margin-bottom: 5px;

        font-size: 17px;
        font-weight: 800;
    }

    .confirm-card-description {
        margin-bottom: 23px;

        color: var(--muted);

        font-size: 10px;
        line-height: 1.6;
    }


    /* =====================================================
       REWARD SUMMARY
    ===================================================== */

    .reward-summary {
        padding: 18px;

        display: flex;

        align-items: center;

        gap: 15px;

        border-radius: 13px;

        background: var(--green-light);
    }


    .reward-summary-icon {
        flex: 0 0 auto;

        width: 55px;
        height: 55px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 13px;

        background: var(--white);

        color: var(--green-dark);

        font-size: 20px;
        font-weight: 800;
    }


    .reward-summary-content {
        min-width: 0;
    }


    .reward-summary-category {
        margin-bottom: 4px;

        color: var(--green-dark);

        font-size: 8px;
        font-weight: 800;

        text-transform: uppercase;
        letter-spacing: 0.7px;
    }


    .reward-summary-name {
        margin-bottom: 4px;

        color: var(--text);

        font-size: 14px;
        font-weight: 800;
        line-height: 1.35;
    }


    .reward-summary-points {
        color: var(--muted);

        font-size: 9px;
        font-weight: 700;
    }


    /* =====================================================
       TRANSACTION DETAILS
    ===================================================== */

    .confirm-section {
        margin-top: 24px;
    }


    .confirm-section-title {
        margin-bottom: 11px;

        font-size: 13px;
        font-weight: 800;
    }


    .confirm-list {
        overflow: hidden;

        border: 1px solid var(--border);

        border-radius: 12px;
    }


    .confirm-row {
        min-height: 48px;

        padding: 12px 15px;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        background: var(--white);
    }


    .confirm-row + .confirm-row {
        border-top: 1px solid #EDF1E9;
    }


    .confirm-row-label {
        color: var(--muted);

        font-size: 10px;
    }


    .confirm-row-value {
        color: var(--text);

        font-size: 10px;
        font-weight: 800;

        text-align: right;
    }


    .confirm-row-value.green {
        color: var(--green-dark);
    }


    /* =====================================================
       WARNING / INFO
    ===================================================== */

    .confirm-info {
        margin-top: 18px;

        padding: 13px 15px;

        border-radius: 10px;

        background: #F7F9F5;

        color: var(--muted);

        font-size: 9px;

        line-height: 1.7;
    }


    .confirm-warning {
        margin-top: 18px;

        padding: 13px 15px;

        border-radius: 10px;

        background: #FFF7E7;

        color: #916B20;

        font-size: 9px;

        line-height: 1.7;
    }


    /* =====================================================
       RIGHT PANEL
    ===================================================== */

    .confirm-action-card {
        padding: 24px;

        background: var(--white);

        border: 1px solid var(--border);

        border-radius: 18px;

        box-shadow:
            0 12px 35px
            rgba(61, 91, 38, 0.07);
    }


    .action-title {
        margin-bottom: 5px;

        font-size: 17px;
        font-weight: 800;
    }


    .action-subtitle {
        margin-bottom: 20px;

        color: var(--muted);

        font-size: 10px;
        line-height: 1.6;
    }


    /* =====================================================
       POINT BALANCE
    ===================================================== */

    .balance-box {
        padding: 17px;

        margin-bottom: 13px;

        border-radius: 12px;

        background: var(--green-light);
    }


    .balance-label {
        margin-bottom: 6px;

        color: var(--muted);

        font-size: 9px;
        font-weight: 700;
    }


    .balance-value {
        color: var(--green-dark);

        font-size: 23px;
        font-weight: 800;
    }


    .balance-unit {
        color: var(--muted);

        font-size: 9px;
        font-weight: 700;
    }


    /* =====================================================
       FINAL CALCULATION
    ===================================================== */

    .final-calculation {
        padding: 15px;

        border: 1px solid var(--border);

        border-radius: 12px;

        background: #FCFDFB;
    }


    .calculation-row {
        padding: 9px 0;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        font-size: 10px;
    }


    .calculation-row + .calculation-row {
        border-top: 1px solid #EDF1E9;
    }


    .calculation-label {
        color: var(--muted);
    }


    .calculation-value {
        font-weight: 800;

        text-align: right;
    }


    .calculation-value.green {
        color: var(--green-dark);
    }


    /* =====================================================
       CONFIRM BUTTON
    ===================================================== */

    .confirm-button {
        width: 100%;

        min-height: 48px;

        margin-top: 17px;

        padding: 12px 18px;

        display: flex;

        align-items: center;

        justify-content: center;

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
            box-shadow 0.2s ease;
    }


    .confirm-button:hover {
        transform: translateY(-1px);

        box-shadow:
            0 8px 20px
            rgba(92, 148, 29, 0.22);
    }


    .confirm-button.disabled {
        background: #D8DDD3;

        color: #81877B;

        cursor: not-allowed;
    }


    .confirm-button.disabled:hover {
        transform: none;

        box-shadow: none;
    }


    /* =====================================================
       CANCEL BUTTON
    ===================================================== */

    .cancel-button {
        width: 100%;

        min-height: 43px;

        margin-top: 9px;

        display: flex;

        align-items: center;

        justify-content: center;

        border: 1px solid var(--border);

        border-radius: 11px;

        background: var(--white);

        color: var(--muted);

        font-size: 10px;
        font-weight: 800;

        transition: 0.2s ease;
    }


    .cancel-button:hover {
        border-color: var(--green);

        color: var(--green-dark);
    }


    .action-note {
        margin-top: 14px;

        color: var(--muted);

        font-size: 8px;

        line-height: 1.6;

        text-align: center;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 900px) {

        .redeem-confirm-layout {
            grid-template-columns: 1fr;
        }

        .confirm-action-card {
            order: -1;
        }

    }


    @media (max-width: 600px) {

        .redeem-title {
            font-size: 25px;
        }

        .redeem-confirm-card {
            padding: 20px;
        }

        .confirm-action-card {
            padding: 20px;
        }

        .reward-summary {
            padding: 15px;
        }

    }

</style>


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="redeem-confirm-header">

    <a
        href="{{ route('member.rewards') }}"
        class="redeem-back"
    >
        <span>←</span>
        <span>
            Kembali ke Daftar Reward
        </span>
    </a>

    <div class="redeem-label">
        Checkout Reward
    </div>

    <h1 class="redeem-title">
        Konfirmasi Checkout Reward
    </h1>

    <p class="redeem-subtitle">
        Periksa kembali detail reward sebelum membuat resi checkout. Poin tidak akan langsung terpotong.
    </p>

</div>

<div class="redeem-confirm-layout">

    <section class="redeem-confirm-card">

        <h2 class="confirm-card-title">
            Detail Reward Dipilih
        </h2>

        <p class="confirm-card-description">
            Pastikan reward yang kamu pilih sudah sesuai dengan kebutuhan kamu.
        </p>

        <div class="reward-summary">

            <div class="reward-summary-content">

                <div class="reward-summary-category">
                    Reward Chiamates
                </div>

                <div class="reward-summary-name">
                    {{ $reward->name }}
                </div>

                <div class="reward-summary-points">
                    Biaya Penukaran: <strong>{{ number_format($rewardPoints, 0, ',', '.') }} Poin</strong>
                </div>

            </div>

        </div>

        <div class="confirm-section">

            <h3 class="confirm-section-title">
                Ringkasan Poin
            </h3>

            <div class="confirm-list">

                <div class="confirm-row">
                    <span class="confirm-row-label">Nama Reward</span>
                    <span class="confirm-row-value">{{ $reward->name }}</span>
                </div>

                <div class="confirm-row">
                    <span class="confirm-row-label">Stok Tersedia</span>
                    <span class="confirm-row-value">{{ $reward->stock }} pcs</span>
                </div>

                <div class="confirm-row">
                    <span class="confirm-row-label">Saldo Poin Kamu Saat Ini</span>
                    <span class="confirm-row-value">{{ number_format($memberPoints, 0, ',', '.') }} Poin</span>
                </div>

                <div class="confirm-row">
                    <span class="confirm-row-label">Poin yang Dibutuhkan</span>
                    <span class="confirm-row-value">{{ number_format($rewardPoints, 0, ',', '.') }} Poin</span>
                </div>

                <div class="confirm-row">
                    <span class="confirm-row-label">Estimasi Sisa Poin Setelah di Kasir</span>
                    <span class="confirm-row-value green">
                        @if ($canRedeem)
                            {{ number_format($remainingPoints, 0, ',', '.') }} Poin
                        @else
                            Poin tidak mencukupi
                        @endif
                    </span>
                </div>

            </div>

        </div>

        <div class="confirm-info" style="border-left: 4px solid var(--green); background: #f4faed; color: #355325;">
            <strong>Catatan Penting:</strong><br>
            Saat kamu menekan tombol <strong>"Checkout & Buat Resi QR"</strong>, sistem akan menghasilkan <strong>Kode Resi dan QR Code Redeem</strong>.
            <br>
            Saldo poin kamu <strong>BELUM AKAN DIPOTONG</strong> sekarang. Poin baru akan dipotong setelah QR Code / Resi tersebut di-scan dan diselesaikan oleh kasir di outlet.
        </div>

    </section>

    <aside class="confirm-action-card">

        <h2 class="action-title">
            Lanjutkan Checkout
        </h2>

        <p class="action-subtitle">
            Klik tombol di bawah untuk menerbitkan resi penukaran reward.
        </p>

        <div class="balance-box">
            <div class="balance-label">
                SALDO POIN SAAT INI
            </div>
            <div class="balance-value">
                {{ number_format($memberPoints, 0, ',', '.') }}
                <span class="balance-unit">Poin</span>
            </div>
        </div>

        <div class="final-calculation">
            <div class="calculation-row">
                <span class="calculation-label">Biaya Reward</span>
                <span class="calculation-value">- {{ number_format($rewardPoints, 0, ',', '.') }} Poin</span>
            </div>
            <div class="calculation-row">
                <span class="calculation-label">Sisa Poin (Estimasi)</span>
                <span class="calculation-value green">
                    @if ($canRedeem)
                        {{ number_format($remainingPoints, 0, ',', '.') }} Poin
                    @else
                        -
                    @endif
                </span>
            </div>
        </div>

        @if ($canRedeem)
            <form method="POST" action="{{ route('member.reward.checkout', $reward->id) }}" style="margin-top: 15px;">
                @csrf
                <button type="submit" class="confirm-button">
                    Checkout & Buat Resi QR
                </button>
            </form>
        @else
            <button type="button" class="confirm-button disabled" disabled>
                @if($reward->stock <= 0)
                    Stok Reward Habis
                @else
                    Poin Tidak Mencukupi
                @endif
            </button>
        @endif

        <a href="{{ route('member.rewards') }}" class="cancel-button">
            Batal
        </a>

        <div class="action-note">
            Resi berlaku selama 7 hari sebelum kedaluwarsa.
        </div>

    </aside>

</div>


<script>

    function showRedeemMessage() {

        alert(
            'Redeem berhasil dikonfirmasi.\\n\\n' +
            'Untuk sementara ini masih tampilan frontend. ' +
            'Proses pengurangan poin dan penyimpanan riwayat ' +
            'akan kita sambungkan ke backend setelah UI selesai.'
        );

    }

</script>

@endsection