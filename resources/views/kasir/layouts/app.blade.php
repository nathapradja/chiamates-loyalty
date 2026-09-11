<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>
        @yield('title', 'Kasir') - CHIAMATES
    </title>

    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        :root {

            --green: #7BAF24;

            --green-dark: #5E8D18;

            --green-soft: #EEF6DF;

            --text: #253421;

            --muted: #74806E;

            --border: #DCE3D5;

            --white: #FFFFFF;

            --danger: #B64C4C;

            --sidebar-width: 240px;

            --sidebar-collapsed-width: 76px;
        }


        html {
            min-height: 100%;
        }


        body {

            min-height: 100vh;

            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: #F5F7F3;

            color: var(--text);

            -webkit-font-smoothing: antialiased;
        }


        button,
        input,
        select,
        textarea {
            font: inherit;
        }


        a {
            color: inherit;
            text-decoration: none;
        }


        /* =====================================================
           APP
        ===================================================== */

        .kasir-app {
            min-height: 100vh;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .kasir-sidebar {

            position: fixed;

            top: 0;

            left: 0;

            z-index: 1000;

            width: var(--sidebar-width);

            height: 100vh;

            padding: 22px 15px;

            display: flex;

            flex-direction: column;

            background: var(--white);

            border-right: 1px solid var(--border);

            overflow-x: hidden;

            transition:
                width 0.25s ease,
                transform 0.25s ease;
        }


        /* =====================================================
           COLLAPSED DESKTOP
        ===================================================== */

        body.sidebar-collapsed
        .kasir-sidebar {

            width:
                var(--sidebar-collapsed-width);
        }


        body.sidebar-collapsed
        .kasir-main {

            margin-left:
                var(--sidebar-collapsed-width);
        }


        /* =====================================================
           BRAND
        ===================================================== */

        .kasir-brand {

            min-height: 48px;

            margin-bottom: 25px;

            padding: 0 7px;

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .kasir-brand-logo {

            width: 40px;

            height: 40px;

            flex: 0 0 40px;

            object-fit: contain;
        }


        .kasir-brand-fallback {

            width: 40px;

            height: 40px;

            flex: 0 0 40px;

            align-items: center;

            justify-content: center;

            border-radius: 11px;

            background: var(--green);

            color: var(--white);

            font-size: 17px;

            font-weight: 900;
        }


        .kasir-brand-text {

            min-width: 0;

            overflow: hidden;

            white-space: nowrap;

            transition:
                opacity 0.15s ease;
        }


        .kasir-brand-name {

            color: var(--text);

            font-size: 14px;

            font-weight: 850;
        }


        .kasir-brand-role {

            margin-top: 2px;

            color: var(--muted);

            font-size: 8px;

            font-weight: 700;
        }


        body.sidebar-collapsed
        .kasir-brand-text {

            width: 0;

            opacity: 0;
        }


        /* =====================================================
           MENU
        ===================================================== */

        .kasir-menu {

            display: flex;

            flex-direction: column;

            gap: 5px;
        }


        .kasir-menu-link {

            min-height: 42px;

            padding: 9px 11px;

            display: flex;

            align-items: center;

            gap: 11px;

            border-radius: 10px;

            color: var(--muted);

            font-size: 10px;

            font-weight: 700;

            white-space: nowrap;

            transition:
                background 0.2s ease,
                color 0.2s ease;
        }


        .kasir-menu-link:hover {

            background: #F4F7EF;

            color: var(--green-dark);
        }


        .kasir-menu-link.active {

            background: var(--green-soft);

            color: var(--green-dark);
        }


        .kasir-menu-icon {

            width: 24px;

            height: 24px;

            flex: 0 0 24px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 7px;

            background: #F2F5EE;

            font-size: 10px;

            font-weight: 850;
        }


        .kasir-menu-link.active
        .kasir-menu-icon {

            background: var(--green);

            color: var(--white);
        }


        .kasir-menu-text {

            overflow: hidden;

            transition:
                opacity 0.15s ease;
        }


        .kasir-notif-badge {

            margin-left: auto;

            background: var(--danger);

            color: var(--white);

            font-size: 10px;

            font-weight: 800;

            padding: 2px 7px;

            border-radius: 10px;

            display: inline-flex;

            align-items: center;

            justify-content: center;
        }


        body.sidebar-collapsed
        .kasir-menu-link {

            justify-content: center;

            padding-left: 8px;

            padding-right: 8px;
        }


        body.sidebar-collapsed
        .kasir-menu-text {

            width: 0;

            opacity: 0;
        }


        body.sidebar-collapsed
        .kasir-notif-badge {

            display: none;
        }


        /* =====================================================
           SIDEBAR BOTTOM
        ===================================================== */

        .kasir-sidebar-bottom {

            margin-top: auto;

            padding-top: 15px;

            border-top: 1px solid #EEF1EB;
        }


        .kasir-logout-button {

            width: 100%;

            min-height: 42px;

            padding: 9px 11px;

            display: flex;

            align-items: center;

            gap: 11px;

            border: 0;

            border-radius: 10px;

            background: transparent;

            color: var(--muted);

            cursor: pointer;

            font-size: 10px;

            font-weight: 700;

            text-align: left;

            white-space: nowrap;
        }


        .kasir-logout-button:hover {

            background: #FFF3F3;

            color: var(--danger);
        }


        body.sidebar-collapsed
        .kasir-logout-button {

            justify-content: center;

            padding-left: 8px;

            padding-right: 8px;
        }


        body.sidebar-collapsed
        .kasir-logout-button
        .kasir-menu-text {

            width: 0;

            opacity: 0;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .kasir-main {

            min-height: 100vh;

            margin-left: var(--sidebar-width);

            transition:
                margin-left 0.25s ease;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .kasir-topbar {

            min-height: 72px;

            padding: 0 28px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            background: var(--white);

            border-bottom: 1px solid var(--border);
        }


        .kasir-topbar-left {

            display: flex;

            align-items: center;

            gap: 13px;
        }


        .kasir-hamburger {

            width: 38px;

            height: 38px;

            flex: 0 0 38px;

            display: flex;

            align-items: center;

            justify-content: center;

            border: 1px solid var(--border);

            border-radius: 9px;

            background: var(--white);

            color: var(--text);

            cursor: pointer;

            font-size: 16px;

            transition:
                background 0.2s ease,
                border-color 0.2s ease;
        }


        .kasir-hamburger:hover {

            background: #F4F7EF;

            border-color: #C9D7BB;
        }


        .kasir-page-title {

            font-size: 16px;

            font-weight: 850;
        }


        .kasir-page-subtitle {

            margin-top: 2px;

            color: var(--muted);

            font-size: 9px;
        }


        /* =====================================================
           USER
        ===================================================== */

        .kasir-user {

            display: flex;

            align-items: center;

            gap: 9px;
        }


        .kasir-user-avatar {

            width: 34px;

            height: 34px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: var(--green-soft);

            color: var(--green-dark);

            font-size: 11px;

            font-weight: 850;
        }


        .kasir-user-name {

            font-size: 10px;

            font-weight: 800;
        }


        .kasir-user-role {

            margin-top: 2px;

            color: var(--muted);

            font-size: 8px;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .kasir-content {

            min-height:
                calc(100vh - 72px);

            padding: 28px;
        }


        /* =====================================================
           MOBILE OVERLAY
        ===================================================== */

        .kasir-overlay {

            position: fixed;

            inset: 0;

            z-index: 900;

            display: none;

            background:
                rgba(25, 35, 20, 0.35);

            backdrop-filter:
                blur(2px);
        }


        .kasir-overlay.show {

            display: block;
        }


        /* =====================================================
           LOGOUT MODAL
        ===================================================== */

        .kasir-logout-modal {

            position: fixed;

            inset: 0;

            z-index: 9999;

            display: none;

            align-items: center;

            justify-content: center;

            padding: 20px;
        }


        .kasir-logout-modal.show {

            display: flex;
        }


        .kasir-logout-overlay {

            position: absolute;

            inset: 0;

            background:
                rgba(25, 35, 20, 0.42);

            backdrop-filter:
                blur(4px);
        }


        .kasir-logout-card {

            position: relative;

            width:
                min(390px, 100%);

            padding: 27px;

            background: var(--white);

            border:
                1px solid var(--border);

            border-radius: 20px;

            box-shadow:
                0 25px 70px
                rgba(0, 0, 0, 0.18);

            text-align: center;
        }


        .kasir-logout-icon {

            width: 52px;

            height: 52px;

            margin: 0 auto 15px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 14px;

            background: #FFF3F3;

            color: var(--danger);

            font-size: 19px;

            font-weight: 800;
        }


        .kasir-logout-card h3 {

            font-size: 17px;

            font-weight: 850;
        }


        .kasir-logout-card p {

            margin-top: 8px;

            color: var(--muted);

            font-size: 10px;

            line-height: 1.7;
        }


        .kasir-logout-actions {

            margin-top: 22px;

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 10px;
        }


        .kasir-cancel-button,
        .kasir-confirm-button {

            min-height: 42px;

            border-radius: 10px;

            cursor: pointer;

            font-size: 10px;

            font-weight: 800;
        }


        .kasir-cancel-button {

            border: 1px solid var(--border);

            background: var(--white);

            color: var(--muted);
        }


        .kasir-confirm-button {

            border: 0;

            background: var(--danger);

            color: var(--white);
        }


        /* =====================================================
           DESKTOP
        ===================================================== */

        @media (min-width: 851px) {

            .kasir-overlay {

                display: none !important;
            }

        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 850px) {

            .kasir-sidebar {

                width:
                    var(--sidebar-width);

                transform:
                    translateX(-100%);

                box-shadow:
                    8px 0 30px
                    rgba(0, 0, 0, 0.08);
            }


            .kasir-sidebar.mobile-open {

                transform:
                    translateX(0);
            }


            .kasir-main {

                margin-left: 0;
            }


            body.sidebar-collapsed
            .kasir-sidebar {

                width:
                    var(--sidebar-width);
            }


            body.sidebar-collapsed
            .kasir-main {

                margin-left: 0;
            }


            body.sidebar-collapsed
            .kasir-brand-text {

                width: auto;

                opacity: 1;
            }


            body.sidebar-collapsed
            .kasir-menu-link {

                justify-content: flex-start;

                padding-left: 11px;

                padding-right: 11px;
            }


            body.sidebar-collapsed
            .kasir-menu-text {

                width: auto;

                opacity: 1;
            }


            body.sidebar-collapsed
            .kasir-notif-badge {

                display: inline-flex;
            }


            body.sidebar-collapsed
            .kasir-logout-button {

                justify-content: flex-start;

                padding-left: 11px;

                padding-right: 11px;
            }


            body.sidebar-collapsed
            .kasir-logout-button
            .kasir-menu-text {

                width: auto;

                opacity: 1;
            }


            .kasir-content {

                padding:
                    22px 18px;
            }


            .kasir-topbar {

                padding:
                    0 18px;
            }

        }


        @media (max-width: 520px) {

            .kasir-user-name-wrap {

                display: none;
            }


            .kasir-topbar {

                min-height:
                    64px;
            }


            .kasir-page-title {

                font-size:
                    14px;
            }


            .kasir-page-subtitle {

                display:
                    none;
            }


            .kasir-logout-actions {

                grid-template-columns:
                    1fr;
            }

        }

    </style>

    @stack('styles')

</head>


<body>

    <div class="kasir-app">


        {{-- =================================================
             SIDEBAR
        ================================================= --}}

        <aside
            class="kasir-sidebar"
            id="kasirSidebar"
        >

            <div class="kasir-brand">

                <img
                    src="{{ asset('images/chiamates-logo.png.jpeg') }}"
                    
                    class="kasir-brand-logo"
                    onerror="
                        this.style.display='none';
                        this.nextElementSibling.style.display='flex';
                    "
                >

                <div
                    class="kasir-brand-fallback"
                    style="display:none;"
                >
                    C
                </div>


                <div class="kasir-brand-text">

                    <div class="kasir-brand-name">
                        CHIAMATES
                    </div>

                    <div class="kasir-brand-role">
                        Loyalty System · Kasir
                    </div>

                </div>

            </div>


            {{-- =================================================
                 MENU
            ================================================= --}}

            <nav class="kasir-menu">


                <a
                    href="{{ route('kasir.dashboard') }}"
                    class="kasir-menu-link {{ request()->routeIs('kasir.dashboard') ? 'active' : '' }}"
                    data-sidebar-link
                    title="Dashboard"
                >

                    <span class="kasir-menu-icon">
                        D
                    </span>

                    <span class="kasir-menu-text">
                        Dashboard
                    </span>

                </a>


                <a
                    href="{{ route('kasir.member.scan') }}"
                    class="kasir-menu-link {{ request()->routeIs('kasir.member.*') ? 'active' : '' }}"
                    data-sidebar-link
                    title="Scan Member"
                >

                    <span class="kasir-menu-icon">
                        S
                    </span>

                    <span class="kasir-menu-text">
                        Scan Member
                    </span>

                </a>


                <a
                    href="{{ route('kasir.member.register') }}"
                    class="kasir-menu-link"
                    data-sidebar-link
                    title="Registrasi Member"
                >

                    <span class="kasir-menu-icon">
                        +
                    </span>

                    <span class="kasir-menu-text">
                        Registrasi Member
                    </span>

                </a>


                <a
                    href="{{ route('kasir.pending.members') }}"
                    class="kasir-menu-link {{ request()->routeIs('kasir.pending.members') ? 'active' : '' }}"
                    data-sidebar-link
                    title="Persetujuan Member"
                >

                    <span class="kasir-menu-icon">
                        A
                    </span>

                    <span class="kasir-menu-text">
                        Persetujuan Member
                    </span>

                    @php
                        $pendingCount = \App\Models\Member::where('status', 'pending')->count();
                    @endphp

                    @if($pendingCount > 0)
                        <span class="kasir-notif-badge">
                            {{ $pendingCount }}
                        </span>
                    @endif

                </a>


                <a
                    href="{{ route('kasir.members') }}"
                    class="kasir-menu-link {{ request()->routeIs('kasir.members') ? 'active' : '' }}"
                    data-sidebar-link
                    title="Data Member"
                >

                    <span class="kasir-menu-icon">
                        M
                    </span>

                    <span class="kasir-menu-text">
                        Data Member
                    </span>

                </a>


                <a
                    href="{{ route('kasir.transaction.history') }}"
                    class="kasir-menu-link"
                    data-sidebar-link
                    title="Riwayat Transaksi"
                >

                    <span class="kasir-menu-icon">
                        R
                    </span>

                    <span class="kasir-menu-text">
                        Riwayat Transaksi
                    </span>

                </a>


                <a
                    href="{{ route('kasir.profile') }}"
                    class="kasir-menu-link"
                    data-sidebar-link
                    title="Profil"
                >

                    <span class="kasir-menu-icon">
                        P
                    </span>

                    <span class="kasir-menu-text">
                        Profil
                    </span>

                </a>


            </nav>


            {{-- =================================================
                 LOGOUT
            ================================================= --}}

            <div class="kasir-sidebar-bottom">

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    id="kasirLogoutForm"
                >

                    @csrf


                    <button
                        type="button"
                        class="kasir-logout-button"
                        onclick="openKasirLogoutModal()"
                        title="Keluar"
                    >

                        <span class="kasir-menu-icon">
                            ↪
                        </span>

                        <span class="kasir-menu-text">
                            Keluar
                        </span>

                    </button>

                </form>

            </div>

        </aside>


        {{-- =================================================
             MOBILE OVERLAY
        ================================================= --}}

        <div
            class="kasir-overlay"
            id="kasirOverlay"
        ></div>


        {{-- =================================================
             MAIN
        ================================================= --}}

        <main class="kasir-main">


            {{-- =================================================
                 TOPBAR
            ================================================= --}}

            <header class="kasir-topbar">

                <div class="kasir-topbar-left">

                    <button
                        type="button"
                        class="kasir-hamburger"
                        id="kasirHamburger"
                        aria-label="Buka menu"
                        aria-expanded="false"
                    >
                        ☰
                    </button>


                    <div>

                        <div class="kasir-page-title">
                            @yield('page-title', 'Dashboard')
                        </div>

                        <div class="kasir-page-subtitle">
                            CHIAMATES Loyalty System
                        </div>

                    </div>

                </div>


                {{-- =================================================
                     USER
                ================================================= --}}

                <div class="kasir-user">

                    <div class="kasir-user-avatar">

                        {{ strtoupper(
                            substr(
                                auth()->user()->name ?? 'K',
                                0,
                                1
                            )
                        ) }}

                    </div>


                    <div class="kasir-user-name-wrap">

                        <div class="kasir-user-name">
                            {{ auth()->user()->name ?? 'Kasir' }}
                        </div>

                        <div class="kasir-user-role">
                            Kasir
                        </div>

                    </div>

                </div>

            </header>


            {{-- =================================================
                 CONTENT
            ================================================= --}}

            <section class="kasir-content">

                @yield('content')

            </section>

        </main>

    </div>


    {{-- =====================================================
         LOGOUT MODAL
    ===================================================== --}}

    <div
        class="kasir-logout-modal"
        id="kasirLogoutModal"
        aria-hidden="true"
    >

        <div
            class="kasir-logout-overlay"
            onclick="closeKasirLogoutModal()"
        ></div>


        <div
            class="kasir-logout-card"
            role="dialog"
            aria-modal="true"
        >

            <div class="kasir-logout-icon">
                ↪
            </div>


            <h3>
                Keluar dari akun?
            </h3>


            <p>
                Apakah kamu yakin ingin keluar dari
                akun kasir CHIAMATES?
            </p>


            <div class="kasir-logout-actions">

                <button
                    type="button"
                    class="kasir-cancel-button"
                    onclick="closeKasirLogoutModal()"
                >
                    Batal
                </button>


                <button
                    type="button"
                    class="kasir-confirm-button"
                    onclick="confirmKasirLogout()"
                >
                    Ya, Keluar
                </button>

            </div>

        </div>

    </div>


    <script>

        /* =====================================================
           ELEMENT
        ===================================================== */

        const kasirSidebar =
            document.getElementById(
                'kasirSidebar'
            );


        const kasirHamburger =
            document.getElementById(
                'kasirHamburger'
            );


        const kasirOverlay =
            document.getElementById(
                'kasirOverlay'
            );


        /* =====================================================
           CHECK MOBILE
        ===================================================== */

        function isKasirMobile() {

            return window.innerWidth <= 850;

        }


        /* =====================================================
           OPEN MOBILE SIDEBAR
        ===================================================== */

        function openKasirSidebar() {

            if (!kasirSidebar) {
                return;
            }


            kasirSidebar.classList.add(
                'mobile-open'
            );


            if (kasirOverlay) {

                kasirOverlay.classList.add(
                    'show'
                );

            }


            if (kasirHamburger) {

                kasirHamburger.setAttribute(
                    'aria-expanded',
                    'true'
                );

            }


            document.body.style.overflow =
                'hidden';

        }


        /* =====================================================
           CLOSE MOBILE SIDEBAR
        ===================================================== */

        function closeKasirSidebar() {

            if (!kasirSidebar) {
                return;
            }


            kasirSidebar.classList.remove(
                'mobile-open'
            );


            if (kasirOverlay) {

                kasirOverlay.classList.remove(
                    'show'
                );

            }


            if (kasirHamburger) {

                kasirHamburger.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }


            document.body.style.overflow =
                '';

        }


        /* =====================================================
           TOGGLE SIDEBAR
        ===================================================== */

        if (kasirHamburger) {

            kasirHamburger.addEventListener(
                'click',
                function (event) {

                    event.stopPropagation();


                    if (isKasirMobile()) {

                        if (
                            kasirSidebar.classList.contains(
                                'mobile-open'
                            )
                        ) {

                            closeKasirSidebar();

                        } else {

                            openKasirSidebar();

                        }

                        return;

                    }


                    document.body.classList.toggle(
                        'sidebar-collapsed'
                    );

                }
            );

        }


        /* =====================================================
           OVERLAY CLICK
        ===================================================== */

        if (kasirOverlay) {

            kasirOverlay.addEventListener(
                'click',
                function () {

                    closeKasirSidebar();

                }
            );

        }


        /* =====================================================
           CLICK OUTSIDE SIDEBAR
        ===================================================== */

        document.addEventListener(
            'click',
            function (event) {

                if (!isKasirMobile()) {
                    return;
                }


                if (
                    !kasirSidebar ||
                    !kasirSidebar.classList.contains(
                        'mobile-open'
                    )
                ) {

                    return;

                }


                const clickedInsideSidebar =
                    kasirSidebar.contains(
                        event.target
                    );


                const clickedHamburger =
                    kasirHamburger &&
                    kasirHamburger.contains(
                        event.target
                    );


                if (
                    !clickedInsideSidebar &&
                    !clickedHamburger
                ) {

                    closeKasirSidebar();

                }

            }
        );


        /* =====================================================
           MENU CLICK
        ===================================================== */

        document
            .querySelectorAll(
                '[data-sidebar-link]'
            )
            .forEach(function (link) {

                link.addEventListener(
                    'click',
                    function () {

                        if (
                            isKasirMobile()
                        ) {

                            closeKasirSidebar();

                        }

                    }
                );

            });


        /* =====================================================
           RESIZE
        ===================================================== */

        window.addEventListener(
            'resize',
            function () {

                if (!isKasirMobile()) {

                    closeKasirSidebar();

                    document.body.style.overflow =
                        '';

                }

            }
        );


        /* =====================================================
           ESCAPE
        ===================================================== */

        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key === 'Escape'
                ) {

                    closeKasirSidebar();

                    closeKasirLogoutModal();

                }

            }
        );


        /* =====================================================
           LOGOUT MODAL
        ===================================================== */

        function openKasirLogoutModal() {

            const modal =
                document.getElementById(
                    'kasirLogoutModal'
                );


            if (!modal) {
                return;
            }


            closeKasirSidebar();


            modal.classList.add(
                'show'
            );


            modal.setAttribute(
                'aria-hidden',
                'false'
            );


            document.body.style.overflow =
                'hidden';

        }


        function closeKasirLogoutModal() {

            const modal =
                document.getElementById(
                    'kasirLogoutModal'
                );


            if (!modal) {
                return;
            }


            modal.classList.remove(
                'show'
            );


            modal.setAttribute(
                'aria-hidden',
                'true'
            );


            document.body.style.overflow =
                '';

        }


        function confirmKasirLogout() {

            const form =
                document.getElementById(
                    'kasirLogoutForm'
                );


            if (form) {

                form.submit();

            }

        }

    </script>


    @stack('scripts')

</body>

</html>