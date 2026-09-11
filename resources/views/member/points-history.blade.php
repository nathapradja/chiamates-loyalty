@extends('member.layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CHIAMATES - Riwayat Poin</title>

    <style>

        :root {
            --green: #78B82A;
            --green-dark: #5C941D;
            --green-light: #F2F8E8;

            --orange: #F28C00;
            --red: #E53935;

            --text: #26351D;
            --muted: #747C6E;

            --white: #FFFFFF;
            --bg: #F7FAF4;

            --border: #E3EBD9;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            min-height: 100vh;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            color: var(--text);

            background: var(--bg);
        }


        a {
            text-decoration: none;
            color: inherit;
        }


        button {
            font-family: inherit;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .header {
            width: 100%;

            height: 74px;

            background: var(--white);

            border-bottom:
                1px solid var(--border);

            position: sticky;

            top: 0;

            z-index: 100;
        }


        .header-inner {
            width: 100%;

            max-width: 1180px;

            height: 100%;

            margin: 0 auto;

            padding: 0 25px;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .logo img {
            width: 145px;

            height: auto;

            display: block;
        }


        .logo-text {
            color: var(--green);

            font-size: 25px;

            font-weight: 800;
        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        .nav {
            display: flex;

            align-items: center;

            gap: 8px;
        }


        .nav-link {
            padding:
                9px 13px;

            border-radius: 8px;

            color: var(--muted);

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s;
        }


        .nav-link:hover {
            color: var(--green-dark);

            background:
                var(--green-light);
        }


        .nav-link.active {
            color: var(--green-dark);

            background:
                var(--green-light);
        }


        .logout-form {
            margin: 0;
        }


        .logout-button {
            border: 0;

            background: transparent;

            cursor: pointer;

            padding:
                9px 13px;

            border-radius: 8px;

            color: var(--muted);

            font-size: 13px;

            font-weight: 600;
        }


        .logout-button:hover {
            color: var(--red);

            background:
                #FFF2F1;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            width: 100%;

            max-width: 1180px;

            margin: 0 auto;

            padding:
                38px 25px 60px;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {
            margin-bottom: 25px;
        }


        .page-label {
            color: var(--green-dark);

            font-size: 12px;

            font-weight: 700;

            margin-bottom: 7px;

            text-transform: uppercase;

            letter-spacing: 0.5px;
        }


        .page-title {
            font-size: 30px;

            line-height: 1.2;

            margin-bottom: 8px;
        }


        .page-description {
            color: var(--muted);

            font-size: 14px;

            line-height: 1.6;
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .summary {
            display: grid;

            grid-template-columns:
                1fr
                1fr;

            gap: 18px;

            margin-bottom: 22px;
        }


        .summary-card {
            padding:
                23px 25px;

            border:
                1px solid var(--border);

            border-radius: 16px;

            background:
                var(--white);

            box-shadow:
                0 10px 30px
                rgba(61, 91, 38, 0.07);
        }


        .summary-label {
            color: var(--muted);

            font-size: 11px;

            font-weight: 600;

            margin-bottom: 8px;
        }


        .summary-value {
            font-size: 28px;

            font-weight: 800;

            color: var(--green-dark);
        }


        .summary-unit {
            font-size: 12px;

            color: var(--muted);

            font-weight: 600;

            margin-left: 4px;
        }


        .member-code {
            font-size: 18px;

            font-weight: 800;

            margin-bottom: 5px;

            word-break: break-word;
        }


        .member-name {
            color: var(--muted);

            font-size: 12px;
        }


        /* =====================================================
           HISTORY CARD
        ===================================================== */

        .history-card {
            background:
                var(--white);

            border:
                1px solid var(--border);

            border-radius: 17px;

            box-shadow:
                0 12px 35px
                rgba(61, 91, 38, 0.08);

            overflow: hidden;
        }


        .history-header {
            padding:
                24px 25px;

            border-bottom:
                1px solid var(--border);

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;
        }


        .history-title {
            font-size: 18px;
        }


        .history-subtitle {
            color: var(--muted);

            font-size: 11px;

            margin-top: 5px;
        }


        /* =====================================================
           HISTORY LIST
        ===================================================== */

        .history-list {
            width: 100%;
        }


        .history-item {
            display: grid;

            grid-template-columns:
                48px
                1fr
                auto;

            gap: 15px;

            align-items: center;

            padding:
                19px 25px;

            border-bottom:
                1px solid #EDF1E9;
        }


        .history-item:last-child {
            border-bottom: 0;
        }


        .history-icon {
            width: 42px;

            height: 42px;

            border-radius: 11px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;

            font-weight: 800;
        }


        .history-icon.plus {
            color: var(--green-dark);

            background:
                var(--green-light);
        }


        .history-icon.minus {
            color: var(--orange);

            background:
                #FFF4E4;
        }


        .history-info {
            min-width: 0;
        }


        .history-name {
            font-size: 13px;

            font-weight: 700;

            margin-bottom: 5px;

            word-break: break-word;
        }


        .history-date {
            color: var(--muted);

            font-size: 10px;
        }


        .history-points {
            text-align: right;

            white-space: nowrap;
        }


        .points-plus {
            color: var(--green-dark);

            font-size: 14px;

            font-weight: 800;
        }


        .points-minus {
            color: var(--orange);

            font-size: 14px;

            font-weight: 800;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty {
            padding:
                55px 25px;

            text-align: center;
        }


        .empty-icon {
            width: 62px;

            height: 62px;

            margin:
                0 auto 15px;

            border-radius: 50%;

            background:
                var(--green-light);

            color: var(--green-dark);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 24px;

            font-weight: 800;
        }


        .empty-title {
            font-size: 16px;

            font-weight: 800;

            margin-bottom: 7px;
        }


        .empty-description {
            max-width: 400px;

            margin: 0 auto;

            color: var(--muted);

            font-size: 12px;

            line-height: 1.6;
        }


        /* =====================================================
           BACK BUTTON
        ===================================================== */

        .bottom-action {
            margin-top: 22px;
        }


        .button {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                11px 17px;

            border-radius: 9px;

            font-size: 12px;

            font-weight: 700;

            transition: 0.2s;
        }


        .button-secondary {
            color: var(--green-dark);

            background:
                var(--green-light);

            border:
                1px solid var(--border);
        }


        .button-secondary:hover {
            background:
                #E9F4DA;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            padding:
                22px 20px;

            text-align: center;

            border-top:
                1px solid var(--border);

            color: var(--muted);

            background:
                var(--white);

            font-size: 11px;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 800px) {

            .header {
                height: auto;
            }


            .header-inner {
                min-height: 70px;

                flex-wrap: wrap;

                gap: 10px;

                padding-top: 12px;

                padding-bottom: 12px;
            }


            .nav {
                width: 100%;

                overflow-x: auto;
            }

        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 560px) {

            .header-inner {
                padding:
                    14px 17px;
            }


            .logo img {
                width: 125px;
            }


            .nav-link,
            .logout-button {
                padding:
                    8px 9px;

                font-size: 11px;
            }


            .main {
                padding:
                    27px 16px 45px;
            }


            .page-title {
                font-size: 27px;
            }


            .page-description {
                font-size: 13px;
            }


            .summary {
                grid-template-columns: 1fr;

                gap: 12px;
            }


            .summary-card {
                padding:
                    20px;
            }


            .history-header {
                padding:
                    20px;
            }


            .history-item {
                grid-template-columns:
                    42px
                    1fr
                    auto;

                gap: 11px;

                padding:
                    16px 15px;
            }


            .history-icon {
                width: 38px;

                height: 38px;

                font-size: 15px;
            }


            .history-name {
                font-size: 12px;
            }


            .history-date {
                font-size: 9px;
            }


            .points-plus,
            .points-minus {
                font-size: 12px;
            }


            .bottom-action .button {
                width: 100%;
            }

        }

    </style>

</head>


<body>


{{-- =========================================================
     HEADER
========================================================= --}}





{{-- =========================================================
     MAIN
========================================================= --}}

<main class="main">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <section class="page-header">

        <div class="page-label">
            MEMBER CHIAMATES
        </div>


        <h1 class="page-title">
            Riwayat Poin
        </h1>


        <p class="page-description">

            Lihat perkembangan poin yang kamu
            dapatkan dan gunakan di CHIAMATES.

        </p>

    </section>



    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <section class="summary">


        {{-- TOTAL POIN --}}

        <div class="summary-card">

            <div class="summary-label">
                TOTAL POIN SAAT INI
            </div>


            <div class="summary-value">

                {{ number_format(optional(auth()->user()->member)->points ?? 0, 0, ',', '.') }}

                <span class="summary-unit">
                    Poin
                </span>

            </div>

        </div>



        {{-- MEMBER --}}

        <div class="summary-card">

            <div class="summary-label">
                MEMBER
            </div>


            <div class="member-code">

                {{ optional(auth()->user()->member)->member_code ?? '-' }}

            </div>


            <div class="member-name">

                {{ auth()->user()->name }}

            </div>

        </div>


    </section>



    {{-- =====================================================
         HISTORY
    ====================================================== --}}

    <section class="history-card">


        <div class="history-header">

            <div>

                <h2 class="history-title">
                    Aktivitas Poin
                </h2>


                <p class="history-subtitle">
                    Daftar perubahan poin akun kamu
                </p>

            </div>

        </div>



        {{-- =================================================
             DATA RIWAYAT
        ================================================== --}}

        @php

            /*
             * Sementara menggunakan collection kosong
             * apabila backend riwayat poin belum tersedia.
             *
             * Nanti collection ini tinggal diganti
             * dengan data dari controller.
             */

            $pointHistories = $pointHistories ?? collect();

        @endphp



        @if ($pointHistories->count() > 0)


            <div class="history-list">


                @foreach ($pointHistories as $history)

                    @php

                        $isPlus =
                            ($history->type ?? 'plus') === 'plus';

                        $amount =
                            abs((int) ($history->points ?? 0));

                    @endphp


                    <div class="history-item">


                        <div
                            class="history-icon {{ $isPlus ? 'plus' : 'minus' }}"
                        >

                            {{ $isPlus ? '+' : '-' }}

                        </div>


                        <div class="history-info">

                            <div class="history-name">

                                {{ $history->description ?? 'Aktivitas poin' }}

                            </div>


                            <div class="history-date">

                                {{ optional($history->created_at)->format('d M Y, H:i') }}

                            </div>

                        </div>


                        <div class="history-points">

                            @if ($isPlus)

                                <span class="points-plus">

                                    +{{ number_format($amount, 0, ',', '.') }}

                                </span>

                            @else

                                <span class="points-minus">

                                    -{{ number_format($amount, 0, ',', '.') }}

                                </span>

                            @endif

                        </div>


                    </div>

                @endforeach


            </div>


        @else


            {{-- EMPTY STATE --}}

            <div class="empty">


                <div class="empty-icon">
                    P
                </div>


                <div class="empty-title">
                    Belum Ada Riwayat Poin
                </div>


                <p class="empty-description">

                    Riwayat perubahan poin kamu akan
                    muncul di halaman ini setelah
                    ada aktivitas poin.

                </p>


            </div>


        @endif


    </section>



    {{-- =====================================================
         BACK
    ====================================================== --}}

    <div class="bottom-action">

        <a
            href="{{ route('member.dashboard') }}"
            class="button button-secondary"
        >
            ← Kembali ke Dashboard
        </a>

    </div>


</main>


</body>

</html>

@endsection