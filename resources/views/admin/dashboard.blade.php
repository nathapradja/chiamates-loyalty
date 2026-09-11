@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<style>
    .admin-dashboard {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
    }

    /* HEADER */

    .dashboard-header {
        margin-bottom: 28px;
    }

    .dashboard-header h1 {
        margin: 0 0 7px;
        color: #18351c;
        font-size: 30px;
        line-height: 1.2;
        font-weight: 800;
    }

    .dashboard-header p {
        margin: 0;
        color: #7c887b;
        font-size: 13px;
        line-height: 1.6;
    }

    /* STATISTIC */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 17px;
        margin-bottom: 22px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;
        padding: 21px;
        border: 1px solid #e1eadb;
        border-radius: 18px;
        background: #ffffff;
        box-shadow: 0 7px 25px rgba(52, 91, 31, .05);
    }

    .stat-card::after {
        content: "";
        position: absolute;
        right: -30px;
        bottom: -35px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        background: #f2f8ed;
    }

    .stat-content {
        position: relative;
        z-index: 1;
    }

    .stat-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .stat-label {
        margin: 0 0 8px;
        color: #879287;
        font-size: 10px;
        font-weight: 800;
    }

    .stat-number {
        margin: 0;
        color: #29422d;
        font-size: 27px;
        line-height: 1;
        font-weight: 800;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 12px;
        background: #eef7e7;
        color: #579719;
        font-size: 12px;
        font-weight: 800;
    }

    .stat-note {
        margin: 15px 0 0;
        color: #9aa499;
        font-size: 9px;
    }

    /* MAIN */

    .dashboard-main {
        display: grid;
        grid-template-columns: minmax(0, 1.5fr) minmax(280px, .8fr);
        gap: 20px;
    }

    .dashboard-card {
        overflow: hidden;
        border: 1px solid #e1eadb;
        border-radius: 18px;
        background: #ffffff;
        box-shadow: 0 8px 30px rgba(52, 91, 31, .045);
    }

    .card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #e9eee6;
    }

    .card-header h2 {
        margin: 0 0 5px;
        color: #29422d;
        font-size: 16px;
        font-weight: 800;
    }

    .card-header p {
        margin: 0;
        color: #909b8e;
        font-size: 10px;
    }

    .card-body {
        padding: 22px;
    }

    /* ACTIVITY */

    .activity-empty {
        padding: 40px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 45px;
        height: 45px;
        margin: 0 auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: #f2f7ef;
        color: #82a273;
        font-size: 13px;
        font-weight: 800;
    }

    .empty-title {
        margin: 0 0 5px;
        color: #526252;
        font-size: 11px;
        font-weight: 800;
    }

    .empty-text {
        max-width: 300px;
        margin: 0 auto;
        color: #9ba49a;
        font-size: 9px;
        line-height: 1.6;
    }

    /* QUICK ACCESS */

    .quick-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 11px;
    }

    .quick-item {
        min-height: 90px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 14px;
        border: 1px solid #e3ebe0;
        border-radius: 14px;
        background: #ffffff;
        text-decoration: none;
        transition: .18s ease;
    }

    .quick-item:hover {
        transform: translateY(-1px);
        background: #f7faf5;
        border-color: #d5e5cb;
    }

    .quick-icon {
        width: 29px;
        height: 29px;
        margin-bottom: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #eef7e7;
        color: #579719;
        font-size: 9px;
        font-weight: 800;
    }

    .quick-title {
        margin: 0 0 3px;
        color: #435443;
        font-size: 10px;
        font-weight: 800;
    }

    .quick-description {
        margin: 0;
        color: #9ba49a;
        font-size: 8px;
        line-height: 1.4;
    }

    /* SYSTEM INFO */

    .system-info {
        margin-top: 20px;
        padding: 18px;
        border: 1px solid #dcebd0;
        border-radius: 15px;
        background: #f4faed;
    }

    .system-info h3 {
        margin: 0 0 6px;
        color: #426b20;
        font-size: 11px;
        font-weight: 800;
    }

    .system-info p {
        margin: 0;
        color: #788676;
        font-size: 9px;
        line-height: 1.65;
    }

    /* RESPONSIVE */

    @media (max-width: 1100px) {

        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .dashboard-main {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 650px) {

        .dashboard-header h1 {
            font-size: 25px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .quick-grid {
            grid-template-columns: 1fr 1fr;
        }

        .card-header,
        .card-body {
            padding: 17px;
        }

    }

    @media (max-width: 430px) {

        .quick-grid {
            grid-template-columns: 1fr;
        }

    }
</style>


<div class="admin-dashboard">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="dashboard-header">

        <h1>
            Dashboard
        </h1>

        <p>
            Selamat datang di panel administrasi
            Chiamates.
        </p>

    </div>


    {{-- =====================================================
         STATISTIK
    ====================================================== --}}

    <div class="stats-grid">


        {{-- MEMBER --}}

        <div class="stat-card">

            <div class="stat-content">

                <div class="stat-head">

                    <div>

                        <p class="stat-label">
                            TOTAL MEMBER
                        </p>

                        <p class="stat-number">
                            {{ \App\Models\Member::count() }}
                        </p>

                    </div>

                    <div class="stat-icon">
                        M
                    </div>

                </div>

                <p class="stat-note">
                    Member yang terdaftar pada sistem.
                </p>

            </div>

        </div>


        {{-- TRANSAKSI --}}

        <div class="stat-card">

            <div class="stat-content">

                <div class="stat-head">

                    <div>

                        <p class="stat-label">
                            TRANSAKSI
                        </p>

                        <p class="stat-number">
                            {{ \App\Models\Transaction::count() }}
                        </p>

                    </div>

                    <div class="stat-icon">
                        T
                    </div>

                </div>

                <p class="stat-note">
                    Total transaksi yang tercatat.
                </p>

            </div>

        </div>


        {{-- POIN --}}

        <div class="stat-card">

            <div class="stat-content">

                <div class="stat-head">

                    <div>

                        <p class="stat-label">
                            TOTAL POIN
                        </p>

                        <p class="stat-number">
                            {{ number_format(\App\Models\Member::sum('points')) }}
                        </p>

                    </div>

                    <div class="stat-icon">
                        P
                    </div>

                </div>

                <p class="stat-note">
                    Total poin yang tercatat.
                </p>

            </div>

        </div>


        {{-- REWARD --}}

        <div class="stat-card">

            <div class="stat-content">

                <div class="stat-head">

                    <div>

                        <p class="stat-label">
                            REWARD
                        </p>

                        <p class="stat-number">
                            {{ \App\Models\Reward::count() }}
                        </p>

                    </div>

                    <div class="stat-icon">
                        R
                    </div>

                </div>

                <p class="stat-note">
                    Reward yang tersedia.
                </p>

            </div>

        </div>


    </div>


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <div class="dashboard-main">


        {{-- AKTIVITAS --}}

        <div class="dashboard-card">

            <div class="card-header">

                <h2>
                    Aktivitas Terbaru
                </h2>

                <p>
                    Ringkasan aktivitas sistem.
                </p>

            </div>

            <div class="card-body">

                <div class="activity-empty">

                    <div class="empty-icon">
                        A
                    </div>

                    <p class="empty-title">
                        Belum ada aktivitas
                    </p>

                    <p class="empty-text">
                        Aktivitas member, transaksi,
                        poin, dan reward akan tampil
                        di bagian ini.
                    </p>

                </div>

            </div>

        </div>


        {{-- MENU CEPAT --}}

        <div class="dashboard-card">

            <div class="card-header">

                <h2>
                    Menu Cepat
                </h2>

                <p>
                    Akses fitur administrasi.
                </p>

            </div>

            <div class="card-body">

                <div class="quick-grid">


                    <a
                        href="{{ route('admin.members') }}"
                        class="quick-item"
                    >

                        <span class="quick-icon">
                            M
                        </span>

                        <p class="quick-title">
                            Data Member
                        </p>

                        <p class="quick-description">
                            Kelola data member.
                        </p>

                    </a>


                    <a
                        href="{{ route('admin.transactions') }}"
                        class="quick-item"
                    >

                        <span class="quick-icon">
                            T
                        </span>

                        <p class="quick-title">
                            Transaksi
                        </p>

                        <p class="quick-description">
                            Lihat data transaksi.
                        </p>

                    </a>


                    <a
                        href="{{ route('admin.users.index') }}"
                        class="quick-item"
                    >

                        <span class="quick-icon">
                            U
                        </span>

                        <p class="quick-title">
                            Pengguna
                        </p>

                        <p class="quick-description">
                            Kelola akun pengguna.
                        </p>

                    </a>


                    <a
                        href="{{ route('admin.reports.index') }}"
                        class="quick-item"
                    >

                        <span class="quick-icon">
                            L
                        </span>

                        <p class="quick-title">
                            Laporan
                        </p>

                        <p class="quick-description">
                            Lihat laporan.
                        </p>

                    </a>


                </div>


                <div class="system-info">

                    <h3>
                        Sistem Loyalty
                    </h3>

                    <p>
                        Dashboard admin digunakan untuk
                        memantau member, transaksi,
                        poin, reward, dan aktivitas
                        sistem loyalty.
                    </p>

                </div>

            </div>

        </div>


    </div>


</div>

@endsection