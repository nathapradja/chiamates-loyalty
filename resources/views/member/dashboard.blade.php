@extends('member.layouts.app')

@php
    $title = 'CHIAMATES - Dashboard';
@endphp

@section('content')

<style>

    .dashboard-header {
        margin-bottom: 25px;
    }


    .dashboard-label {
        color: var(--green-dark);

        font-size: 11px;

        font-weight: 800;

        margin-bottom: 7px;

        text-transform: uppercase;

        letter-spacing: 0.5px;
    }


    .dashboard-title {
        font-size: 29px;

        line-height: 1.2;

        margin-bottom: 7px;
    }


    .dashboard-description {
        color: var(--muted);

        font-size: 13px;

        line-height: 1.6;
    }


    .welcome-card {
        position: relative;

        overflow: hidden;

        margin-bottom: 20px;

        padding: 28px 30px;

        border-radius: 18px;

        color: white;

        background:
            linear-gradient(
                135deg,
                var(--green-dark),
                var(--green)
            );

        box-shadow:
            0 14px 35px
            rgba(92, 148, 29, 0.20);
    }


    .welcome-card::after {
        content: "";

        position: absolute;

        width: 180px;

        height: 180px;

        right: -55px;

        top: -70px;

        border-radius: 50%;

        background:
            rgba(255,255,255,0.10);
    }


    .welcome-small {
        position: relative;

        z-index: 2;

        font-size: 10px;

        font-weight: 700;

        margin-bottom: 7px;

        opacity: 0.85;
    }


    .welcome-title {
        position: relative;

        z-index: 2;

        font-size: 23px;

        margin-bottom: 7px;
    }


    .welcome-description {
        position: relative;

        z-index: 2;

        max-width: 600px;

        font-size: 11px;

        line-height: 1.7;

        opacity: 0.9;
    }


    .stats-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 16px;

        margin-bottom: 20px;
    }


    .stat-card {
        padding: 20px;

        background: white;

        border:
            1px solid var(--border);

        border-radius: 15px;

        box-shadow:
            0 9px 28px
            rgba(61, 91, 38, 0.06);
    }


    .stat-label {
        color: var(--muted);

        font-size: 10px;

        font-weight: 700;

        text-transform: uppercase;

        margin-bottom: 12px;
    }


    .stat-value {
        font-size: 23px;

        font-weight: 800;
    }


    .stat-unit {
        color: var(--muted);

        font-size: 10px;

        font-weight: 600;
    }


    .stat-note {
        margin-top: 7px;

        color: var(--muted);

        font-size: 9px;
    }


    .dashboard-grid {
        display: grid;

        grid-template-columns:
            1.4fr 1fr;

        gap: 20px;
    }


    .dashboard-card {
        background: white;

        border:
            1px solid var(--border);

        border-radius: 16px;

        overflow: hidden;

        box-shadow:
            0 10px 30px
            rgba(61, 91, 38, 0.07);
    }


    .card-heading {
        padding:
            19px 21px;

        border-bottom:
            1px solid var(--border);

        font-size: 15px;

        font-weight: 800;
    }


    .card-body {
        padding: 20px 21px;
    }


    .quick-grid {
        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 10px;
    }


    .quick-item {
        padding: 15px;

        border:
            1px solid var(--border);

        border-radius: 11px;

        background: #FCFDFB;

        transition: 0.2s;
    }


    .quick-item:hover {
        background: var(--green-light);
    }


    .quick-icon {
        width: 31px;

        height: 31px;

        margin-bottom: 9px;

        border-radius: 8px;

        background: var(--green-light);

        color: var(--green-dark);

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 11px;

        font-weight: 800;
    }


    .quick-title {
        font-size: 11px;

        font-weight: 800;

        margin-bottom: 4px;
    }


    .quick-text {
        color: var(--muted);

        font-size: 9px;

        line-height: 1.5;
    }


    .info-row {
        display: flex;

        justify-content: space-between;

        gap: 15px;

        padding: 13px 0;

        border-bottom:
            1px solid #EDF1E9;
    }


    .info-row:first-child {
        padding-top: 0;
    }


    .info-row:last-child {
        padding-bottom: 0;

        border-bottom: 0;
    }


    .info-label {
        color: var(--muted);

        font-size: 10px;
    }


    .info-value {
        max-width: 65%;

        text-align: right;

        font-size: 10px;

        font-weight: 800;

        word-break: break-word;
    }


    @media (max-width: 900px) {

        .dashboard-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 700px) {

        .stats-grid {
            grid-template-columns: 1fr;
        }


        .quick-grid {
            grid-template-columns: 1fr;
        }


        .dashboard-title {
            font-size: 25px;
        }


        .welcome-card {
            padding: 23px 20px;
        }

    }

