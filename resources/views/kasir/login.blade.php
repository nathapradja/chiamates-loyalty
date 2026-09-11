<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login Admin</title>

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;

            background:
                linear-gradient(
                    135deg,
                    #f7faf4 0%,
                    #eef6e8 100%
                );

            color: #29422d;

            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }


        /* =====================================================
           LOGIN WRAPPER
        ====================================================== */

        .login-wrapper {

            width: 100%;
            max-width: 430px;

        }


        /* =====================================================
           BRAND
        ====================================================== */

        .brand {

            margin-bottom: 24px;

            text-align: center;

        }

        .brand-logo {

            width: 68px;
            height: 68px;

            margin: 0 auto 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 20px;

            background: #65ad20;

            color: #ffffff;

            font-size: 23px;
            font-weight: 800;

            box-shadow:
                0 10px 25px
                rgba(101, 173, 32, .18);

        }

        .brand-name {

            margin: 0 0 5px;

            color: #18351c;

            font-size: 22px;
            font-weight: 800;

        }

        .brand-subtitle {

            margin: 0;

            color: #829080;

            font-size: 12px;

        }


        /* =====================================================
           CARD
        ====================================================== */

        .login-card {

            width: 100%;

            padding: 30px;

            background: #ffffff;

            border:
                1px solid #e1eadb;

            border-radius: 22px;

            box-shadow:
                0 18px 50px
                rgba(52, 91, 31, .08);

        }


        .card-title {

            margin: 0 0 7px;

            color: #29422d;

            font-size: 22px;
            font-weight: 800;

        }

        .card-description {

            margin: 0 0 25px;

            color: #899489;

            font-size: 12px;
            line-height: 1.6;

        }


        /* =====================================================
           ERROR
        ====================================================== */

        .alert {

            margin-bottom: 18px;

            padding: 12px 14px;

            border:
                1px solid #f0cfcf;

            border-radius: 11px;

            background: #fff6f6;

            color: #a24c4c;

            font-size: 11px;

            line-height: 1.5;

        }


        /* =====================================================
           FORM
        ====================================================== */

        .form-group {

            margin-bottom: 18px;

        }

        .form-label {

            display: block;

            margin-bottom: 8px;

            color: #405140;

            font-size: 11px;
            font-weight: 800;

        }

        .form-input {

            width: 100%;
            height: 48px;

            padding: 0 14px;

            border:
                1px solid #dbe5d8;

            border-radius: 11px;

            outline: none;

            background: #ffffff;

            color: #29422d;

            font-size: 13px;

            transition: .2s ease;

        }

        .form-input::placeholder {

            color: #adb5aa;

        }

        .form-input:focus {

            border-color: #72b52c;

            box-shadow:
                0 0 0 3px
                rgba(114, 181, 44, .10);

        }


        /* =====================================================
           PASSWORD
        ====================================================== */

        .password-wrapper {

            position: relative;

        }

        .password-wrapper .form-input {

            padding-right: 50px;

        }

        .password-toggle {

            position: absolute;

            top: 50%;
            right: 13px;

            transform: translateY(-50%);

            padding: 4px;

            border: 0;

            background: transparent;

            color: #8a9787;

            cursor: pointer;

            font-size: 10px;
            font-weight: 800;

        }


        /* =====================================================
           OPTIONS
        ====================================================== */

        .form-options {

            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 12px;

            margin-bottom: 22px;

        }

        .remember {

            display: flex;

            align-items: center;

            gap: 7px;

            color: #7e8a7d;

            font-size: 10px;

            cursor: pointer;

        }

        .remember input {

            width: 13px;
            height: 13px;

            accent-color: #65ad20;

        }


        /* =====================================================
           BUTTON
        ====================================================== */

        .login-button {

            width: 100%;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 0;

            border-radius: 11px;

            background: #65ad20;

            color: #ffffff;

            font-size: 12px;
            font-weight: 800;

            cursor: pointer;

            box-shadow:
                0 8px 18px
                rgba(101, 173, 32, .16);

            transition: .2s ease;

        }

        .login-button:hover {

            background: #579719;

            transform: translateY(-1px);

        }

        .login-button:active {

            transform: translateY(0);

        }


        /* =====================================================
           FOOTER
        ====================================================== */

        .login-footer {

            margin-top: 22px;

            text-align: center;

            color: #a0aaa0;

            font-size: 9px;

            line-height: 1.6;

        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 500px) {

            body {
                padding: 18px;
            }

            .login-card {
                padding: 23px;
                border-radius: 18px;
            }

            .brand-logo {
                width: 60px;
                height: 60px;
                border-radius: 17px;
            }

            .brand-name {
                font-size: 20px;
            }

        }

    </style>

</head>


<body>


<div class="login-wrapper">


    {{-- =====================================================
         BRAND
    ====================================================== --}}

    <div class="brand">

        <div class="brand-logo">
            A
        </div>

        <h1 class="brand-name">
            Amidyas Superfood
        </h1>

        <p class="brand-subtitle">
            Admin Loyalty System
        </p>

    </div>


    {{-- =====================================================
         LOGIN CARD
    ====================================================== --}}

    <div class="login-card">

        <h2 class="card-title">
            Login Admin
        </h2>

        <p class="card-description">
            Masuk ke panel administrasi untuk
            mengelola sistem loyalty.
        </p>


        {{-- =================================================
             ERROR
        ================================================== --}}

        @if ($errors->any())

            <div class="alert">

                {{ $errors->first() }}

            </div>

        @endif


        {{-- =================================================
             LOGIN FORM
        ================================================== --}}

        <form
            method="POST"
            action="{{ route('login') }}"
        >

            @csrf


            {{-- EMAIL --}}

            <div class="form-group">

                <label
                    for="email"
                    class="form-label"
                >
                    EMAIL
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-input"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    autocomplete="email"
                    required
                    autofocus
                >

            </div>


            {{-- PASSWORD --}}

            <div class="form-group">

                <label
                    for="password"
                    class="form-label"
                >
                    PASSWORD
                </label>

                <div class="password-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        id="passwordToggle"
                    >
                        LIHAT
                    </button>

                </div>

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

            </div>


            {{-- LOGIN --}}

            <button
                type="submit"
                class="login-button"
            >
                Masuk ke Dashboard
            </button>


        </form>


    </div>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <div class="login-footer">

        Amidyas Superfood Loyalty System

    </div>


</div>


<script>

    const passwordInput =
        document.getElementById('password');

    const passwordToggle =
        document.getElementById('passwordToggle');


    if (
        passwordInput &&
        passwordToggle
    ) {

        passwordToggle.addEventListener(
            'click',
            function () {

                const isPassword =
                    passwordInput.type === 'password';


                passwordInput.type =
                    isPassword
                        ? 'text'
                        : 'password';


                passwordToggle.textContent =
                    isPassword
                        ? 'SEMBUNYIKAN'
                        : 'LIHAT';

            }
        );

    }

</script>


</body>

</html>