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

    <title>CHIAMATES - Profil Member</title>

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
           PROFILE LAYOUT
        ===================================================== */

        .profile-layout {
            display: grid;

            grid-template-columns:
                280px
                1fr;

            gap: 20px;

            align-items: start;
        }


        /* =====================================================
           PROFILE SUMMARY
        ===================================================== */

        .profile-summary {
            padding:
                27px 23px;

            background:
                var(--white);

            border:
                1px solid var(--border);

            border-radius: 17px;

            box-shadow:
                0 12px 35px
                rgba(61, 91, 38, 0.08);

            text-align: center;
        }


        .avatar {
            width: 82px;

            height: 82px;

            margin:
                0 auto 16px;

            border-radius: 50%;

            color: var(--white);

            background:
                linear-gradient(
                    135deg,
                    var(--green),
                    var(--green-dark)
                );

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 28px;

            font-weight: 800;
        }


        .profile-name {
            font-size: 18px;

            font-weight: 800;

            margin-bottom: 5px;

            word-break: break-word;
        }


        .profile-email {
            color: var(--muted);

            font-size: 11px;

            line-height: 1.5;

            word-break: break-word;

            margin-bottom: 20px;
        }


        .member-status {
            display: inline-block;

            padding:
                7px 12px;

            border-radius: 20px;

            color: var(--green-dark);

            background:
                var(--green-light);

            font-size: 10px;

            font-weight: 700;
        }


        /* =====================================================
           PROFILE DATA
        ===================================================== */

        .profile-data {
            padding:
                28px;

            background:
                var(--white);

            border:
                1px solid var(--border);

            border-radius: 17px;

            box-shadow:
                0 12px 35px
                rgba(61, 91, 38, 0.08);
        }


        .section-title {
            font-size: 18px;

            margin-bottom: 5px;
        }


        .section-description {
            color: var(--muted);

            font-size: 12px;

            line-height: 1.6;

            margin-bottom: 24px;
        }


        .data-list {
            width: 100%;
        }


        .data-row {
            display: grid;

            grid-template-columns:
                155px
                1fr;

            gap: 20px;

            padding:
                15px 0;

            border-bottom:
                1px solid #EDF1E9;
        }


        .data-row:first-child {
            padding-top: 0;
        }


        .data-row:last-child {
            border-bottom: 0;
        }


        .data-label {
            color: var(--muted);

            font-size: 12px;

            font-weight: 600;
        }


        .data-value {
            font-size: 13px;

            font-weight: 700;

            word-break: break-word;
        }


        .empty-value {
            color: #A4AA9D;

            font-weight: 500;
        }


        /* =====================================================
           ACTIONS
        ===================================================== */

        .actions {
            display: flex;

            gap: 10px;

            margin-top: 25px;

            padding-top: 22px;

            border-top:
                1px solid #EDF1E9;
        }


        .button {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-width: 145px;

            padding:
                11px 17px;

            border-radius: 9px;

            font-size: 12px;

            font-weight: 700;

            transition: 0.2s;
        }


        .button-primary {
            color: var(--white);

            background:
                var(--green);
        }


        .button-primary:hover {
            background:
                var(--green-dark);
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


            .profile-layout {
                grid-template-columns: 1fr;
            }


            .profile-summary {
                text-align: left;

                display: flex;

                align-items: center;

                gap: 17px;

                padding: 20px;
            }


            .avatar {
                width: 65px;

                height: 65px;

                margin: 0;

                flex-shrink: 0;

                font-size: 22px;
            }


            .profile-summary-content {
                flex: 1;
            }


            .profile-email {
                margin-bottom: 8px;
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


            .profile-summary {
                display: block;

                text-align: center;

                padding:
                    24px 20px;
            }


            .avatar {
                width: 75px;

                height: 75px;

                margin:
                    0 auto 14px;
            }


            .profile-email {
                margin-bottom: 15px;
            }


            .profile-data {
                padding:
                    22px 19px;
            }


            .data-row {
                grid-template-columns: 1fr;

                gap: 6px;

                padding:
                    14px 0;
            }


            .actions {
                flex-direction: column;
            }


            .button {
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
            Profil Saya
        </h1>


        <p class="page-description">

            Lihat informasi akun dan data member
            CHIAMATES kamu.

        </p>

    </section>



    {{-- =====================================================
         PROFILE
    ====================================================== --}}

    <section class="profile-layout">


        {{-- =================================================
             SUMMARY
        ================================================== --}}

        <aside class="profile-summary">


            <div class="avatar">

                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

            </div>


            <div class="profile-summary-content">

                <div class="profile-name">

                    {{ auth()->user()->name }}

                </div>


                <div class="profile-email">

                    {{ auth()->user()->email }}

                </div>


                <span class="member-status">
                    MEMBER AKTIF
                </span>

            </div>


        </aside>



        {{-- =================================================
             DATA
        ================================================== --}}

        <div class="profile-data">


            <h2 class="section-title">
                Data Member
            </h2>


            <p class="section-description">

                Informasi akun dan data member
                yang terdaftar di CHIAMATES.

            </p>


            <div class="data-list">


                {{-- ID MEMBER --}}

                <div class="data-row">

                    <div class="data-label">
                        ID Member
                    </div>


                    <div class="data-value">

                        {{ optional(auth()->user()->member)->member_code ?? '-' }}

                    </div>

                </div>



                {{-- NAMA --}}

                <div class="data-row">

                    <div class="data-label">
                        Nama
                    </div>


                    <div class="data-value">

                        {{ auth()->user()->name }}

                    </div>

                </div>



                {{-- EMAIL --}}

                <div class="data-row">

                    <div class="data-label">
                        Email
                    </div>


                    <div class="data-value">

                        {{ auth()->user()->email }}

                    </div>

                </div>



                {{-- PHONE --}}

                <div class="data-row">

                    <div class="data-label">
                        No. Telepon
                    </div>


                    <div class="data-value">

                        @if (optional(auth()->user()->member)->phone)

                            {{ auth()->user()->member->phone }}

                        @else

                            <span class="empty-value">
                                Belum diisi
                            </span>

                        @endif

                    </div>

                </div>



                {{-- ADDRESS --}}

                <div class="data-row">

                    <div class="data-label">
                        Alamat
                    </div>


                    <div class="data-value">

                        @if (optional(auth()->user()->member)->address)

                            {{ auth()->user()->member->address }}

                        @else

                            <span class="empty-value">
                                Belum diisi
                            </span>

                        @endif

                    </div>

                </div>



                {{-- POINTS --}}

                <div class="data-row">

                    <div class="data-label">
                        Jumlah Poin
                    </div>


                    <div class="data-value">

                        {{ number_format(optional(auth()->user()->member)->points ?? 0, 0, ',', '.') }}

                        Poin

                    </div>

                </div>


            </div>



            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="actions">


                <a
                    href="{{ route('member.profile.edit') }}"
                    class="button button-primary"
                >
                    Edit Profil
                </a>


                <a
                    href="{{ route('member.dashboard') }}"
                    class="button button-secondary"
                >
                    Kembali
                </a>


            </div>


        </div>


    </section>


</main>


</body>

</html>

@endsection