</style>


<div class="dashboard-header">

    <div class="dashboard-label">
        MEMBER CHIAMATES
    </div>

    <h1 class="dashboard-title">
        Dashboard
    </h1>

    <p class="dashboard-description">
        Kelola akun, poin, kartu member,
        dan reward kamu di satu tempat.
    </p>

</div>


<section class="welcome-card">

    <div class="welcome-small">
        SELAMAT DATANG DI CHIAMATES
    </div>

    <h2 class="welcome-title">
        Halo, {{ auth()->user()->name }} 
    </h2>

    <p class="welcome-description">
        Senang melihat kamu kembali.
        Gunakan poinmu dan nikmati berbagai
        keuntungan sebagai member CHIAMATES.
    </p>

</section>


<section class="stats-grid">


    <div class="stat-card">

        <div class="stat-label">
            Total Poin
        </div>

        <div class="stat-value">

            {{ number_format(optional(auth()->user()->member)->points ?? 0, 0, ',', '.') }}

            <span class="stat-unit">
                Poin
            </span>

        </div>

        <div class="stat-note">
            Poin yang tersedia saat ini
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-label">
            ID Member
        </div>

        <div class="stat-value">

            {{ optional(auth()->user()->member)->member_code ?? '-' }}

        </div>

        <div class="stat-note">
            Identitas member CHIAMATES
        </div>

    </div>


    <div class="stat-card">

        <div class="stat-label">
            Status
        </div>

        <div class="stat-value">
            Aktif
        </div>

        <div class="stat-note">
            Member kamu masih aktif
        </div>

    </div>


</section>


<section class="dashboard-grid">


    <div class="dashboard-card">

        <div class="card-heading">
            Akses Cepat
        </div>

        <div class="card-body">

            <div class="quick-grid">


                <a
                    href="{{ route('member.card') }}"
                    class="quick-item"
                >

                    <div class="quick-icon">
                        K
                    </div>

                    <div class="quick-title">
                        Kartu Member
                    </div>

                    <div class="quick-text">
                        Lihat kartu member digital kamu.
                    </div>

                </a>


                <a
                    href="{{ route('member.points.history') }}"
                    class="quick-item"
                >

                    <div class="quick-icon">
                        P
                    </div>

                    <div class="quick-title">
                        Riwayat Poin
                    </div>

                    <div class="quick-text">
                        Lihat aktivitas poin kamu.
                    </div>

                </a>


                <a
                    href="{{ route('member.rewards') }}"
                    class="quick-item"
                >

                    <div class="quick-icon">
                        R
                    </div>

                    <div class="quick-title">
                        Reward
                    </div>

                    <div class="quick-text">
                        Lihat reward yang tersedia.
                    </div>

                </a>


                <a
                    href="{{ route('member.profile') }}"
                    class="quick-item"
                >

                    <div class="quick-icon">
                        U
                    </div>

                    <div class="quick-title">
                        Profil Saya
                    </div>

                    <div class="quick-text">
                        Kelola informasi profil kamu.
                    </div>

                </a>


            </div>

        </div>

    </div>


    <div class="dashboard-card">

        <div class="card-heading">
            Informasi Member
        </div>

        <div class="card-body">


            <div class="info-row">

                <span class="info-label">
                    Nama
                </span>

                <span class="info-value">
                    {{ auth()->user()->name }}
                </span>

            </div>


            <div class="info-row">

                <span class="info-label">
                    Email
                </span>

                <span class="info-value">
                    {{ auth()->user()->email }}
                </span>

            </div>


            <div class="info-row">

                <span class="info-label">
                    ID Member
                </span>

                <span class="info-value">
                    {{ optional(auth()->user()->member)->member_code ?? '-' }}
                </span>

            </div>


            <div class="info-row">

                <span class="info-label">
                    No. Telepon
                </span>

                <span class="info-value">
                    {{ optional(auth()->user()->member)->phone ?? '-' }}
                </span>

            </div>


        </div>

    </div>

    


</section>

@endsection