<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Admin')
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

            background: #f7faf5;

            color: #29422d;

            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

        }


        /* =====================================================
           LAYOUT
        ====================================================== */

        .admin-layout {

            min-height: 100vh;

            display: flex;

        }


        /* =====================================================
           SIDEBAR
        ====================================================== */

        .admin-sidebar {

            position: fixed;

            top: 0;
            left: 0;
            bottom: 0;

            width: 245px;

            display: flex;
            flex-direction: column;

            background: #ffffff;

            border-right:
                1px solid #e3ebdf;

            z-index: 1000;

            transition:
                transform .25s ease;

        }


        /* =====================================================
           BRAND
        ====================================================== */

        .admin-brand {

            height: 76px;

            display: flex;
            align-items: center;

            gap: 11px;

            padding: 0 20px;

            border-bottom:
                1px solid #edf1eb;

            text-decoration: none;

        }


        .admin-brand-logo {

            width: 39px;
            height: 39px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 11px;

            background: #65ad20;

            color: #ffffff;

            font-size: 14px;

            font-weight: 800;

        }


        .admin-brand-text {

            min-width: 0;

        }


        .admin-brand-name {

            margin: 0 0 2px;

            color: #29422d;

            font-size: 13px;

            font-weight: 800;

        }


        .admin-brand-role {

            margin: 0;

            color: #94a092;

            font-size: 9px;

        }


        /* =====================================================
           NAVIGATION
        ====================================================== */

        .admin-nav {

            flex: 1;

            overflow-y: auto;

            padding: 20px 13px;

        }


        .admin-nav-label {

            margin: 0 9px 9px;

            color: #a0aa9e;

            font-size: 8px;

            font-weight: 800;

            letter-spacing: .08em;

        }


        .admin-menu-link {

            width: 100%;

            min-height: 43px;

            display: flex;

            align-items: center;

            gap: 11px;

            margin-bottom: 4px;

            padding: 0 11px;

            border-radius: 10px;

            color: #687568;

            text-decoration: none;

            font-size: 11px;

            font-weight: 700;

            transition:
                background .18s ease,
                color .18s ease;

        }


        .admin-menu-link:hover {

            background: #f3f8ef;

            color: #579719;

        }


        .admin-menu-link.active {

            background: #eef7e7;

            color: #579719;

        }


        .admin-menu-icon {

            width: 27px;
            height: 27px;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            border-radius: 8px;

            background: #f4f7f2;

            color: #71806e;

            font-size: 9px;

            font-weight: 800;

        }


        .admin-menu-link.active
        .admin-menu-icon {

            background: #65ad20;

            color: #ffffff;

        }


        /* =====================================================
           SIDEBAR FOOTER
        ====================================================== */

        .admin-sidebar-footer {

            padding: 13px;

            border-top:
                1px solid #edf1eb;

        }


        .admin-profile-mini {

            display: flex;

            align-items: center;

            gap: 9px;

            padding: 9px;

            border-radius: 11px;

            background: #f7faf5;

        }


        .admin-avatar {

            width: 33px;
            height: 33px;

            display: flex;

            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 10px;

            background: #65ad20;

            color: #ffffff;

            font-size: 10px;

            font-weight: 800;

        }


        .admin-profile-info {

            min-width: 0;

            flex: 1;

        }


        .admin-profile-name {

            overflow: hidden;

            margin: 0 0 2px;

            color: #435443;

            font-size: 10px;

            font-weight: 800;

            white-space: nowrap;

            text-overflow: ellipsis;

        }


        .admin-profile-role {

            margin: 0;

            color: #9aa49a;

            font-size: 8px;

        }


        /* =====================================================
           LOGOUT
        ====================================================== */

        .admin-logout-form {

            margin: 8px 0 0;

            padding: 0;

        }


        .admin-logout-button {

            width: 100%;

            min-height: 42px;

            display: flex;

            align-items: center;

            gap: 11px;

            margin: 0;

            padding: 0 11px;

            border: 0;

            border-radius: 10px;

            background: transparent;

            color: #8a6868;

            font-family: inherit;

            font-size: 11px;

            font-weight: 700;

            text-align: left;

            cursor: pointer;

            transition:
                background .18s ease,
                color .18s ease;

        }


        .admin-logout-button:hover {

            background: #fff5f5;

            color: #c05252;

        }


        .admin-logout-icon {

            background: #faf2f2;

            color: #a46b6b;

        }


        .admin-logout-button:hover
        .admin-logout-icon {

            background: #c05252;

            color: #ffffff;

        }


        /* =====================================================
           MAIN
        ====================================================== */

        .admin-main {

            min-width: 0;

            flex: 1;

            margin-left: 245px;

        }


        /* =====================================================
           TOPBAR
        ====================================================== */

        .admin-topbar {

            position: sticky;

            top: 0;

            height: 66px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 27px;

            background:
                rgba(
                    255,
                    255,
                    255,
                    .96
                );

            border-bottom:
                1px solid #e7eee3;

            backdrop-filter:
                blur(10px);

            z-index: 500;

        }


        .admin-topbar-left {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .admin-page-title {

            margin: 0;

            color: #29422d;

            font-size: 13px;

            font-weight: 800;

        }


        .admin-page-subtitle {

            margin: 2px 0 0;

            color: #9aa49a;

            font-size: 8px;

        }


        /* =====================================================
           HAMBURGER
        ====================================================== */

        .admin-hamburger {

            width: 35px;
            height: 35px;

            display: none;

            align-items: center;

            justify-content: center;

            border:
                1px solid #e0e8dc;

            border-radius: 9px;

            background: #ffffff;

            color: #526252;

            cursor: pointer;

        }


        .admin-hamburger span {

            width: 15px;
            height: 2px;

            position: relative;

            display: block;

            background: #526252;

        }


        .admin-hamburger span::before,
        .admin-hamburger span::after {

            content: "";

            position: absolute;

            left: 0;

            width: 15px;
            height: 2px;

            background: #526252;

        }


        .admin-hamburger span::before {

            top: -5px;

        }


        .admin-hamburger span::after {

            top: 5px;

        }


        /* =====================================================
           CONTENT
        ====================================================== */

        .admin-content {

            padding: 28px;

        }


        /* =====================================================
           OVERLAY
        ====================================================== */

        .admin-sidebar-overlay {

            position: fixed;

            inset: 0;

            display: none;

            background:
                rgba(
                    24,
                    53,
                    28,
                    .20
                );

            z-index: 900;

        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 900px) {

            .admin-sidebar {

                transform:
                    translateX(-100%);

            }


            .admin-sidebar.open {

                transform:
                    translateX(0);

            }


            .admin-sidebar-overlay.show {

                display: block;

            }


            .admin-main {

                margin-left: 0;

            }


            .admin-hamburger {

                display: flex;

            }

        }


        @media (max-width: 600px) {

            .admin-topbar {

                height: 60px;

                padding: 0 17px;

            }


            .admin-content {

                padding: 19px;

            }


            .admin-page-subtitle {

                display: none;

            }

        }

    </style>

</head>


<body>


<div class="admin-layout">


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside
        class="admin-sidebar"
        id="adminSidebar"
    >


        {{-- =================================================
             BRAND
        ================================================== --}}

        <a
            href="{{ route('admin.dashboard') }}"
            class="admin-brand"
        >

            <div class="admin-brand-logo">
                <img src="{{ asset('images/chiamates-logo.png.jpeg') }}" style="width:100%; height:100%; object-fit:contain; border-radius:11px;" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <span style="display:none;">C</span>
            </div>


            <div class="admin-brand-text">

                <p class="admin-brand-name">
                    Chiamates
                </p>

                <p class="admin-brand-role">
                    Admin Panel
                </p>

            </div>

        </a>


        {{-- =================================================
             NAVIGATION
        ================================================== --}}

        <nav class="admin-nav">


            <p class="admin-nav-label">
                MENU UTAMA
            </p>


            {{-- =================================================
                 DASHBOARD
            ================================================== --}}

            <a
                href="{{ route('admin.dashboard') }}"
                class="admin-menu-link
                    {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                data-sidebar-link
                title="Dashboard"
            >

                <span class="admin-menu-icon">
                    D
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- =================================================
                 DATA MEMBER
            ================================================== --}}

            <a
                href="{{ route('admin.members') }}"
                class="admin-menu-link
                    {{ request()->routeIs('admin.members*') ? 'active' : '' }}"
                data-sidebar-link
                title="Data Member"
            >

                <span class="admin-menu-icon">
                    M
                </span>

                <span>
                    Data Member
                </span>

            </a>


            {{-- =================================================
                 TRANSAKSI
            ================================================== --}}

            <a
                href="{{ route('admin.transactions') }}"
                class="admin-menu-link
                    {{ request()->routeIs('admin.transactions*') ? 'active' : '' }}"
                data-sidebar-link
                title="Transaksi"
            >

                <span class="admin-menu-icon">
                    T
                </span>

                <span>
                    Transaksi
                </span>

            </a>


            {{-- =================================================
                 POIN
                 
                 BELUM DIARAHKAN KE ROUTE AGAR TIDAK ERROR
                 ================================================== --}}

            <a
    href="{{ route('admin.points.history') }}"
    class="admin-menu-link
        {{ request()->routeIs('admin.points.history*') ? 'active' : '' }}"
    data-sidebar-link
    title="Riwayat Poin"
