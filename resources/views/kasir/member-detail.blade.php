@extends('kasir.layouts.app')

@section('title', 'Detail Member')

@section('content')

<style>
    .detail-page {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .detail-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 26px;
    }

    .back-button {
        width: 42px;
        height: 42px;
        flex-shrink: 0;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border: 1px solid #dfe9db;
        border-radius: 11px;

        background: #fff;
        color: #4f7041;

        text-decoration: none;

        font-size: 18px;
        font-weight: 800;

        transition: .2s ease;
    }

    .back-button:hover {
        background: #f4f8f1;
        border-color: #cdddc7;
    }

    .detail-header h1 {
        margin: 0 0 5px;

        color: #18351c;

        font-size: 29px;
        font-weight: 800;
    }

    .detail-header p {
        margin: 0;

        color: #718071;

        font-size: 13px;
        line-height: 1.6;
    }


    /* =========================================================
       GRID
    ========================================================= */

    .detail-grid {
        display: grid;

        grid-template-columns: 330px minmax(0, 1fr);

        gap: 22px;

        align-items: start;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .detail-card {
        overflow: hidden;

        background: #fff;

        border: 1px solid #e1eadb;
        border-radius: 20px;

        box-shadow: 0 8px 30px rgba(52, 91, 31, .06);
    }


    /* =========================================================
       PROFILE
    ========================================================= */

    .profile-card {
        padding: 30px 24px;

        text-align: center;
    }

    .profile-avatar {
        width: 82px;
        height: 82px;

        margin: 0 auto 17px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 24px;

        background: #65ad20;

        color: #fff;

        font-size: 29px;
        font-weight: 800;
    }

    .profile-name {
        margin: 0 0 6px;

        color: #18351c;

        font-size: 20px;
        font-weight: 800;
    }

    .profile-code {
        margin: 0;

        color: #718071;

        font-size: 12px;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .status {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        margin-top: 16px;

        padding: 7px 11px;

        border-radius: 9px;

        background: #eef8e7;

        color: #5b971e;

        font-size: 11px;
        font-weight: 800;
    }

    .status-dot {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #65ad20;
    }


    /* =========================================================
       POINT
    ========================================================= */

    .point-box {
        margin-top: 24px;

        padding: 19px;

        border: 1px solid #dcebd0;
        border-radius: 15px;

        background: #f4faed;
    }

    .point-label {
        margin: 0 0 6px;

        color: #718071;

        font-size: 11px;
    }

    .point-value {
        margin: 0;

        color: #579719;

        font-size: 28px;
        font-weight: 800;
    }

    .point-unit {
        font-size: 12px;
        font-weight: 700;
    }


    /* =========================================================
       CARD TITLE
    ========================================================= */

    .card-title {
        padding: 20px 24px;

        border-bottom: 1px solid #e7eee3;
    }

    .card-title h2 {
        margin: 0;

        color: #29422d;

        font-size: 17px;
        font-weight: 800;
    }

    .card-body {
        padding: 24px;
    }


    /* =========================================================
       INFORMATION
    ========================================================= */

    .info-list {
        display: flex;
        flex-direction: column;
    }

    .info-row {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 25px;

        padding: 15px 0;

        border-bottom: 1px solid #edf2ea;
    }

    .info-row:first-child {
        padding-top: 0;
    }

    .info-row:last-child {
        padding-bottom: 0;

        border-bottom: 0;
    }

    .info-label {
        color: #7a8579;

        font-size: 12px;
    }

    .info-value {
        color: #304532;

        font-size: 13px;
        font-weight: 700;

        text-align: right;

        word-break: break-word;
    }


    /* =========================================================
       MEMBER CODE
    ========================================================= */

    .code-value {
        display: inline-flex;

        padding: 6px 9px;

        border-radius: 8px;

        background: #f3f7ef;

        color: #5b861f;

        font-size: 11px;
        font-weight: 800;
    }


    /* =========================================================
       ACTIVITY
    ========================================================= */

    .activity-title {
        margin: 30px 0 14px;

        color: #29422d;

        font-size: 15px;
        font-weight: 800;
    }

    .activity-item {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        padding: 14px;

        border: 1px solid #e8eee5;
        border-radius: 12px;

        background: #fff;
    }

    .activity-left {
        display: flex;
        align-items: center;

        gap: 11px;
    }

    .activity-icon {
        width: 34px;
        height: 34px;
        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #f1f8e9;

        color: #65ad20;

        font-size: 11px;
        font-weight: 800;
    }

    .activity-name {
        margin: 0 0 3px;

        color: #354636;

        font-size: 12px;
        font-weight: 700;
    }

    .activity-date {
        margin: 0;

        color: #909a90;

        font-size: 10px;
        line-height: 1.5;
    }


    /* =========================================================
       ACTION
    ========================================================= */

    .action-row {
        display: flex;

        gap: 10px;

        margin-top: 25px;
    }

    .action-button {
        flex: 1;

        min-height: 44px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 0 14px;

        border-radius: 11px;

        text-decoration: none;

        font-size: 12px;
        font-weight: 800;

        transition: .2s ease;
    }

    .primary-button {
        background: #65ad20;

        color: #fff;

        box-shadow: 0 7px 16px rgba(101, 173, 32, .15);
    }

    .primary-button:hover {
        background: #579719;
        transform: translateY(-1px);
    }

    .secondary-button {
        border: 1px solid #dce7d8;

        background: #fff;

        color: #527d1d;
    }

    .secondary-button:hover {
        background: #f6f9f4;
    }


    /* =========================================================
       NOT FOUND
    ========================================================= */

    .not-found {
        padding: 70px 25px;

        text-align: center;
    }

    .not-found-icon {
        width: 70px;
        height: 70px;

        margin: 0 auto 18px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 20px;

        background: #f3f6f1;

        color: #97a197;

        font-size: 25px;
        font-weight: 800;
    }

    .not-found h2 {
        margin: 0 0 8px;

        color: #314432;

        font-size: 19px;
        font-weight: 800;
    }

    .not-found p {
        margin: 0 auto;

        max-width: 430px;

        color: #879287;

        font-size: 13px;
        line-height: 1.6;
    }

    .not-found-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-width: 190px;
        height: 44px;

        margin-top: 22px;

        padding: 0 16px;

        border-radius: 11px;

        background: #65ad20;

        color: #fff;

        text-decoration: none;

        font-size: 12px;
        font-weight: 800;
    }

    .not-found-button:hover {
        background: #579719;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 850px) {

        .detail-grid {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 600px) {

        .detail-page {
            max-width: 100%;
        }

        .detail-header {
            gap: 11px;
        }

        .detail-header h1 {
            font-size: 24px;
        }

        .detail-header p {
            font-size: 12px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            padding: 18px 20px;
        }

        .profile-card {
            padding: 26px 20px;
        }

        .info-row {
            align-items: flex-start;
            flex-direction: column;
            gap: 5px;
        }

        .info-value {
            text-align: left;
        }

        .action-row {
            flex-direction: column;
        }

        .action-button {
            width: 100%;
        }

    }
</style>


<div class="detail-page">


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="detail-header">

        <a
            href="{{ route('kasir.members') }}"
            class="back-button"
            title="Kembali ke Data Member"
        >
            ←
        </a>

        <div>

            <h1>
                Detail Member
            </h1>

            <p>
                Informasi lengkap mengenai member.
            </p>

        </div>

    </div>


    {{-- =========================================================
         MEMBER ADA
    ========================================================== --}}

    @if(isset($member) && $member)


        <div class="detail-grid">


            {{-- =================================================
                 PROFILE CARD
            ================================================== --}}

            <div class="detail-card">

                <div class="profile-card">


                    {{-- Avatar --}}

                    <div class="profile-avatar">

                        {{ strtoupper(
                            substr(
                                $member->user->name ?? 'M',
                                0,
                                1
                            )
                        ) }}

                    </div>


                    {{-- Nama --}}

                    <h2 class="profile-name">

                        {{ $member->user->name ?? '-' }}

                    </h2>


                    {{-- ID Member --}}

                    <p class="profile-code">

                        {{ $member->member_code }}

                    </p>


                    {{-- Status --}}

                    <span class="status">

                        <span class="status-dot"></span>

                        Member Aktif

                    </span>


                    {{-- Poin --}}

                    <div class="point-box">

                        <p class="point-label">
                            Total Poin
                        </p>

                        <p class="point-value">

                            {{ number_format(
                                $member->points ?? 0,
                                0,
                                ',',
                                '.'
                            ) }}

                            <span class="point-unit">
                                poin
                            </span>

                        </p>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 DETAIL CARD
            ================================================== --}}

            <div class="detail-card">


                {{-- Header Card --}}

                <div class="card-title">

                    <h2>
                        Informasi Member
                    </h2>

                </div>


                <div class="card-body">


                    {{-- =================================================
                         DATA MEMBER
                    ================================================== --}}

                    <div class="info-list">


                        {{-- ID Member --}}

                        <div class="info-row">

                            <span class="info-label">
                                ID Member
                            </span>

                            <span class="info-value">

                                <span class="code-value">

                                    {{ $member->member_code }}

                                </span>

                            </span>

                        </div>


                        {{-- Nama --}}

                        <div class="info-row">

                            <span class="info-label">
                                Nama Lengkap
                            </span>

                            <span class="info-value">

                                {{ $member->user->name ?? '-' }}

                            </span>

                        </div>


                        {{-- Email --}}

                        <div class="info-row">

                            <span class="info-label">
                                Email
                            </span>

                            <span class="info-value">

                                {{ $member->user->email ?? '-' }}

                            </span>

                        </div>


                        {{-- Nomor Telepon --}}

                        <div class="info-row">

                            <span class="info-label">
                                Nomor Telepon
                            </span>

                            <span class="info-value">

                                {{ $member->user->phone ?? '-' }}

                            </span>

                        </div>


                        {{-- Tanggal Daftar --}}

                        <div class="info-row">

                            <span class="info-label">
                                Terdaftar Sejak
                            </span>

                            <span class="info-value">

                                {{ $member->created_at
                                    ? $member->created_at->format('d M Y')
                                    : '-'
                                }}

                            </span>

                        </div>


                    </div>


                    {{-- =================================================
                         AKTIVITAS
                    ================================================== --}}

                    <h3 class="activity-title">
                        Aktivitas Member
                    </h3>


                    <div class="activity-item">


                        <div class="activity-left">


                            <div class="activity-icon">
                                M
                            </div>


                            <div>

                                <p class="activity-name">
                                    Data member aktif
                                </p>

                                <p class="activity-date">
                                    Member dapat digunakan untuk transaksi.
                                </p>

                            </div>


                        </div>


                    </div>


                    {{-- =================================================
                         ACTION BUTTON
                    ================================================== --}}

                    <div class="action-row">


                        {{-- Scan Member Lain --}}

                        <a
                            href="{{ route('kasir.member.scan') }}"
                            class="action-button secondary-button"
                        >
                            Scan Member Lain
                        </a>


                        {{-- Lanjut Transaksi --}}

                        <a
                            href="#"
                            class="action-button primary-button"
                        >
                            Lanjut Transaksi
                        </a>


                    </div>


                </div>

            </div>


        </div>


    {{-- =========================================================
         MEMBER TIDAK DITEMUKAN
    ========================================================== --}}

    @else


        <div class="detail-card">

            <div class="not-found">


                <div class="not-found-icon">
                    ?
                </div>


                <h2>
                    Member Tidak Ditemukan
                </h2>


                <p>
                    Data member yang kamu cari tidak tersedia
                    atau sudah tidak dapat ditemukan.
                </p>


                <a
                    href="{{ route('kasir.members') }}"
                    class="not-found-button"
                >
                    Kembali ke Data Member
                </a>


            </div>

        </div>


    @endif


</div>

@endsection