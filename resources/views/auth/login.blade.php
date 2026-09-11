<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login - CHIAMATES</title>


    <style>

        /* =========================================================
           CHIAMATES COLOR
        ========================================================= */

        :root {
            --green: #78B82A;
            --green-dark: #5C941D;
            --green-light: #F2F8E8;

            --orange: #F28C00;
            --red: #E53935;

            --text: #26351D;
            --muted: #747C6E;

            --border: #DCE5D4;
            --white: #FFFFFF;

            --error-bg: #FFF2F1;
            --error-border: #FFD1CD;
            --error-text: #B42318;
        }


        /* =========================================================
           RESET
        ========================================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html {
            min-height: 100%;
        }


        body {

            min-height: 100vh;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            color: var(--text);

            background:
                linear-gradient(
                    135deg,
                    #F5F9EF 0%,
                    #FFFFFF 50%,
                    #F8FAF5 100%
                );

        }


        a {
            text-decoration: none;
        }


        button,
        input {
            font-family: inherit;
        }


        /* =========================================================
           PAGE
        ========================================================= */

        .login-page {

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 40px 20px;

        }


        /* =========================================================
           CONTAINER
        ========================================================= */

        .login-container {

            width: 100%;

            max-width: 440px;

        }


        /* =========================================================
           BRAND
        ========================================================= */

        .brand {

            text-align: center;

            margin-bottom: 28px;

        }


        /*
        Logo dibuat sebagai teks fallback supaya
        tidak pernah muncul broken image.
        */

        .brand-logo {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-height: 58px;

            margin-bottom: 14px;

        }


        .brand-logo img {

            display: block;

            width: 190px;

            max-width: 100%;

            height: auto;

        }


        /*
        Jika logo belum tersedia,
        gunakan tulisan CHIAMATES.
        */

        .logo-text {

            display: none;

            font-size: 30px;

            font-weight: 800;

            letter-spacing: 1px;

            color: var(--green);

        }


        .brand-title {

            font-size: 15px;

            color: var(--muted);

            line-height: 1.5;

        }


        /* =========================================================
           CARD
        ========================================================= */

        .login-card {

            background: var(--white);

            border: 1px solid rgba(120, 184, 42, 0.12);

            border-radius: 20px;

            padding: 38px;

            box-shadow:
                0 18px 50px
                rgba(55, 84, 35, 0.10);

        }


        /* =========================================================
           HEADER
        ========================================================= */

        .card-header {

            margin-bottom: 30px;

        }


        .card-header h1 {

            font-size: 30px;

            line-height: 1.2;

            margin-bottom: 9px;

            color: var(--text);

        }


        .card-header p {

            font-size: 14px;

            line-height: 1.6;

            color: var(--muted);

        }


        /* =========================================================
           ERROR
        ========================================================= */

        .alert {

            padding: 13px 15px;

            margin-bottom: 22px;

            border-radius: 10px;

            border: 1px solid var(--error-border);

            background: var(--error-bg);

            color: var(--error-text);

            font-size: 13px;

            line-height: 1.5;

        }


        .alert div + div {

            margin-top: 4px;

        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-group {

            margin-bottom: 20px;

        }


        .form-group label {

            display: block;

            margin-bottom: 8px;

            font-size: 14px;

            font-weight: 700;

            color: var(--text);

        }


        .input {

            width: 100%;

            height: 50px;

            padding: 0 15px;

            border-radius: 10px;

            border: 1px solid var(--border);

            outline: none;

            background: #FCFDFB;

            color: var(--text);

            font-size: 15px;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;

        }


        .input::placeholder {

            color: #A4AA9F;

        }


        .input:focus {

            border-color: var(--green);

            background: var(--white);

            box-shadow:
                0 0 0 4px
                rgba(120, 184, 42, 0.12);

        }


        /* =========================================================
           OPTIONS
        ========================================================= */

        .form-options {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-top: 2px;

            margin-bottom: 24px;

        }


        .remember {

            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 13px;

            color: var(--muted);

            cursor: pointer;

        }


        .remember input {

            width: 16px;

            height: 16px;

            accent-color: var(--green);

            cursor: pointer;

        }


        .forgot {

            font-size: 13px;

            font-weight: 700;

            color: var(--green-dark);

        }


        .forgot:hover {

            color: var(--orange);

        }


        /* =========================================================
           BUTTON
        ========================================================= */

        .login-button {

            width: 100%;

            height: 51px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    90deg,
                    var(--green),
                    var(--green-dark)
                );

            color: var(--white);

            font-size: 15px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 8px 18px
                rgba(92, 148, 29, 0.20);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;

        }


        .login-button:hover {

            transform: translateY(-1px);

            box-shadow:
                0 10px 24px
                rgba(92, 148, 29, 0.27);

        }


        .login-button:active {

            transform: translateY(0);

        }


        /* =========================================================
           REGISTER
        ========================================================= */

        .register {

            margin-top: 25px;

            padding-top: 24px;

            border-top: 1px solid #EDF1E9;

            text-align: center;

            font-size: 14px;

            color: var(--muted);

        }


        .register a {

            color: var(--green-dark);

            font-weight: 700;

        }


        .register a:hover {

            color: var(--orange);

        }


        /* =========================================================
           BACK HOME
        ========================================================= */

        .back-home {

            margin-top: 20px;

            text-align: center;

        }


        .back-home a {

            font-size: 13px;

            color: var(--muted);

        }


        .back-home a:hover {

            color: var(--green-dark);

        }


        /* =========================================================
           BRAND COLORS
        ========================================================= */

        .color-line {

            display: flex;

            justify-content: center;

            gap: 6px;

            margin-top: 17px;

        }


        .color-line span {

            display: block;

            width: 28px;

            height: 4px;

            border-radius: 99px;

        }


        .color-green {

            background: var(--green);

        }


        .color-orange {

            background: var(--orange);

        }


        .color-red {

            background: var(--red);

        }


        /* =========================================================
           DESKTOP
        ========================================================= */

        @media (min-width: 769px) {

            .login-page {

                padding-top: 50px;

                padding-bottom: 50px;

            }

        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 600px) {

            .login-page {

                padding: 25px 16px;

                align-items: center;

            }


            .login-card {

                padding: 30px 25px;

                border-radius: 17px;

            }


            .card-header h1 {

                font-size: 27px;

            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 400px) {

            .login-card {

                padding: 27px 20px;

            }


            .form-options {

                align-items: flex-start;

                flex-direction: column;

            }


            .brand-logo img {

                width: 165px;

            }

        }

    </style>

</head>


<body>


<div class="login-page">


    <div class="login-container">


        {{-- =====================================================
             LOGO
        ====================================================== --}}

        <div class="brand">

            <div class="brand-logo">

                @if (file_exists(public_path('images/chiamates-logo.png')))

                    <img
                        src="{{ asset('images/chiamates-logo.png') }}"
                        alt="CHIAMATES"
                    >

                @else

                    <div
                        class="logo-text"
                        style="display: block;"
                    >
                        CHIAMATES
                    </div>

                @endif

            </div>


            <div class="brand-title">

                Sistem Loyalty Member CHIAMATES

            </div>


            <div class="color-line">

                <span class="color-green"></span>

                <span class="color-orange"></span>

                <span class="color-red"></span>

            </div>

        </div>



        {{-- =====================================================
             LOGIN CARD
        ====================================================== --}}

        <div class="login-card">


            <div class="card-header">

                <h1>
                    Login
                </h1>

                <p>
                    Masuk ke akun CHIAMATES untuk melanjutkan.
                </p>

            </div>



            {{-- =================================================
                 ERROR
            ================================================== --}}

            @if ($errors->any())

                <div class="alert">

                    @foreach ($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif



            {{-- =================================================
                 FORM LOGIN
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('login') }}"
            >

                @csrf


                {{-- EMAIL --}}

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="input"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                        autofocus
                        autocomplete="email"
                    >

                </div>


                {{-- PASSWORD --}}

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="input"
                        placeholder="Masukkan password"
                        required
                        autocomplete="current-password"
                    >

                </div>


                {{-- OPTIONS --}}

                <div class="form-options">


                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                        >

                        <span>
                            Ingat saya
                        </span>

                    </label>


                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot"
                        >
                            Lupa password?
                        </a>

                    @endif


                </div>


                {{-- BUTTON --}}

                <button
                    type="submit"
                    class="login-button"
                >
                    Login
                </button>


            </form>



            {{-- =================================================
                 REGISTER
            ================================================== --}}

            @if (Route::has('register'))

                <div class="register">

                    Belum punya akun?

                    <a href="{{ route('register') }}">
                        Daftar sekarang
                    </a>

                </div>

            @endif


        </div>



        {{-- =====================================================
             BACK HOME
        ====================================================== --}}

        <div class="back-home">

            <a href="{{ route('home') }}">
                ← Kembali ke halaman utama
            </a>

        </div>


    </div>


</div>


</body>

</html>