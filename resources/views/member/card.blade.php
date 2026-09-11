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

    <title>CHIAMATES - Kartu Member</title>

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
           NAV
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


        .page-header {
            margin-bottom: 28px;
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
           CARD AREA
        ===================================================== */

        .card-area {
            display: flex;

            justify-content: center;

            padding:
                10px 0 35px;
        }


        /* =====================================================
           DIGITAL MEMBER CARD
        ===================================================== */

        .member-card {
            position: relative;

            width: 100%;

            max-width: 760px;

            min-height: 410px;

            overflow: hidden;

            padding:
                35px 38px;

            border-radius: 25px;

            color: var(--white);

            background:
                linear-gradient(
                    135deg,
                    #78B82A 0%,
                    #5C941D 100%
                );

            box-shadow:
                0 22px 55px
                rgba(61, 91, 38, 0.20);
        }


        /* decorative circles */

        .circle {
            position: absolute;

            border-radius: 50%;

            pointer-events: none;
        }


        .circle-one {
            width: 310px;

            height: 310px;

            right: -110px;

            top: -125px;

            background:
                rgba(255,255,255,0.09);
        }


        .circle-two {
            width: 145px;

            height: 145px;

            right: 145px;

            bottom: -90px;

            background:
                var(--orange);

            opacity: 0.9;
        }


        .circle-three {
            width: 80px;

            height: 80px;

            left: -30px;

            bottom: 50px;

            background:
                var(--red);

            opacity: 0.9;
        }


        .card-content {
            position: relative;

            z-index: 2;
        }


        /* =====================================================
           CARD TOP
        ===================================================== */

        .card-top {
            display: flex;

            align-items: flex-start;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 55px;
        }


        .card-brand {
            font-size: 24px;

            font-weight: 800;

            letter-spacing: 0.5px;
        }


        .card-label {
            margin-top: 5px;

            font-size: 10px;

            letter-spacing: 1.8px;

            opacity: 0.78;

            text-transform: uppercase;
        }


        .card-chip {
            width: 48px;

            height: 35px;

            border-radius: 8px;

            background:
                rgba(255,255,255,0.88);

            position: relative;

            overflow: hidden;
        }


        .card-chip::before,
        .card-chip::after {
            content: "";

            position: absolute;

            border:
                1px solid
                rgba(92,148,29,0.35);

            border-radius: 50%;
        }


        .card-chip::before {
            width: 55px;

            height: 25px;

            left: -4px;

            top: 5px;
        }


        .card-chip::after {
            width: 25px;

            height: 55px;

            left: 11px;

            top: -10px;
        }


        /* =====================================================
           MEMBER NAME
        ===================================================== */

        .member-name-label {
            font-size: 10px;

            letter-spacing: 1.2px;

            text-transform: uppercase;

            opacity: 0.75;

            margin-bottom: 7px;
        }


        .member-name {
            font-size: 27px;

            font-weight: 800;

            margin-bottom: 27px;

            word-break: break-word;
        }


        /* =====================================================
           CARD BOTTOM
        ===================================================== */

        .card-bottom {
            display: grid;

            grid-template-columns:
                1fr
                1fr;

            gap: 30px;

            align-items: end;
        }


        .card-info-label {
            font-size: 9px;

            text-transform: uppercase;

            letter-spacing: 1.2px;

            opacity: 0.7;

            margin-bottom: 6px;
        }


        .member-id {
            font-size: 15px;

            font-weight: 700;

            letter-spacing: 1px;
        }


        .point-value {
            font-size: 25px;

            font-weight: 800;
        }


        .point-unit {
            font-size: 11px;

            font-weight: 600;

            opacity: 0.8;
        }


        /* =====================================================
           BELOW CARD
        ===================================================== */

        .actions {
            display: flex;

            justify-content: center;

            gap: 12px;

            flex-wrap: wrap;
        }


        .button {
            min-width: 155px;

            padding:
                12px 18px;

            border-radius: 9px;

            font-size: 13px;

            font-weight: 700;

            text-align: center;

            transition: 0.2s;
        }


        .button-primary {
            color: var(--white);

            background:
                var(--green);

            box-shadow:
                0 7px 18px
                rgba(92,148,29,0.18);
        }


        .button-primary:hover {
            background:
                var(--green-dark);
        }


        .button-secondary {
            color: var(--green-dark);

            background: var(--white);

            border:
                1px solid var(--border);
        }


        .button-secondary:hover {
            background:
                var(--green-light);
        }


        /* =====================================================
           INFORMATION
        ===================================================== */

        .information {
            width: 100%;

            max-width: 760px;

            margin: 0 auto;

            padding:
                22px 24px;

            border:
                1px solid var(--border);

            border-radius: 14px;

            background:
                var(--white);
        }


        .information h2 {
            font-size: 16px;

            margin-bottom: 9px;
        }


        .information p {
            color: var(--muted);

            font-size: 12px;

            line-height: 1.7;
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

            background: var(--white);

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


            .member-card {
                max-width: 680px;
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


            .member-card {
                min-height: 390px;

                padding:
                    27px 24px;

                border-radius: 20px;
            }


            .card-top {
                margin-bottom: 47px;
            }


            .card-brand {
                font-size: 21px;
            }


            .card-chip {
                width: 43px;

                height: 31px;
            }


            .member-name {
                font-size: 22px;

                margin-bottom: 30px;
            }


            .card-bottom {
                grid-template-columns: 1fr;

                gap: 19px;
            }


            .point-value {
                font-size: 23px;
            }


            .circle-one {
                width: 230px;

                height: 230px;

                right: -100px;

                top: -90px;
            }


            .circle-two {
                width: 110px;

                height: 110px;

                right: -20px;

                bottom: -65px;
            }


            .actions {
                flex-direction: column;
            }


            .button {
                width: 100%;
            }

        }


        /* =====================================================
           SMALL MOBILE
        ===================================================== */

        @media (max-width: 380px) {

            .member-card {
                padding:
                    24px 20px;
            }


            .member-name {
                font-size: 20px;
            }


            .member-id {
                font-size: 13px;
            }

        }

    </style>

</head>


<body>






{{-- =========================================================
     MAIN
========================================================= --}}

<main class="main">


    <section class="page-header">

        <div class="page-label">
            MEMBER CHIAMATES
        </div>


        <h1 class="page-title">
            Kartu Member Digital
        </h1>


        <p class="page-description">
            Tampilkan kartu member digital kamu
            untuk melihat identitas dan jumlah poin.
        </p>

    </section>



    {{-- =====================================================
         DIGITAL CARD
    ====================================================== --}}

    <section class="card-area">

        <div class="member-card">


            <div class="circle circle-one"></div>

            <div class="circle circle-two"></div>

            <div class="circle circle-three"></div>


            <div class="card-content">


                {{-- CARD TOP --}}

                <div class="card-top">

                    <div>

                        <div class="card-brand">
                            CHIAMATES
                        </div>

                        <div class="card-label">
                            Loyalty Member Card
                        </div>

                    </div>


                    <div class="card-chip"></div>

                </div>



                {{-- MEMBER NAME --}}

                <div class="member-name-label">
                    Nama Member
                </div>


                <div class="member-name">

                    {{ auth()->user()->name }}

                </div>



                {{-- CARD INFORMATION --}}

                <div class="card-bottom">


                    <div>

                        <div class="card-info-label">
                            ID Member
                        </div>


                        <div class="member-id">

                            {{ optional(auth()->user()->member)->member_code ?? '-' }}

                        </div>

                    </div>


                    <div>

                        <div class="card-info-label">
                            Jumlah Poin
                        </div>


                        <div class="point-value">

                            {{ number_format(optional(auth()->user()->member)->points ?? 0, 0, ',', '.') }}

                            <span class="point-unit">
                                POIN
                            </span>

                        </div>

                    </div>


                </div>


            </div>

        </div>

    </section>


    {{-- =====================================================
         ACTION
    ====================================================== --}}

    <div class="actions">


        <a
            href="{{ route('member.qr-code') }}"
            class="button button-primary"
        >
            Tampilkan QR Member
        </a>


        <a
            href="{{ route('member.dashboard') }}"
            class="button button-secondary"
        >
            Kembali ke Dashboard
        </a>


    </div>



    {{-- =====================================================
         INFORMATION
    ====================================================== --}}

    <section class="information">

        <h2>
            Kartu Member CHIAMATES
        </h2>


        <p>
            Kartu member digital menampilkan nama member,
            ID Member, dan jumlah poin yang dimiliki.
            QR Member akan digunakan sebagai identitas
            member pada proses transaksi.
        </p>

    </section>


</main>







</body>

</html>

@endsection

