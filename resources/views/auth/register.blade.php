<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        CHIAMATES - Registrasi Member
    </title>


    <style>

        /* =========================================================
           CHIAMATES COLOR SYSTEM
        ========================================================= */

        :root {

            --green: #78B82A;
            --green-dark: #5C941D;
            --green-light: #F2F8E8;

            --orange: #F28C00;
            --red: #E53935;

            --text: #26351D;
            --muted: #747C6E;

            --white: #FFFFFF;

            --border: #E3EBD9;

            --danger-bg: #FFF1F0;
            --danger-text: #C62828;

        }


        /* =========================================================
           RESET
        ========================================================= */

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

            background:
                linear-gradient(
                    135deg,
                    #F2F8E8 0%,
                    #FFFFFF 55%,
                    #FAFCF8 100%
                );

        }


        a {
            text-decoration: none;
            color: inherit;
        }


        button,
        input,
        select {
            font-family: inherit;
        }


        /* =========================================================
           PAGE
        ========================================================= */

        .page {

            min-height: 100vh;

            display: flex;

            flex-direction: column;

        }


        /* =========================================================
           HEADER
        ========================================================= */

        .header {

            width: 100%;

            padding:
                22px 30px;

            background:
                rgba(255, 255, 255, 0.94);

            border-bottom:
                1px solid var(--border);

        }


        .header-inner {

            width: 100%;

            max-width: 1180px;

            margin: 0 auto;

            display: flex;

            align-items: center;

            justify-content: space-between;

        }


        .logo {

            display: flex;

            align-items: center;

        }


        .logo img {

            width: 150px;

            max-width: 100%;

            height: auto;

            display: block;

        }


        .logo-fallback {

            color: var(--green);

            font-size: 25px;

            font-weight: 800;

        }


        .header-login {

            color: var(--muted);

            font-size: 14px;

        }


        .header-login a {

            color: var(--green-dark);

            font-weight: 700;

            margin-left: 5px;

        }


        .header-login a:hover {

            text-decoration: underline;

        }


        /* =========================================================
           MAIN
        ========================================================= */

        .main {

            flex: 1;

            display: flex;

            align-items: center;

            justify-content: center;

            padding:
                55px 20px 70px;

        }


        .register-wrapper {

            width: 100%;

            max-width: 1060px;

            display: grid;

            grid-template-columns:
                0.85fr
                1.15fr;

            background:
                var(--white);

            border:
                1px solid var(--border);

            border-radius: 24px;

            overflow: hidden;

            box-shadow:
                0 20px 55px
                rgba(61, 91, 38, 0.10);

        }


        /* =========================================================
           LEFT PANEL
        ========================================================= */

        .register-intro {

            position: relative;

            overflow: hidden;

            min-height: 650px;

            padding: 55px 45px;

            display: flex;

            flex-direction: column;

            justify-content: center;

            background:
                linear-gradient(
                    145deg,
                    var(--green),
                    var(--green-dark)
                );

            color: var(--white);

        }


        .intro-circle {

            position: absolute;

            border-radius: 50%;

            pointer-events: none;

        }


        .intro-circle-orange {

            width: 190px;

            height: 190px;

            right: -65px;

            top: -65px;

            background:
                var(--orange);

            opacity: 0.95;

        }


        .intro-circle-red {

            width: 105px;

            height: 105px;

            left: -45px;

            bottom: 65px;

            background:
                var(--red);

            opacity: 0.95;

        }


        .intro-content {

            position: relative;

            z-index: 2;

        }


        .intro-small {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 18px;

            font-size: 12px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 1px;

            opacity: 0.9;

        }


        .intro-dot {

            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: var(--white);

        }


        .intro-title {

            max-width: 380px;

            font-size: 42px;

            line-height: 1.12;

            letter-spacing: -1px;

            margin-bottom: 18px;

        }


        .intro-description {

            max-width: 380px;

            font-size: 15px;

            line-height: 1.8;

            color:
                rgba(255, 255, 255, 0.87);

        }


        /* =========================================================
           INTRO BENEFITS
        ========================================================= */

        .intro-benefits {

            margin-top: 35px;

            display: flex;

            flex-direction: column;

            gap: 13px;

        }


        .intro-benefit {

            display: flex;

            align-items: center;

            gap: 11px;

            font-size: 14px;

            color:
                rgba(255, 255, 255, 0.94);

        }


        .benefit-icon {

            width: 27px;

            height: 27px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.18);

            font-size: 12px;

            font-weight: 800;

        }


        /* =========================================================
           FORM PANEL
        ========================================================= */

        .register-form-panel {

            padding:
                45px 50px;

            background:
                var(--white);

        }


        .form-header {

            margin-bottom: 28px;

        }


        .form-header h1 {

            font-size: 31px;

            line-height: 1.2;

            margin-bottom: 8px;

        }


        .form-header p {

            color: var(--muted);

            font-size: 14px;

            line-height: 1.6;

        }


        /* =========================================================
           ERROR
        ========================================================= */

        .error-box {

            margin-bottom: 20px;

            padding: 13px 15px;

            border:
                1px solid #FFD0CD;

            border-radius: 9px;

            background:
                var(--danger-bg);

            color:
                var(--danger-text);

            font-size: 13px;

            line-height: 1.6;

        }


        .error-box ul {

            padding-left: 18px;

        }


        /* =========================================================
           FORM GRID
        ========================================================= */

        .form-grid {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                18px 16px;

        }


        .form-group {

            display: flex;

            flex-direction: column;

        }


        .form-group.full {

            grid-column:
                1 / -1;

        }


        .form-group label {

            margin-bottom: 7px;

            font-size: 13px;

            font-weight: 700;

            color: var(--text);

        }


        .required {

            color: var(--red);

        }


        .form-group input,
        .form-group select {

            width: 100%;

            height: 47px;

            padding:
                0 14px;

            border:
                1px solid #D7E1CE;

            border-radius: 9px;

            outline: none;

            background:
                #FCFDFC;

            color: var(--text);

            font-size: 14px;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;

        }


        .form-group input::placeholder {

            color: #A3AA9E;

        }


        .form-group input:focus,
        .form-group select:focus {

            border-color:
                var(--green);

            background:
                var(--white);

            box-shadow:
                0 0 0 3px
                rgba(120, 184, 42, 0.12);

        }


        .field-error {

            margin-top: 6px;

            color:
                var(--red);

            font-size: 12px;

        }


        /* =========================================================
           PASSWORD NOTE
        ========================================================= */

        .password-note {

            margin-top: 7px;

            color: var(--muted);

            font-size: 11px;

            line-height: 1.5;

        }


        /* =========================================================
           TERMS
        ========================================================= */

        .terms {

            display: flex;

            align-items: flex-start;

            gap: 9px;

            margin-top: 21px;

            color: var(--muted);

            font-size: 12px;

            line-height: 1.6;

        }


        .terms input {

            width: 16px;

            height: 16px;

            margin-top: 2px;

            accent-color: var(--green);

            flex-shrink: 0;

        }


        .terms a {

            color:
                var(--green-dark);

            font-weight: 700;

        }


        /* =========================================================
           SUBMIT
        ========================================================= */

        .submit-button {

            width: 100%;

            min-height: 49px;

            margin-top: 22px;

            border: none;

            border-radius: 9px;

            cursor: pointer;

            color: var(--white);

            background:
                linear-gradient(
                    90deg,
                    var(--green),
                    var(--green-dark)
                );

            font-size: 14px;

            font-weight: 700;

            box-shadow:
                0 8px 20px
                rgba(92, 148, 29, 0.18);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;

        }


        .submit-button:hover {

            transform:
                translateY(-1px);

            box-shadow:
                0 11px 25px
                rgba(92, 148, 29, 0.25);

        }


        /* =========================================================
           BOTTOM LOGIN
        ========================================================= */

        .login-text {

            margin-top: 20px;

            text-align: center;

            color: var(--muted);

            font-size: 13px;

        }


        .login-text a {

            color: var(--green-dark);

            font-weight: 700;

        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {

            padding:
                22px 20px;

            text-align: center;

            border-top:
                1px solid var(--border);

            background:
                rgba(255, 255, 255, 0.7);

            color: var(--muted);

            font-size: 11px;

        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 850px) {

            .register-wrapper {

                grid-template-columns: 1fr;

                max-width: 620px;

            }


            .register-intro {

                min-height: auto;

                padding:
                    40px 40px;

            }


            .intro-title {

                font-size: 36px;

            }


            .intro-description {

                max-width: 600px;

            }


            .intro-benefits {

                flex-direction: row;

                flex-wrap: wrap;

            }


            .register-form-panel {

                padding:
                    40px;

            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 600px) {

            .header {

                padding:
                    18px 18px;

            }


            .header-inner {

                gap: 15px;

            }


            .logo img {

                width: 130px;

            }


            .header-login {

                font-size: 12px;

                text-align: right;

            }


            .main {

                padding:
                    25px 15px 40px;

            }


            .register-wrapper {

                border-radius: 17px;

            }


            .register-intro {

                padding:
                    35px 25px;

            }


            .intro-title {

                font-size: 32px;

            }


            .intro-description {

                font-size: 14px;

            }


            .intro-benefits {

                flex-direction: column;

                gap: 10px;

                margin-top: 25px;

            }


            .register-form-panel {

                padding:
                    30px 22px 35px;

            }


            .form-header h1 {

                font-size: 27px;

            }


            .form-grid {

                grid-template-columns: 1fr;

                gap: 16px;

            }


            .form-group.full {

                grid-column:
                    auto;

            }

        }


        /* =========================================================
           SMALL MOBILE
        ========================================================= */

        @media (max-width: 380px) {

            .header-login span {

                display: none;

            }


            .intro-title {

                font-size: 29px;

            }


            .register-form-panel {

                padding:
                    27px 18px 30px;

            }

        }

    </style>

</head>


<body>


<div class="page">


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <header class="header">

        <div class="header-inner">


            <a
                href="{{ route('member.landing') }}"
                class="logo"
            >

                @if (file_exists(public_path('images/chiamates-logo.png')))

                    <img
                        src="{{ asset('images/chiamates-logo.png') }}"
                        alt="CHIAMATES"
                    >

                @else

                    <span class="logo-fallback">
                        CHIAMATES
                    </span>

                @endif

            </a>


            <div class="header-login">

                <span>
                    Sudah punya akun?
                </span>

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>


        </div>

    </header>



    {{-- =========================================================
         MAIN
    ========================================================== --}}

    <main class="main">


        <div class="register-wrapper">


            {{-- =================================================
                 LEFT INTRO
            ================================================== --}}

            <section class="register-intro">


                <div class="intro-circle intro-circle-orange"></div>

                <div class="intro-circle intro-circle-red"></div>


                <div class="intro-content">


                    <div class="intro-small">

                        <span class="intro-dot"></span>

                        CHIAMATES Loyalty System

                    </div>


                    <h2 class="intro-title">

                        Bergabung sebagai
                        member CHIAMATES.

                    </h2>


                    <p class="intro-description">

                        Buat akun member untuk menikmati
                        fasilitas loyalty CHIAMATES dan
                        mengelola informasi member kamu
                        dalam satu tempat.

                    </p>


                    <div class="intro-benefits">


                        <div class="intro-benefit">

                            <span class="benefit-icon">
                                ID
                            </span>

                            <span>
                                Member ID otomatis
                            </span>

                        </div>


                        <div class="intro-benefit">

                            <span class="benefit-icon">
                                P
                            </span>

                            <span>
                                Poin member
                            </span>

                        </div>


                        <div class="intro-benefit">

                            <span class="benefit-icon">
                                QR
                            </span>

                            <span>
                                QR Member
                            </span>

                        </div>


                    </div>


                </div>


            </section>



            {{-- =================================================
                 FORM
            ================================================== --}}

            <section class="register-form-panel">


                <div class="form-header">

                    <h1>
                        Registrasi Member
                    </h1>

                    <p>
                        Lengkapi data berikut untuk membuat
                        akun member CHIAMATES.
                    </p>

                </div>



                {{-- =================================================
                     VALIDATION ERRORS
                ================================================== --}}

                @if ($errors->any())

                    <div class="error-box">

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif



                {{-- =================================================
                     REGISTER FORM
                ================================================== --}}

                <form
                    method="POST"
                    action="{{ route('register') }}"
                >

                    @csrf


                    <div class="form-grid">


                        {{-- NAMA --}}

                        <div class="form-group full">

                            <label for="name">

                                Nama Lengkap
                                <span class="required">*</span>

                            </label>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap"
                                required
                                autofocus
                                autocomplete="name"
                            >

                            @error('name')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>



                        



                        {{-- EMAIL --}}

                        <div class="form-group">

                            <label for="email">

                                Email
                                <span class="required">*</span>

                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                required
                                autocomplete="email"
                            >

                            @error('email')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>



                        {{-- TANGGAL LAHIR --}}

                        <div class="form-group">

                            <label for="birth_date">

                                Tanggal Lahir

                            </label>

                            <input
                                id="birth_date"
                                type="date"
                                name="birth_date"
                                value="{{ old('birth_date') }}"
                            >

                            @error('birth_date')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>



                        {{-- JENIS KELAMIN --}}

                        <div class="form-group">

                            <label for="gender">

                                Jenis Kelamin

                            </label>

                            <select
                                id="gender"
                                name="gender"
                            >

                                <option value="">
                                    Pilih jenis kelamin
                                </option>

                                <option
                                    value="L"
                                    {{ old('gender') === 'L' ? 'selected' : '' }}
                                >
                                    Laki-laki
                                </option>

                                <option
                                    value="P"
                                    {{ old('gender') === 'P' ? 'selected' : '' }}
                                >
                                    Perempuan
                                </option>

                            </select>

                            @error('gender')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>



                        {{-- PASSWORD --}}

                        <div class="form-group">

                            <label for="password">

                                Password
                                <span class="required">*</span>

                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="Masukkan password"
                                required
                                autocomplete="new-password"
                            >

                            @error('password')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                            <div class="password-note">
                                Gunakan password yang mudah kamu ingat
                                tetapi tidak mudah ditebak.
                            </div>

                        </div>



                        {{-- CONFIRM PASSWORD --}}

                        <div class="form-group">

                            <label for="password_confirmation">

                                Konfirmasi Password
                                <span class="required">*</span>

                            </label>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                placeholder="Ulangi password"
                                required
                                autocomplete="new-password"
                            >

                            @error('password_confirmation')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                    </div>



                    {{-- TERMS --}}

                    <label class="terms">

                        <input
                            type="checkbox"
                            name="terms"
                            value="1"
                            required
                        >

                        <span>

                            Saya menyatakan bahwa data yang
                            saya masukkan sudah benar.

                        </span>

                    </label>



                    {{-- SUBMIT --}}

                    <button
                        type="submit"
                        class="submit-button"
                    >
                        Daftar sebagai Member
                    </button>


                </form>



                <div class="login-text">

                    Sudah memiliki akun?

                    <a href="{{ route('login') }}">
                        Login di sini
                    </a>

                </div>


            </section>


        </div>


    </main>



    {{-- =========================================================
         FOOTER
    ========================================================== --}}

    <footer class="footer">

        CHIAMATES Loyalty System

    </footer>


</div>


</body>

</html>