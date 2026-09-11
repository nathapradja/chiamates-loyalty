<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Login Admin - Amidyas Superfood
    </title>


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

            padding: 24px;

            background:
                linear-gradient(
                    135deg,
                    #f5f9f1 0%,
                    #edf6e7 100%
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

        .login-brand {

            margin-bottom: 25px;

            text-align: center;

        }


        .brand-logo {

            width: 58px;
            height: 58px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto 13px;

            border-radius: 17px;

            background: #65ad20;

            color: #ffffff;

            font-size: 21px;

            font-weight: 800;

            box-shadow:
                0 10px 24px
                rgba(
                    101,
                    173,
                    32,
                    .18
                );

        }


        .brand-name {

            margin: 0 0 5px;

            color: #29422d;

            font-size: 19px;

            font-weight: 800;

        }


        .brand-subtitle {

            margin: 0;

            color: #8b9789;

            font-size: 11px;

        }


        /* =====================================================
           CARD
        ====================================================== */

        .login-card {

            padding: 31px;

            background: #ffffff;

            border:
                1px solid #e2ebdd;

            border-radius: 20px;

            box-shadow:
                0 16px 45px
                rgba(
                    52,
                    91,
                    31,
                    .08
                );

        }


        .login-header {

            margin-bottom: 25px;

        }


        .login-header h1 {

            margin: 0 0 7px;

            color: #29422d;

            font-size: 22px;

            font-weight: 800;

        }


        .login-header p {

            margin: 0;

            color: #899489;

            font-size: 11px;

            line-height: 1.6;

        }


        /* =====================================================
           ERROR
        ====================================================== */

        .login-alert {

            margin-bottom: 18px;

            padding: 12px 13px;

            border:
                1px solid #f0d4d4;

            border-radius: 10px;

            background: #fff7f7;

            color: #b65353;

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

            color: #405040;

            font-size: 11px;

            font-weight: 800;

        }


        .form-input {

            width: 100%;

            height: 47px;

            padding: 0 13px;

            border:
                1px solid #dce6d9;

            border-radius: 10px;

            outline: none;

            background: #ffffff;

            color: #29422d;

            font-family: inherit;

            font-size: 12px;

            transition: .2s ease;

        }


        .form-input::placeholder {

            color: #adb6aa;

        }


        .form-input:focus {

            border-color: #72b52c;

            box-shadow:
                0 0 0 3px
                rgba(
                    114,
                    181,
                    44,
                    .10
                );

        }


        /* =====================================================
           PASSWORD
        ====================================================== */

        .password-wrapper {

            position: relative;

        }


        .password-wrapper .form-input {

            padding-right: 48px;

        }


        .password-toggle {

            position: absolute;

            top: 50%;

            right: 12px;

            transform:
                translateY(-50%);

            padding: 4px;

            border: 0;

            background: transparent;

            color: #899489;

            font-size: 10px;

            cursor: pointer;

        }


        .password-toggle:hover {

            color: #579719;

        }


        /* =====================================================
           REMEMBER
        ====================================================== */

        .form-options {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-top: -2px;

            margin-bottom: 21px;

        }


        .remember-label {

            display: flex;

            align-items: center;

            gap: 7px;

            color: #7b877a;

            font-size: 10px;

            cursor: pointer;

        }


        .remember-label input {

            width: 14px;

            height: 14px;

            accent-color: #65ad20;

        }


        /* =====================================================
           BUTTON
        ====================================================== */

        .login-button {

            width: 100%;

            height: 47px;

            display: flex;

            align-items: center;

            justify-content: center;

            border: 0;

            border-radius: 10px;

            background: #65ad20;

            color: #ffffff;

            font-family: inherit;

            font-size: 12px;

            font-weight: 800;

            cursor: pointer;

            box-shadow:
                0 8px 18px
                rgba(
                    101,
                    173,
                    32,
                    .16
                );

            transition: .2s ease;

        }


        .login-button:hover {

            background: #579719;

            transform:
                translateY(-1px);

        }


        .login-button:active {

            transform:
                translateY(0);

        }


        /* =====================================================
           FOOTER
        ====================================================== */

        .login-footer {

            margin-top: 20px;

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

                padding: 17px;

            }


            .login-card {

                padding: 24px 20px;

            }


            .brand-name {

                font-size: 17px;

            }


            .login-header h1 {

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

    <div class="login-brand">

        <div class="brand-logo">
            <img src="{{ asset('images/chiamates-logo.png.jpeg') }}" alt="Logo" style="width: 100%; height: 100%; object-fit: cover; border-radius: 17px;">
        </div>


        <h2 class="brand-name">
            Amidyas Superfood
        </h2>


        <p class="brand-subtitle">
            Loyalty Management System
        </p>

    </div>


    {{-- =====================================================
         LOGIN CARD
    ====================================================== --}}

    <div class="login-card">


        <div class="login-header">

            <h1>
                Login Admin
            </h1>

            <p>
                Masuk untuk mengakses dashboard
                administrator.
            </p>

        </div>


        {{-- ERROR LOGIN --}}

        @if ($errors->any())

            <div class="login-alert">

                {{ $errors->first() }}

            </div>

        @endif


        {{-- SESSION ERROR --}}

        @if (session('error'))

            <div class="login-alert">

                {{ session('error') }}

            </div>

        @endif


        {{-- LOGIN FORM --}}

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
                    Email
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
                    Password
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
                        Lihat
                    </button>

                </div>

            </div>


            {{-- OPTIONS --}}

            <div class="form-options">

                <label
                    class="remember-label"
                >

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


            {{-- BUTTON --}}

            <button
                type="submit"
                class="login-button"
            >
                Masuk ke Dashboard
            </button>


        </form>


    </div>


    {{-- FOOTER --}}

    <div class="login-footer">

        Amidyas Superfood &copy;
        {{ date('Y') }}

        <br>

        Admin Loyalty Management System

    </div>


</div>


<script>

    /* =====================================================
       PASSWORD TOGGLE
    ====================================================== */

    const passwordInput =
        document.getElementById(
            'password'
        );


    const passwordToggle =
        document.getElementById(
            'passwordToggle'
        );


    if (
        passwordInput &&
        passwordToggle
    ) {

        passwordToggle.addEventListener(
            'click',
            function () {

                if (
                    passwordInput.type ===
                    'password'
                ) {

                    passwordInput.type =
                        'text';

                    passwordToggle.textContent =
                        'Sembunyikan';

                } else {

                    passwordInput.type =
                        'password';

                    passwordToggle.textContent =
                        'Lihat';

                }

            }
        );

    }

</script>


</body>

</html>