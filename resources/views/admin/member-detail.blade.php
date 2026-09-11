@extends('admin.layouts.app')

@section('title', 'Detail Member')

@section('content')

<style>
    .member-detail-page {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
    }

    .page-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .page-heading-left h1 {
        margin: 0 0 6px;
        color: #29422d;
        font-size: 26px;
        font-weight: 800;
    }

    .page-heading-left p {
        margin: 0;
        color: #899589;
        font-size: 12px;
        line-height: 1.6;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        min-height: 40px;
        padding: 0 14px;
        border: 1px solid #dce7d8;
        border-radius: 10px;
        background: #ffffff;
        color: #527d1d;
        text-decoration: none;
        font-size: 11px;
        font-weight: 800;
        transition: .18s ease;
    }

    .back-button:hover {
        background: #f3f8ef;
    }

    .member-hero {
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 25px;
        align-items: center;
        padding: 25px;
        margin-bottom: 20px;
        background: #ffffff;
        border: 1px solid #e1eadb;
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(52, 91, 31, .05);
    }

    .member-identity {
        display: flex;
        align-items: center;
        gap: 17px;
        min-width: 0;
    }

    .member-avatar-large {
        width: 70px;
        height: 70px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background: #65ad20;
        color: #ffffff;
        font-size: 24px;
        font-weight: 800;
    }

    .member-identity h2 {
        margin: 0 0 5px;
        color: #29422d;
        font-size: 20px;
        font-weight: 800;
    }

    .member-identity p {
        margin: 0;
        color: #899589;
        font-size: 11px;
    }

    .member-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 10px;
        padding: 6px 10px;
        border-radius: 999px;
        background: #eef7e7;
        color: #579719;
        font-size: 10px;
        font-weight: 800;
    }

    .member-status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #65ad20;
    }

    .point-summary {
        min-width: 190px;
        padding: 18px 22px;
        border-radius: 15px;
        background: #f4faed;
        border: 1px solid #dcebd0;
        text-align: right;
    }

    .point-summary-label {
        margin: 0 0 5px;
        color: #7c8b78;
        font-size: 10px;
        font-weight: 700;
    }

    .point-summary-value {
        margin: 0;
        color: #579719;
        font-size: 28px;
        font-weight: 800;
    }

    .point-summary-unit {
        color: #7c8b78;
        font-size: 10px;
        font-weight: 700;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 20px;
    }

    .stat-card {
        padding: 18px;
        background: #ffffff;
        border: 1px solid #e1eadb;
        border-radius: 15px;
        box-shadow: 0 7px 25px rgba(52, 91, 31, .04);
    }

    .stat-label {
        margin: 0 0 9px;
        color: #899589;
        font-size: 10px;
        font-weight: 700;
    }

    .stat-value {
        margin: 0;
        color: #29422d;
        font-size: 20px;
        font-weight: 800;
    }

    .content-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 340px;
        gap: 20px;
        align-items: start;
    }

    .card {
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e1eadb;
        border-radius: 17px;
        box-shadow: 0 7px 25px rgba(52, 91, 31, .04);
    }

    .card-header {
        padding: 18px 20px;
        border-bottom: 1px solid #edf1eb;
    }

    .card-header h3 {
        margin: 0 0 4px;
        color: #29422d;
        font-size: 14px;
        font-weight: 800;
    }

    .card-header p {
        margin: 0;
        color: #929c91;
        font-size: 10px;
    }

    .card-body {
        padding: 20px;
    }

    .info-list {
        display: grid;
        gap: 0;
    }

    .info-row {
        display: grid;
        grid-template-columns: 150px 1fr;
        gap: 20px;
        padding: 13px 0;
        border-bottom: 1px solid #edf1eb;
    }

    .info-row:first-child {
        padding-top: 0;
    }

    .info-row:last-child {
        padding-bottom: 0;
        border-bottom: 0;
    }

    .info-label {
        color: #899589;
        font-size: 10px;
        font-weight: 700;
    }

    .info-value {
        color: #405342;
        font-size: 11px;
        font-weight: 800;
    }

    .transaction-table {
        width: 100%;
        border-collapse: collapse;
    }

    .transaction-table th {
        padding: 11px 10px;
        background: #f7faf5;
        color: #879287;
        font-size: 9px;
        font-weight: 800;
        text-align: left;
    }

    .transaction-table td {
        padding: 13px 10px;
        border-bottom: 1px solid #edf1eb;
        color: #536153;
        font-size: 10px;
    }

    .transaction-table tr:last-child td {
        border-bottom: 0;
    }

    .transaction-status {
        display: inline-flex;
        padding: 5px 8px;
        border-radius: 999px;
        background: #eef7e7;
        color: #579719;
        font-size: 8px;
        font-weight: 800;
    }

    .transaction-empty {
        padding: 35px 15px;
        text-align: center;
        color: #9aa49a;
        font-size: 11px;
    }

    .side-section {
        margin-bottom: 18px;
    }

    .side-section:last-child {
        margin-bottom: 0;
    }

    .level-box {
        padding: 18px;
        border-radius: 14px;
        background: #f4faed;
        border: 1px solid #dcebd0;
    }

    .level-name {
        margin: 0 0 5px;
        color: #579719;
        font-size: 16px;
        font-weight: 800;
    }

    .level-description {
        margin: 0;
        color: #7c8b78;
        font-size: 10px;
        line-height: 1.6;
    }

    .progress-wrap {
        margin-top: 15px;
    }

    .progress-label {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 7px;
        color: #71806e;
        font-size: 9px;
        font-weight: 700;
    }

    .progress {
        height: 7px;
        overflow: hidden;
        border-radius: 999px;
        background: #e1eadb;
    }

    .progress-bar {
        width: 65%;
        height: 100%;
        border-radius: inherit;
        background: #65ad20;
    }

    .action-list {
        display: grid;
        gap: 8px;
    }

    .action-button {
        width: 100%;
        min-height: 42px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0 12px;
        border: 1px solid #dfe8dc;
        border-radius: 10px;
        background: #ffffff;
        color: #526252;
        text-decoration: none;
        font-size: 10px;
        font-weight: 800;
        transition: .18s ease;
    }

    .action-button:hover {
        background: #f5f9f2;
        border-color: #cdddc5;
        color: #579719;
    }

    .action-icon {
        width: 26px;
        height: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: #f3f8ef;
        color: #579719;
        font-size: 9px;
        font-weight: 800;
    }

    @media (max-width: 950px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 700px) {
        .member-hero {
            grid-template-columns: 1fr;
        }

        .point-summary {
            text-align: left;
        }

        .page-heading {
            flex-direction: column;
        }
    }

    @media (max-width: 520px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .member-identity {
            align-items: flex-start;
        }

        .member-avatar-large {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            font-size: 18px;
        }

        .info-row {
            grid-template-columns: 1fr;
            gap: 5px;
        }

        .transaction-table {
            min-width: 620px;
        }

        .card-body {
            overflow-x: auto;
        }
    }