>

    <span class="admin-menu-icon">
        P
    </span>

    <span>
        Riwayat Poin
    </span>

</a>
            {{-- =================================================
                 REWARD
            ================================================== --}}

            <a
                href="{{ route('admin.rewards.index') }}"
                class="admin-menu-link {{ request()->routeIs('admin.rewards*') ? 'active' : '' }}"
                data-sidebar-link
                title="Reward"
            >

                <span class="admin-menu-icon">
                    R
                </span>

                <span>
                    Reward
                </span>

            </a>


            {{-- =================================================
                 REDEEM
            ================================================== --}}

            <a
                href="{{ route('admin.redeems.index') }}"
                class="admin-menu-link {{ request()->routeIs('admin.redeems*') ? 'active' : '' }}"
                data-sidebar-link
                title="Redeem"
            >

                <span class="admin-menu-icon">
                    E
                </span>

                <span>
                    Redeem
                </span>

            </a>


            <p
                class="admin-nav-label"
                style="margin-top: 24px;"
            >
                SISTEM
            </p>


            {{-- =================================================
                 PENGGUNA
            ================================================== --}}

            <a
                href="{{ route('admin.users.index') }}"
                class="admin-menu-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}"
                data-sidebar-link
                title="Pengguna"
            >

                <span class="admin-menu-icon">
                    U
                </span>

                <span>
                    Pengguna
                </span>

            </a>


            {{-- =================================================
                 LAPORAN
            ================================================== --}}

            <a
                href="{{ route('admin.reports.index') }}"
                class="admin-menu-link {{ request()->routeIs('admin.reports*') ? 'active' : '' }}"
                data-sidebar-link
                title="Laporan"
            >

                <span class="admin-menu-icon">
                    L
                </span>

                <span>
                    Laporan
                </span>

            </a>


        </nav>


        {{-- =================================================
             SIDEBAR FOOTER
        ================================================== --}}

        <div class="admin-sidebar-footer">


            {{-- =================================================
                 PROFILE MINI
            ================================================== --}}

            <div class="admin-profile-mini">

                <div class="admin-avatar">

                    {{
                        strtoupper(
                            substr(
                                auth()->user()->name ?? 'A',
                                0,
                                1
                            )
                        )
                    }}

                </div>


                <div class="admin-profile-info">

                    <p class="admin-profile-name">

                        {{ auth()->user()->name ?? 'Administrator' }}

                    </p>


                    <p class="admin-profile-role">
                        Administrator
                    </p>

                </div>

            </div>


            {{-- =================================================
                 LOGOUT
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('logout') }}"
                id="adminLogoutForm"
                class="admin-logout-form"
            >

                @csrf


                <button
                    type="button"
                    class="admin-logout-button"
                    id="adminLogoutButton"
                >

                    <span
                        class="admin-menu-icon admin-logout-icon"
                    >
                        ↪
                    </span>


                    <span>
                        Keluar
                    </span>

                </button>

            </form>


        </div>


    </aside>


    {{-- =====================================================
         OVERLAY
    ====================================================== --}}

    <div
        class="admin-sidebar-overlay"
        id="adminSidebarOverlay"
    ></div>


    {{-- =====================================================
         MAIN
    ====================================================== --}}

    <main class="admin-main">


        {{-- =================================================
             TOPBAR
        ================================================== --}}

        <header class="admin-topbar">


            <div class="admin-topbar-left">


                <button
                    type="button"
                    class="admin-hamburger"
                    id="adminHamburger"
                    aria-label="Buka menu"
                >

                    <span></span>

                </button>


                <div>

                    <p class="admin-page-title">

                        @yield(
                            'title',
                            'Admin'
                        )

                    </p>


                    <p class="admin-page-subtitle">
                    Chiamates Loyalty System
                    </p>

                </div>


            </div>


        </header>


        {{-- =================================================
             CONTENT
        ================================================== --}}

        <section class="admin-content">

            @yield('content')

        </section>


    </main>


