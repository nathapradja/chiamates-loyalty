<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        CHIAMATES - Loyalty Member
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

        }


        /* =========================================================
           ANIMATION KEYFRAMES (TIPIS-TIPIS)
        ========================================================= */

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0px) rotate(2deg);
            }
            50% {
                transform: translateY(-12px) rotate(3deg);
            }
            100% {
                transform: translateY(0px) rotate(2deg);
            }
        }

        @keyframes floatDecor {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-8px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
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
            scroll-behavior: smooth;
        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            color: var(--text);

            background: var(--white);

            line-height: 1.6;

        }


        a {
            text-decoration: none;
            color: inherit;
        }


        button {
            font-family: inherit;
        }


        /* =========================================================
           CONTAINER
        ========================================================= */

        .container {

            width: 100%;

            max-width: 1180px;

            margin: 0 auto;

            padding-left: 24px;

            padding-right: 24px;

        }


        /* =========================================================
           NAVBAR
        ========================================================= */

        .navbar {

            position: sticky;

            top: 0;

            z-index: 1000;

            background:
                rgba(255, 255, 255, 0.96);

            border-bottom:
                1px solid var(--border);

            backdrop-filter: blur(10px);

            animation: fadeInDown 0.5s ease-out forwards;

        }


        .navbar-inner {

            min-height: 76px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 30px;

        }


        /* =========================================================
           LOGO
        ========================================================= */

        .logo {

            display: flex;

            align-items: center;

            flex-shrink: 0;
            
            transition: transform 0.3s ease;

        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo img {

            display: block;

            width: 80px;

            max-width: 100%;

            height: 80px;

            object-fit: contain; 

        }


        .logo-fallback {

            display: none;

            font-size: 27px;

            font-weight: 800;

            letter-spacing: 0.5px;

            color: var(--green);

        }


        /* =========================================================
           NAVIGATION
        ========================================================= */

        .nav-menu {

            display: flex;

            align-items: center;

            gap: 30px;

        }


        .nav-link {

            font-size: 14px;

            font-weight: 600;

            color: var(--text);

            transition: color 0.2s ease, transform 0.2s ease;

            display: inline-block;

        }


        .nav-link:hover {

            color: var(--green-dark);
            
            transform: translateY(-2px);

        }


        /* =========================================================
           NAV BUTTONS
        ========================================================= */

        .nav-actions {

            display: flex;

            align-items: center;

            gap: 10px;

        }


        .btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-height: 43px;

            padding:
                0 20px;

            border-radius: 9px;

            font-size: 14px;

            font-weight: 700;

            transition:
                transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275),
                box-shadow 0.2s ease,
                background 0.2s ease;

        }


        .btn-login {

            color: var(--green-dark);

            border:
                1px solid var(--green);

            background: var(--white);

        }


        .btn-login:hover {

            background: var(--green-light);
            transform: scale(1.03);

        }


        .btn-primary {

            color: var(--white);

            background:
                linear-gradient(
                    90deg,
                    var(--green),
                    var(--green-dark)
                );

            box-shadow:
                0 7px 18px
                rgba(92, 148, 29, 0.18);

        }


        .btn-primary:hover {

            transform: translateY(-2px) scale(1.03);

            box-shadow:
                0 10px 25px
                rgba(92, 148, 29, 0.3);

        }


        /* =========================================================
           HERO
        ========================================================= */

        .hero {

            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    var(--green-light) 0%,
                    #FFFFFF 68%
                );

        }


        .hero-inner {

            min-height: 600px;

            display: grid;

            grid-template-columns:
                1.05fr
                0.95fr;

            align-items: center;

            gap: 70px;

            padding-top: 65px;

            padding-bottom: 65px;

        }


        /* =========================================================
           HERO CONTENT (With staggered fade-in)
        ========================================================= */

        .hero-content {

            position: relative;

            z-index: 2;

        }


        .hero-label {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 20px;

            padding:
                7px 13px;

            border-radius: 999px;

            background: var(--white);

            border:
                1px solid var(--border);

            color: var(--green-dark);

            font-size: 13px;

            font-weight: 700;
            
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
            animation-delay: 0.1s;

        }


        .hero-label-dot {

            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: var(--green);
            
            animation: pulse 2s infinite ease-in-out;

        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.5); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }


        .hero-title {

            max-width: 650px;

            font-size: 54px;

            line-height: 1.1;

            letter-spacing: -1.5px;

            margin-bottom: 20px;
            
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
            animation-delay: 0.2s;

        }


        .hero-title span {

            color: var(--green);
            display: inline-block;

        }


        .hero-description {

            max-width: 570px;

            color: var(--muted);

            font-size: 17px;

            line-height: 1.75;

            margin-bottom: 30px;
            
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
            animation-delay: 0.3s;

        }


        .hero-actions {

            display: flex;

            align-items: center;

            gap: 12px;

            flex-wrap: wrap;
            
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
            animation-delay: 0.4s;

        }


        .hero-actions .btn {

            min-height: 50px;

            padding-left: 24px;

            padding-right: 24px;

        }


        /* =========================================================
           HERO VISUAL
        ========================================================= */

        .hero-visual {

            position: relative;

            min-height: 440px;

            display: flex;

            align-items: center;

            justify-content: center;
            
            opacity: 0;
            animation: scaleIn 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            animation-delay: 0.3s;

        }


        .hero-circle {

            position: absolute;

            width: 390px;

            height: 390px;

            border-radius: 50%;

            background:
                linear-gradient(
                    145deg,
                    #E4F3C8,
                    #F4F9EA
                );
            
            animation: float 6s ease-in-out infinite reverse;

        }


        .member-card {

            position: relative;

            z-index: 2;

            width: 340px;

            min-height: 220px;

            padding: 25px;

            border-radius: 20px;

            background:
                linear-gradient(
                    135deg,
                    var(--green),
                    var(--green-dark)
                );

            color: var(--white);

            box-shadow:
                0 25px 50px
                rgba(72, 112, 30, 0.25);

            transform:
                rotate(2deg);
                
            animation: float 5s ease-in-out infinite;

        }


        .member-card-top {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 35px;

        }


        .member-card-brand {

            font-size: 17px;

            font-weight: 800;

            letter-spacing: 0.5px;

        }


        .member-card-label {

            font-size: 11px;

            opacity: 0.8;

            text-transform: uppercase;

            letter-spacing: 1px;

        }


        .member-card-name {

            font-size: 23px;

            font-weight: 700;

            margin-bottom: 5px;

        }


        .member-card-id {

            font-size: 12px;

            opacity: 0.85;

        }


        .member-card-points {

            position: absolute;

            right: 25px;

            bottom: 25px;

            text-align: right;

        }


        .member-card-points-label {

            display: block;

            font-size: 10px;

            opacity: 0.8;

            text-transform: uppercase;

            letter-spacing: 1px;

        }


        .member-card-points-value {

            display: block;

            font-size: 27px;

            font-weight: 800;

        }


        /* =========================================================
           DECORATION
        ========================================================= */

        .decor {

            position: absolute;

            border-radius: 50%;

        }


        .decor-orange {

            width: 85px;

            height: 85px;

            background: var(--orange);

            opacity: 0.9;

            top: 40px;

            right: 20px;
            
            animation: floatDecor 4s ease-in-out infinite;

        }


        .decor-red {

            width: 55px;

            height: 55px;

            background: var(--red);

            opacity: 0.9;

            bottom: 45px;

            left: 30px;
            
            animation: floatDecor 5s ease-in-out infinite reverse;

        }


        /* =========================================================
           FEATURES
        ========================================================= */

        .features {

            padding:
                85px 0;

            background: var(--white);

        }


        .section-heading {

            text-align: center;

            max-width: 680px;

            margin:
                0 auto 45px;

        }


        .section-heading h2 {

            font-size: 35px;

            line-height: 1.2;

            margin-bottom: 12px;

        }


        .section-heading p {

            color: var(--muted);

            font-size: 15px;

        }


        .feature-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 20px;

        }


        .feature-card {

            padding: 28px;

            border:
                1px solid var(--border);

            border-radius: 16px;

            background: var(--white);

            transition:
                transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275),
                box-shadow 0.4s ease;

        }


        .feature-card:hover {

            transform: translateY(-10px);

            box-shadow:
                0 20px 40px
                rgba(61, 91, 38, 0.08);

            border-color: var(--green-light);

        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }


        .feature-icon {

            width: 48px;

            height: 48px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 18px;

            border-radius: 12px;

            background: var(--green-light);

            color: var(--green-dark);

            font-size: 20px;

            font-weight: 800;
            
            transition: transform 0.3s ease;

        }


        .feature-card:nth-child(2)
        .feature-icon {

            background:
                #FFF2DE;

            color:
                var(--orange);

        }


        .feature-card:nth-child(3)
        .feature-icon {

            background:
                #FFF0EF;

            color:
                var(--red);

        }


        .feature-card h3 {

            font-size: 19px;

            margin-bottom: 9px;

        }


        .feature-card p {

            color: var(--muted);

            font-size: 14px;

            line-height: 1.7;

        }


        /* =========================================================
           CTA
        ========================================================= */

        .cta-section {

            padding:
                0 0 85px;

        }


        .cta {

            position: relative;

            overflow: hidden;

            padding:
                55px 60px;

            border-radius: 22px;

            background:
                linear-gradient(
                    135deg,
                    var(--green),
                    var(--green-dark)
                );

            color: var(--white);
            
            transition: transform 0.3s ease, box-shadow 0.3s ease;

        }
        
        .cta:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(92, 148, 29, 0.25);
        }


        .cta-content {

            position: relative;

            z-index: 2;

            max-width: 650px;

        }


        .cta h2 {

            font-size: 34px;

            line-height: 1.2;

            margin-bottom: 12px;

        }


        .cta p {

            color:
                rgba(255, 255, 255, 0.88);

            font-size: 15px;

            margin-bottom: 25px;

        }


        .cta .btn {

            background: var(--white);

            color: var(--green-dark);

        }


        .cta-circle-orange {

            position: absolute;

            width: 230px;

            height: 230px;

            border-radius: 50%;

            background: var(--orange);

            opacity: 0.9;

            right: -70px;

            top: -90px;
            
            animation: pulse 6s ease-in-out infinite alternate;

        }


        .cta-circle-red {

            position: absolute;

            width: 110px;

            height: 110px;

            border-radius: 50%;

            background: var(--red);

            opacity: 0.9;

            right: 170px;

            bottom: -65px;
            
            animation: pulse 8s ease-in-out infinite alternate-reverse;

        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {

            padding:
                30px 0;

            border-top:
                1px solid var(--border);

            background:
                #FAFCF8;

        }


        .footer-inner {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

        }


        .footer-logo img {

            width: 130px;

            height: auto;

        }


        .footer-text {

            color: var(--muted);

            font-size: 12px;

        }


        .footer-colors {

            display: flex;

            gap: 5px;

        }


        .footer-colors span {

            width: 22px;

            height: 4px;

            border-radius: 99px;

        }


        .footer-green {

            background: var(--green);

        }


        .footer-orange {

            background: var(--orange);

        }


        .footer-red {

            background: var(--red);

        }


        /* =========================================================
           MOBILE NAV
        ========================================================= */

        .mobile-nav {

            display: none;

        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 900px) {

            .nav-menu {

                display: none;

            }


            .hero-inner {

                grid-template-columns: 1fr;

                gap: 35px;

                padding-top: 55px;

            }


            .hero-content {

                text-align: center;

            }


            .hero-description {

                margin-left: auto;

                margin-right: auto;

            }


            .hero-actions {

                justify-content: center;

            }


            .hero-visual {

                min-height: 360px;

            }


            .feature-grid {

                grid-template-columns:
                    1fr 1fr;

            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 600px) {

            .container {

                padding-left: 18px;

                padding-right: 18px;

            }


            .navbar-inner {

                min-height: 68px;

            }


            .logo img {

                width: 75px;
                
                height: auto; /* REVISI: Menjaga rasio logo di mobile */

            }


            .nav-actions .btn-login {

                display: none;

            }


            .nav-actions .btn-primary {

                min-height: 39px;

                padding:
                    0 15px;

                font-size: 13px;

            }


            .hero-inner {

                min-height: auto;

                padding-top: 45px;

                padding-bottom: 50px;

            }


            .hero-title {

                font-size: 38px;

                letter-spacing: -0.8px;

            }


            .hero-description {

                font-size: 15px;

            }


            .hero-visual {

                min-height: 315px;

            }


            .hero-circle {

                width: 290px;

                height: 290px;

            }


            .member-card {

                width: 285px;

                min-height: 190px;

                padding: 21px;

            }


            .member-card-top {

                margin-bottom: 27px;

            }


            .member-card-name {

                font-size: 20px;

            }


            .member-card-points-value {

                font-size: 23px;

            }


            .decor-orange {

                width: 55px;

                height: 55px;

                right: 0;

            }


            .decor-red {

                width: 40px;

                height: 40px;

                left: 0;

            }


            .features {

                padding:
                    60px 0;

            }


            .section-heading {

                margin-bottom: 30px;

            }


            .section-heading h2 {

                font-size: 29px;

            }


            .feature-grid {

                grid-template-columns: 1fr;

            }


            .cta-section {

                padding-bottom: 60px;

            }


            .cta {

                padding:
                    38px 25px;

                border-radius: 17px;

            }


            .cta h2 {

                font-size: 28px;

            }


            .footer-inner {

                flex-direction: column;

                text-align: center;

            }

        }


        /* =========================================================
           SMALL MOBILE
        ========================================================= */

        @media (max-width: 380px) {

            .hero-title {

                font-size: 34px;

            }


            .hero-actions {

                flex-direction: column;

            }


            .hero-actions .btn {

                width: 100%;

            }


            .member-card {

                width: 265px;

            }

        }

    </style>

</head>


<body>


{{-- =============================================================
     NAVBAR
============================================================= --}}

<header class="navbar">

    <div class="container">

        <div class="navbar-inner">


            {{-- LOGO --}}

            <a
                href="{{ route('member.landing') }}"
                class="logo"
            >

                @if (file_exists(public_path('images/chiamates-logo.png.jpeg')))

                    <img
                        src="{{ asset('images/chiamates-logo.png.jpeg') }}"
                        alt="CHIAMATES"
                    >

                @else

                    <span
                        class="logo-fallback"
                        style="display: block;"
                    >
                        CHIAMATES
                    </span>

                @endif

            </a>


            {{-- NAVIGATION --}}

            <nav class="nav-menu">

                <a
                    href="#beranda"
                    class="nav-link"
                >
                    Beranda
                </a>

                <a
                    href="#fitur"
                    class="nav-link"
                >
                    Fitur
                </a>

                <a
                    href="#tentang"
                    class="nav-link"
                >
                    Tentang
                </a>

            </nav>


            {{-- ACTIONS --}}

            <div class="nav-actions">

                <a
                    href="{{ route('login') }}"
                    class="btn btn-login"
                >
                    Login
                </a>


                @if (Route::has('register'))

                    <a
                        href="{{ route('register') }}"
                        class="btn btn-primary"
                    >
                        Daftar
                    </a>

                @endif

            </div>


        </div>

    </div>

</header>



{{-- =============================================================
     HERO
============================================================= --}}

<main id="beranda">

    <section class="hero">

        <div class="container">

            <div class="hero-inner">


                {{-- HERO CONTENT --}}

                <div class="hero-content">


                    <div class="hero-label">

                        <span class="hero-label-dot"></span>

                        CHIAMATES Loyalty System

                    </div>


                    <h1 class="hero-title">

                        Nikmati lebih banyak
                        <span>keuntungan</span>
                        sebagai member.

                    </h1>


                    <p class="hero-description">

                        Gabungkan transaksi dan program loyalty
                        dalam satu akun. Dapatkan poin dari transaksi,
                        lihat saldo poin, gunakan QR Member, dan
                        nikmati reward yang tersedia.

                    </p>


                    <div class="hero-actions">

                        @if (Route::has('register'))

                            <a
                                href="{{ route('register') }}"
                                class="btn btn-primary"
                            >
                                Daftar sebagai Member
                            </a>

                        @endif


                        <a
                            href="#fitur"
                            class="btn btn-login"
                        >
                            Lihat Fitur
                        </a>

                    </div>


                </div>



                {{-- HERO VISUAL --}}

                <div class="hero-visual">


                    <div class="hero-circle"></div>


                    <div class="decor decor-orange"></div>

                    <div class="decor decor-red"></div>


                    {{-- DIGITAL MEMBER CARD --}}

                    <div class="member-card">


                        <div class="member-card-top">

                            <div class="member-card-brand">
                                CHIAMATES
                            </div>

                            <div class="member-card-label">
                                Member Card
                            </div>

                        </div>


                        <div>

                            <div class="member-card-name">
                                Nama Member
                            </div>

                            <div class="member-card-id">
                                ID Member
                            </div>

                        </div>


                        <div class="member-card-points">

                            <span class="member-card-points-label">
                                Poin
                            </span>

                            <span class="member-card-points-value">
                                000
                            </span>

                        </div>


                    </div>


                </div>


            </div>

        </div>

    </section>



    {{-- =========================================================
         FEATURES
    ========================================================== --}}

    <section
        id="fitur"
        class="features"
    >

        <div class="container">


            <div class="section-heading">

                <h2>
                    Semua loyalty dalam satu tempat
                </h2>

                <p>
                    Fitur utama CHIAMATES membantu member
                    melihat dan menggunakan fasilitas loyalty
                    dengan lebih mudah.
                </p>

            </div>


            <div class="feature-grid">


                {{-- MEMBER CARD --}}

                <div class="feature-card">

                    <div class="feature-icon">
                        ID
                    </div>

                    <h3>
                        Member Card Digital
                    </h3>

                    <p>
                        Member dapat melihat kartu member
                        digital yang berisi identitas dan
                        jumlah poin.
                    </p>

                </div>


                {{-- POINT --}}

                <div class="feature-card">

                    <div class="feature-icon">
                        P
                    </div>

                    <h3>
                        Poin Member
                    </h3>

                    <p>
                        Pantau jumlah poin yang diperoleh
                        dari transaksi dan perubahan poin
                        melalui sistem loyalty.
                    </p>

                </div>


                {{-- QR --}}

                <div class="feature-card">

                    <div class="feature-icon">
                        QR
                    </div>

                    <h3>
                        QR Member
                    </h3>

                    <p>
                        Gunakan QR Member sebagai identitas
                        member saat proses transaksi.
                    </p>

                </div>


            </div>

        </div>

    </section>



    {{-- =========================================================
         TENTANG / CTA
    ========================================================== --}}

    <section
        id="tentang"
        class="cta-section"
    >

        <div class="container">


            <div class="cta">


                <div class="cta-circle-orange"></div>

                <div class="cta-circle-red"></div>


                <div class="cta-content">

                    <h2>
                        Siap menjadi member CHIAMATES?
                    </h2>

                    <p>
                        Daftarkan akun kamu dan mulai gunakan
                        fasilitas loyalty CHIAMATES.
                    </p>


                    @if (Route::has('register'))

                        <a
                            href="{{ route('register') }}"
                            class="btn"
                        >
                            Daftar Sekarang
                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="btn"
                        >
                            Login Member
                        </a>

                    @endif

                </div>


            </div>

        </div>

    </section>

</main>



{{-- =============================================================
     FOOTER
============================================================= --}}

<footer class="footer">

    <div class="container">

        <div class="footer-inner">


            <div class="footer-logo">

                @if (file_exists(public_path('images/chiamates-logo.png')))

                    <img
                        src="{{ asset('images/chiamates-logo.png') }}"
                        alt="CHIAMATES"
                    >

                @else

                    <strong style="color: #78B82A;">
                        CHIAMATES
                    </strong>

                @endif

            </div>


            <div class="footer-text">

                CHIAMATES Loyalty System

            </div>


            <div class="footer-colors">

                <span class="footer-green"></span>

                <span class="footer-orange"></span>

                <span class="footer-red"></span>

            </div>


        </div>

    </div>

</footer>


</body>

</html>