</style>


<div class="member-detail-page">

    {{-- HEADER --}}
    <div class="page-heading">

        <div class="page-heading-left">

            <h1>
                Detail Member
            </h1>

            <p>
                Informasi lengkap member dan aktivitas loyalty.
            </p>

        </div>

        <a
            href="{{ url()->previous() }}"
            class="back-button"
        >
            ←
            Kembali
        </a>

    </div>


    {{-- MEMBER HERO --}}
    <div class="member-hero">

        <div class="member-identity">

            <div class="member-avatar-large">

                {{
                    strtoupper(
                        substr(
                            $member->user->name ?? 'M',
                            0,
                            1
                        )
                    )
                }}

            </div>

            <div>

                <h2>
                    {{ $member->user->name ?? 'Member' }}
                </h2>

                <p>
                    ID Member:
                    {{ $member->member_code ?? '-' }}
                </p>

                <div class="member-status">

                    <span class="member-status-dot"></span>

                    Member Aktif

                </div>

            </div>

        </div>


        <div class="point-summary">

            <p class="point-summary-label">
                Total Poin
            </p>

            <p class="point-summary-value">
                {{ number_format($member->points ?? 0, 0, ',', '.') }}
            </p>

            <span class="point-summary-unit">
                poin tersedia
            </span>

        </div>

    </div>


    {{-- STATISTICS --}}
    <div class="stats-grid">

        <div class="stat-card">

            <p class="stat-label">
                Total Transaksi
            </p>

            <p class="stat-value">
                {{ $member->transactions_count ?? 0 }}
            </p>

        </div>


        <div class="stat-card">

            <p class="stat-label">
                Total Belanja
            </p>

            <p class="stat-value">
                Rp
                {{ number_format($member->total_spending ?? 0, 0, ',', '.') }}
            </p>

        </div>


        <div class="stat-card">

            <p class="stat-label">
                Poin Didapat
            </p>

            <p class="stat-value">
                {{ number_format($member->earned_points ?? ($member->points ?? 0), 0, ',', '.') }}
            </p>

        </div>


        <div class="stat-card">

            <p class="stat-label">
                Poin Digunakan
            </p>

            <p class="stat-value">
                {{ number_format($member->redeemed_points ?? 0, 0, ',', '.') }}
            </p>

        </div>

    </div>


    <div class="content-grid">


        {{-- INFORMASI MEMBER --}}
        <div>

            <div class="card">

                <div class="card-header">

                    <h3>
                        Informasi Member
                    </h3>

                    <p>
                        Data dasar akun member.
                    </p>

                </div>


                <div class="card-body">

                    <div class="info-list">

                        <div class="info-row">

                            <span class="info-label">
                                Nama Lengkap
                            </span>

                            <span class="info-value">
                                {{ $member->user->name ?? '-' }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                ID Member
                            </span>

                            <span class="info-value">
                                {{ $member->member_code ?? '-' }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Email
                            </span>

                            <span class="info-value">
                                {{ $member->user->email ?? '-' }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Nomor Telepon
                            </span>

                            <span class="info-value">
                                {{ $member->phone ?? $member->user->phone ?? '-' }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Tanggal Bergabung
                            </span>

                            <span class="info-value">

                                {{
                                    optional(
                                        $member->created_at
                                    )->format('d M Y')
                                    ?? '-'
                                }}

                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Status
                            </span>

                            <span class="info-value">
                                Aktif
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- RIWAYAT TRANSAKSI --}}
            <div
                class="card"
                style="margin-top:20px;"
            >

                <div class="card-header">

                    <h3>
                        Riwayat Transaksi
                    </h3>

                    <p>
                        Aktivitas transaksi member terbaru.
                    </p>

                </div>


                <div class="card-body">

                    @if(
                        isset($member->transactions) &&
                        $member->transactions &&
                        $member->transactions->count()
                    )

                        <table class="transaction-table">

                            <thead>

                                <tr>

                                    <th>
                                        Tanggal
                                    </th>

                                    <th>
                                        Transaksi
                                    </th>

                                    <th>
                                        Poin
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach(
                                    $member->transactions as $transaction
                                )

                                    <tr>

                                        <td>
                                            {{
                                                optional(
                                                    $transaction->created_at
                                                )->format('d/m/Y H:i')
                                            }}
                                        </td>

                                        <td>
                                            Rp
                                            {{
                                                number_format(
                                                    $transaction->amount ?? 0,
                                                    0,
                                                    ',',
                                                    '.'
                                                )
                                            }}
                                        </td>

                                        <td>
                                            +
                                            {{
                                                $transaction->points ?? 0
                                            }}
                                            poin
                                        </td>

                                        <td>

                                            <span class="transaction-status">
                                                Selesai
                                            </span>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    @else

                        <div class="transaction-empty">

                            Belum ada riwayat transaksi
                            untuk member ini.

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- SIDEBAR DETAIL --}}
        <div>


            {{-- LEVEL --}}
            <div class="card side-section">

                <div class="card-header">

                    <h3>
                        Level Member
                    </h3>

                    <p>
                        Status loyalty member.
                    </p>

                </div>

                <div class="card-body">

                    <div class="level-box">

                        <p class="level-name">
                            {{ $member->level ?? 'Member' }}
                        </p>

                        <p class="level-description">
                            Level member berdasarkan
                            aktivitas dan akumulasi poin.
                        </p>


                        <div class="progress-wrap">

                            <div class="progress-label">

                                <span>
                                    Progress level
                                </span>

                                <span>
                                    65%
                                </span>

                            </div>


                            <div class="progress">

                                <div class="progress-bar"></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- AKSI --}}
            <div class="card side-section">

                <div class="card-header">

                    <h3>
                        Aksi Member
                    </h3>

                    <p>
                        Pengelolaan data member.
                    </p>

                </div>


                <div class="card-body">

                    <div class="action-list">

                        <a
                            href="#"
                            class="action-button"
                        >

                            <span class="action-icon">
                                E
                            </span>

                            <span>
                                Edit Data Member
                            </span>

                        </a>


                        <a
                            href="#"
                            class="action-button"
                        >

                            <span class="action-icon">
                                P
                            </span>

                            <span>
                                Riwayat Poin
                            </span>

                        </a>


                        <a
                            href="#"
                            class="action-button"
                        >

                            <span class="action-icon">
                                R
                            </span>

                            <span>
                                Riwayat Redeem
                            </span>

                        </a>

                    </div>

                </div>

            </div>


            {{-- AKTIVITAS --}}
            <div class="card">

                <div class="card-header">

                    <h3>
                        Ringkasan Loyalty
                    </h3>

                    <p>
                        Informasi singkat aktivitas member.
                    </p>

                </div>


                <div class="card-body">

                    <div class="info-list">

                        <div class="info-row">

                            <span class="info-label">
                                Poin Saat Ini
                            </span>

                            <span class="info-value">
                                {{ $member->points ?? 0 }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Transaksi
                            </span>

                            <span class="info-value">
                                {{ $member->transactions_count ?? 0 }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Status Akun
                            </span>

                            <span class="info-value">
                                Aktif
                            </span>

                        </div>

                    </div>

                </div>

            </div>


        </div>

    </div>

</div>

@endsection