</div>


<script>

    /* =====================================================
       SIDEBAR ELEMENT
    ====================================================== */

    const sidebar =
        document.getElementById(
            'adminSidebar'
        );


    const hamburger =
        document.getElementById(
            'adminHamburger'
        );


    const overlay =
        document.getElementById(
            'adminSidebarOverlay'
        );


    /* =====================================================
       OPEN SIDEBAR
    ====================================================== */

    function openSidebar() {

        if (
            !sidebar ||
            !overlay
        ) {

            return;

        }


        sidebar.classList.add(
            'open'
        );


        overlay.classList.add(
            'show'
        );


        document.body.style.overflow =
            'hidden';

    }


    /* =====================================================
       CLOSE SIDEBAR
    ====================================================== */

    function closeSidebar() {

        if (
            !sidebar ||
            !overlay
        ) {

            return;

        }


        sidebar.classList.remove(
            'open'
        );


        overlay.classList.remove(
            'show'
        );


        document.body.style.overflow =
            '';

    }


    /* =====================================================
       HAMBURGER
    ====================================================== */

    if (hamburger) {

        hamburger.addEventListener(
            'click',
            function () {

                if (
                    sidebar &&
                    sidebar.classList.contains(
                        'open'
                    )
                ) {

                    closeSidebar();

                } else {

                    openSidebar();

                }

            }
        );

    }


    /* =====================================================
       OVERLAY
    ====================================================== */

    if (overlay) {

        overlay.addEventListener(
            'click',
            function () {

                closeSidebar();

            }
        );

    }


    /* =====================================================
       MOBILE MENU
       
       Hanya menutup sidebar.
       TIDAK menggunakan preventDefault().
       Jadi href tetap berjalan normal.
    ====================================================== */

    document
        .querySelectorAll(
            '[data-sidebar-link]'
        )
        .forEach(
            function (link) {

                link.addEventListener(
                    'click',
                    function () {

                        if (
                            window.innerWidth <= 900
                        ) {

                            closeSidebar();

                        }

                    }
                );

            }
        );


    /* =====================================================
       ESC
    ====================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === 'Escape'
            ) {

                closeSidebar();

            }

        }
    );


    /* =====================================================
       LOGOUT CONFIRMATION
    ====================================================== */

    const adminLogoutButton =
        document.getElementById(
            'adminLogoutButton'
        );


    const adminLogoutForm =
        document.getElementById(
            'adminLogoutForm'
        );


    if (
        adminLogoutButton &&
        adminLogoutForm
    ) {

        adminLogoutButton.addEventListener(
            'click',
            function () {

                const confirmed =
                    confirm(
                        'Apakah kamu yakin ingin keluar dari akun admin?'
                    );


                if (confirmed) {

                    adminLogoutForm.submit();

                }

            }
        );

    }

</script>


</body>

</html>