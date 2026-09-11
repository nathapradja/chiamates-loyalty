@extends('kasir.layouts.app')

@section('title', 'Dashboard Kasir')

@section('page-title', 'Dashboard Kasir')


@section('content')

    <div class="dashboard-page">

        {{-- =====================================================
             HEADER
        ===================================================== --}}

        <div class="dashboard-header">

            <div>

                <div class="dashboard-eyebrow">
                    CHIAMATES · KASIR
                </div>

                <h1>
                    Selamat datang,
                    {{ auth()->user()->name ?? 'Kasir' }}
                </h1>

                <p>
                    Kelola member dan transaksi loyalty
                    melalui dashboard kasir.
                </p>

            </div>

        </div>


        {{-- =====================================================
             QUICK ACTION
        ===================================================== --}}

        <div class="quick-action-grid">

            <a
                href="{{ route('kasir.member.scan') }}"
                class="quick-action primary"
            >

                <div class="quick-action-content">

                    <strong>
                        Scan Member
                    </strong>

                    <span>
                        Cari dan identifikasi member
                        sebelum melakukan transaksi.
                    </span>

                </div>

                <div class="quick-action-arrow">
                    →
                </div>

            </a>


            <a
                href="{{ route('kasir.member.register') }}"
                class="quick-action"
            >

                <div class="quick-action-content">

                    <strong>
                        Registrasi Member
                    </strong>

                    <span>
                        Daftarkan member baru
                        ke sistem CHIAMATES.
                    </span>

                </div>

                <div class="quick-action-arrow">
                    →
                </div>

            </a>

        </div>


        {{-- =====================================================
             RINGKASAN
        ===================================================== --}}

        <div class="section-heading">

            <div>

                <h2>
                    Ringkasan Hari Ini
                </h2>

                <p>
                    Aktivitas kasir pada hari ini.
                </p>

            </div>

        </div>


        <div class="stats-grid">

            {{-- MEMBER --}}

            <div class="stat-card">

                <div class="stat-label">
                    Member Dilayani
                </div>

                <div class="stat-value">
                    0
                </div>

                <div class="stat-description">
                    Jumlah member yang diproses hari ini.
                </div>

            </div>


            {{-- TRANSAKSI --}}

            <div class="stat-card">

                <div class="stat-label">
                    Transaksi
                </div>

                <div class="stat-value">
                    0
                </div>

                <div class="stat-description">
                    Jumlah transaksi yang dibuat hari ini.
                </div>

            </div>


            {{-- POIN --}}

            <div class="stat-card">

                <div class="stat-label">
                    Poin Ditambahkan
                </div>

                <div class="stat-value">
                    0
                </div>

                <div class="stat-description">
                    Total poin dari transaksi hari ini.
                </div>

            </div>

        </div>


        {{-- =====================================================
             ALUR TRANSAKSI
        ===================================================== --}}

        <div class="transaction-info">

            <div class="transaction-info-header">

                <h2>
                    Alur Transaksi
                </h2>

                <span>
                    4 langkah
                </span>

            </div>


            <div class="transaction-steps">

                <div class="transaction-step">

                    <div class="step-number">
                        1
                    </div>

                    <div class="step-content">

                        <strong>
                            Scan Member
                        </strong>

                        <span>
                            Masukkan atau scan kode member.
                        </span>

                    </div>

                </div>


                <div class="transaction-step">

                    <div class="step-number">
                        2
                    </div>

                    <div class="step-content">

                        <strong>
                            Periksa Member
                        </strong>

                        <span>
                            Pastikan data member sudah benar.
                        </span>

                    </div>

                </div>


                <div class="transaction-step">

                    <div class="step-number">
                        3
                    </div>

                    <div class="step-content">

                        <strong>
                            Masukkan Transaksi
                        </strong>

                        <span>
                            Masukkan detail transaksi member.
                        </span>

                    </div>

                </div>


                <div class="transaction-step">

                    <div class="step-number">
                        4
                    </div>

                    <div class="step-content">

                        <strong>
                            Konfirmasi
                        </strong>

                        <span>
                            Simpan transaksi dan tambahkan poin.
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <style>

        /* =====================================================
           DASHBOARD PAGE
        ===================================================== */

        .dashboard-page {

            width: 100%;

            max-width: 1180px;

            margin: 0 auto;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .dashboard-header {

            margin-bottom: 25px;
        }


        .dashboard-eyebrow {

            margin-bottom: 7px;

            color: var(--green-dark);

            font-size: 9px;

            font-weight: 850;

            letter-spacing: 1px;
        }


        .dashboard-header h1 {

            color: var(--text);

            font-size: 25px;

            line-height: 1.3;

            font-weight: 850;

            letter-spacing: -0.6px;
        }


        .dashboard-header p {

            max-width: 600px;

            margin-top: 7px;

            color: var(--muted);

            font-size: 10px;

            line-height: 1.7;
        }


        /* =====================================================
           QUICK ACTION
        ===================================================== */

        .quick-action-grid {

            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 14px;

            margin-bottom: 32px;
        }


        .quick-action {

            min-height: 105px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 15px;

            border:
                1px solid var(--border);

            border-radius: 15px;

            background:
                var(--white);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                border-color 0.2s ease;
        }


        .quick-action:hover {

            transform:
                translateY(-2px);

            border-color:
                #C9D7BB;

            box-shadow:
                0 10px 28px
                rgba(47, 65, 35, 0.08);
        }


        .quick-action.primary {

            border-color:
                #D4E5B8;

            background:
                var(--green-soft);
        }


        .quick-action-content {

            min-width: 0;

            flex: 1;
        }


        .quick-action-content strong {

            display: block;

            color: var(--text);

            font-size: 13px;

            font-weight: 850;
        }


        .quick-action-content span {

            display: block;

            max-width: 360px;

            margin-top: 6px;

            color: var(--muted);

            font-size: 9px;

            line-height: 1.6;
        }


        .quick-action-arrow {

            color:
                var(--green-dark);

            font-size: 19px;

            font-weight: 800;
        }


        /* =====================================================
           SECTION HEADING
        ===================================================== */

        .section-heading {

            margin-bottom: 14px;
        }


        .section-heading h2 {

            color: var(--text);

            font-size: 15px;

            font-weight: 850;
        }


        .section-heading p {

            margin-top: 4px;

            color: var(--muted);

            font-size: 9px;
        }


        /* =====================================================
           STATISTICS
        ===================================================== */

        .stats-grid {

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 14px;
        }


        .stat-card {

            min-height: 145px;

            padding: 19px;

            border:
                1px solid var(--border);

            border-radius: 15px;

            background:
                var(--white);
        }


        .stat-label {

            color: var(--muted);

            font-size: 10px;

            font-weight: 750;
        }


        .stat-value {

            margin-top: 17px;

            color: var(--text);

            font-size: 29px;

            line-height: 1;

            font-weight: 900;
        }


        .stat-description {

            margin-top: 8px;

            color: #98A192;

            font-size: 8px;

            line-height: 1.5;
        }


        /* =====================================================
           TRANSACTION INFO
        ===================================================== */

        .transaction-info {

            margin-top: 23px;

            padding: 19px;

            border:
                1px solid var(--border);

            border-radius: 15px;

            background:
                var(--white);
        }


        .transaction-info-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-bottom: 17px;
        }


        .transaction-info-header h2 {

            color: var(--text);

            font-size: 13px;

            font-weight: 850;
        }


        .transaction-info-header span {

            padding: 5px 9px;

            border-radius: 20px;

            background:
                var(--green-soft);

            color:
                var(--green-dark);

            font-size: 8px;

            font-weight: 800;
        }


        .transaction-steps {

            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 12px;
        }


        .transaction-step {

            min-width: 0;

            padding: 13px;

            border:
                1px solid #EDF0EA;

            border-radius: 11px;

            background:
                #FAFBF9;
        }


        .step-number {

            width: 27px;

            height: 27px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 10px;

            border-radius: 8px;

            background:
                var(--green);

            color:
                var(--white);

            font-size: 9px;

            font-weight: 900;
        }


        .step-content strong {

            display: block;

            color: var(--text);

            font-size: 9px;

            font-weight: 850;
        }


        .step-content span {

            display: block;

            margin-top: 5px;

            color: var(--muted);

            font-size: 8px;

            line-height: 1.55;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 850px) {

            .transaction-steps {

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

        }


        @media (max-width: 700px) {

            .quick-action-grid {

                grid-template-columns:
                    1fr;
            }


            .stats-grid {

                grid-template-columns:
                    1fr;
            }

        }


        @media (max-width: 480px) {

            .dashboard-header h1 {

                font-size: 21px;
            }


            .transaction-steps {

                grid-template-columns:
                    1fr;
            }


            .quick-action {

                min-height: 95px;

                padding: 16px;
            }

        }

    </style>

@endsection