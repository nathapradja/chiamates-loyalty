<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
{{ $title ?? 'CHIAMATES' }}
</title>

<style>

:root {
    --green: #78B82A;
    --green-dark: #5C941D;
    --green-light: #F2F8E8;

    --text: #26351D;
    --muted: #747C6E;

    --white: #FFFFFF;
    --bg: #F7FAF4;

    --border: #E3EBD9;

    --danger: #E53935;

    --sidebar-width: 245px;
    --sidebar-collapsed: 76px;
}


* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


html {
    scroll-behavior: smooth;
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
    color: inherit;
    text-decoration: none;
}


button {
    font-family: inherit;
}


/* =====================================================
    APP
===================================================== */

.member-app {
    min-height: 100vh;
}


/* =====================================================
    SIDEBAR
===================================================== */

.member-sidebar {
    position: fixed;

    top: 0;
    left: 0;
    bottom: 0;

    width: var(--sidebar-width);

    padding: 22px 14px;

    background: var(--white);

    border-right:
        1px solid var(--border);

    display: flex;

    flex-direction: column;

    z-index: 1000;

    transition:
        width 0.25s ease,
        transform 0.25s ease;
}


.member-app.sidebar-collapsed
.member-sidebar {
    width: var(--sidebar-collapsed);
}


/* =====================================================
    LOGO
===================================================== */

.member-logo {
    width: 100%;
    height: 90px;

    padding:
            8px 12px;

    margin-bottom: 18px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-bottom:
        1px solid var(--border);
}


.member-logo img {
    width: 125px;

    max-width: 100%;

    height: 72px;

    display: block;

    object-fit: contain;
    object-position: center;
}


.member-logo-text {
    color: var(--green);

    font-size: 22px;

    font-weight: 800;

    white-space: nowrap;
}

.member-app.sidebar-collapsed
.member-logo {
    height: 70px;
    padding: 8px;
}


.member-app.sidebar-collapsed
.member-logo img {
    height: 45px;
    width: 45px;

    object-fit: contain;
}


.member-app.sidebar-collapsed
.member-logo-text {
    color: var(--green);
    font-weight: 800;
    font-size: 20px;

    white-space: nowrap;
}


.member-app.sidebar-collapsed
.member-logo-text::first-letter {
    font-size: 22px;
}


/* =====================================================
    USER
===================================================== */

.member-user {
    display: flex;

    align-items: center;

    gap: 10px;

    padding:
        0 8px 18px;

    overflow: hidden;
}


.member-avatar {
    width: 40px;

    height: 40px;

    flex: 0 0 40px;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            var(--green),
            var(--green-dark)
        );

    color: var(--white);

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 14px;

    font-weight: 800;
}


.member-user-info {
    min-width: 0;

    overflow: hidden;

    white-space: nowrap;

    transition:
        opacity 0.15s ease;
}


.member-user-name {
    overflow: hidden;

    text-overflow: ellipsis;

    font-size: 11px;

    font-weight: 800;
}


.member-user-role {
    margin-top: 3px;

    color: var(--muted);

    font-size: 9px;
}


.member-app.sidebar-collapsed
.member-user {
    justify-content: center;

    padding-left: 0;

    padding-right: 0;
}


.member-app.sidebar-collapsed
.member-user-info {
    width: 0;

    opacity: 0;
}


/* =====================================================
    MENU LABEL
===================================================== */

.member-menu-label {
    padding:
        0 10px 8px;

    color: #A0A79A;

    font-size: 8px;

    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: 0.7px;

    white-space: nowrap;

    overflow: hidden;
}


.member-app.sidebar-collapsed
.member-menu-label {
    text-align: center;

    font-size: 0;

    height: 10px;
}


/* =====================================================
    MENU
===================================================== */

.member-menu {
    display: flex;

    flex-direction: column;

    gap: 4px;
}


.member-menu-link {
    min-height: 43px;

    padding:
        9px 11px;

    border-radius: 10px;

    display: flex;

    align-items: center;

    gap: 11px;

    color: var(--muted);

    font-size: 11px;

    font-weight: 700;

    white-space: nowrap;

    transition:
        background 0.2s ease,
        color 0.2s ease;
}


.member-menu-link:hover {
    color: var(--green-dark);

    background:
        var(--green-light);
}


.member-menu-link.active {
    color: var(--green-dark);

    background:
        var(--green-light);
}


.member-menu-icon {
    width: 24px;

    height: 24px;

    flex: 0 0 24px;

    border-radius: 7px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 10px;

    font-weight: 800;

    background: #F3F5F0;

    color: var(--muted);
}


.member-menu-link.active
.member-menu-icon {
    background: var(--green);

    color: var(--white);
}


.member-menu-text {
    overflow: hidden;

    transition:
        opacity 0.15s ease;
}


.member-app.sidebar-collapsed
.member-menu-link {
    justify-content: center;

    padding-left: 0;

    padding-right: 0;
}


.member-app.sidebar-collapsed
.member-menu-text {
    width: 0;

    opacity: 0;
}


/* =====================================================
    LOGOUT
===================================================== */

.member-sidebar-bottom {
    margin-top: auto;

    padding-top: 15px;

    border-top:
        1px solid var(--border);
}


.member-logout {
    width: 100%;

    min-height: 43px;

    padding:
        9px 11px;

    border: 0;

    border-radius: 10px;

    background: transparent;

    color: var(--muted);

    display: flex;

    align-items: center;

    gap: 11px;

    cursor: pointer;

    font-size: 11px;

    font-weight: 700;

    text-align: left;

    white-space: nowrap;

    transition:
        background 0.2s ease,
        color 0.2s ease;
}


.member-logout:hover {
    color: var(--danger);

    background: #FFF2F1;
}


.member-logout-icon {
    width: 24px;

    height: 24px;

    flex: 0 0 24px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 14px;
}


.member-logout-text {
    transition:
        opacity 0.15s ease;
}


.member-app.sidebar-collapsed
.member-logout {
    justify-content: center;

    padding-left: 0;

    padding-right: 0;
}


.member-app.sidebar-collapsed
.member-logout-text {
    width: 0;

    opacity: 0;
}

/* =====================================================
    LOGOUT BUTTON
===================================================== */

.logout-button {
    width: 100%;

    min-height: 43px;

    padding: 9px 11px;

    border: 0;

    border-radius: 10px;

    background: transparent;

    color: var(--muted);

    display: flex;

    align-items: center;

    gap: 11px;

    cursor: pointer;

    font-family: inherit;

    font-size: 11px;

    font-weight: 700;

    text-align: left;

    white-space: nowrap;

    transition:
        background 0.2s ease,
        color 0.2s ease;
}


.logout-button:hover {
    color: var(--danger);

    background: #FFF2F1;
}


.logout-button .member-menu-icon {
    flex: 0 0 24px;
}


.logout-button .member-menu-text {
    transition:
        opacity 0.15s ease;
}


.member-app.sidebar-collapsed
.logout-button {
    justify-content: center;

    padding-left: 0;

    padding-right: 0;
}


.member-app.sidebar-collapsed
.logout-button .member-menu-text {
    width: 0;

    opacity: 0;
}


/* =====================================================
    LOGOUT MODAL
===================================================== */

.logout-modal {
    position: fixed;

    inset: 0;

    z-index: 9999;

    display: none;

    align-items: center;

    justify-content: center;

    padding: 20px;
}


.logout-modal.show {
    display: flex;
}


.logout-modal-overlay {
    position: absolute;

    inset: 0;

    background:
        rgba(25, 35, 20, 0.42);

    backdrop-filter: blur(4px);
}


.logout-modal-card {
    position: relative;

    width: min(390px, 100%);

    padding: 27px;

    background: var(--white);

    border:
        1px solid var(--border);

    border-radius: 20px;

    box-shadow:
        0 25px 70px
        rgba(0, 0, 0, 0.18);

    text-align: center;

    animation:
        logoutModalIn 0.18s ease-out;
}


@keyframes logoutModalIn {

    from {
        opacity: 0;

        transform:
            translateY(10px)
            scale(0.97);
    }


    to {
        opacity: 1;

        transform:
            translateY(0)
            scale(1);
    }

}


.logout-modal-icon {
    width: 52px;

    height: 52px;

    margin:
        0 auto 15px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 14px;

    background: #FFF3F3;

    color: #B64C4C;

    font-size: 19px;

    font-weight: 800;
}


.logout-modal-card h3 {
    margin-bottom: 8px;

    color: var(--text);

    font-size: 17px;

    font-weight: 800;
}


.logout-modal-card p {
    margin: 0 auto;

    max-width: 290px;

    color: var(--muted);

    font-size: 10px;

    line-height: 1.7;
}


.logout-modal-actions {
    margin-top: 23px;

    display: grid;

    grid-template-columns:
        1fr 1fr;

    gap: 10px;
}


.logout-cancel-button,
.logout-confirm-button {
    min-height: 42px;

    border-radius: 10px;

    font-family: inherit;

    font-size: 10px;

    font-weight: 800;

    cursor: pointer;

    transition:
        0.2s ease;
}


.logout-cancel-button {
    border:
        1px solid var(--border);

    background: var(--white);

    color: var(--muted);
}


.logout-cancel-button:hover {
    border-color: var(--green);

    color: var(--green-dark);
}


.logout-confirm-button {
    border: 0;

    background: #B64C4C;

    color: var(--white);
}


.logout-confirm-button:hover {
    background: #9E3F3F;

    transform:
        translateY(-1px);
}


@media (max-width: 420px) {

    .logout-modal-card {
        padding:
            23px 18px;
    }


    .logout-modal-actions {
        grid-template-columns: 1fr;
    }

}

/* =====================================================
    CONTENT
===================================================== */

.member-content {
    min-height: 100vh;

    margin-left: var(--sidebar-width);

    transition:
        margin-left 0.25s ease;
}


.member-app.sidebar-collapsed
.member-content {
    margin-left: var(--sidebar-collapsed);
}


/* =====================================================
    TOPBAR
===================================================== */

.member-topbar {
    min-height: 70px;

    padding:
        0 28px;

    background: var(--white);

    border-bottom:
        1px solid var(--border);

    display: flex;

    align-items: center;

    gap: 14px;

    position: sticky;

    top: 0;

    z-index: 500;
}


.sidebar-toggle {
    width: 40px;

    height: 40px;

    flex: 0 0 40px;

    border:
        1px solid var(--border);

    border-radius: 9px;

    background: var(--white);

    color: var(--green-dark);

    display: flex;

    align-items: center;

    justify-content: center;

    cursor: pointer;

    font-size: 18px;

    line-height: 1;
}


.sidebar-toggle:hover {
    background:
        var(--green-light);
}


.topbar-title {
    font-size: 13px;

    font-weight: 800;
}


.topbar-subtitle {
    margin-top: 3px;

    color: var(--muted);

    font-size: 9px;
}



/* =====================================================
    PAGE
===================================================== */

.member-page {
    width: 100%;

    max-width: 1180px;

    margin: 0 auto;

    padding:
        32px 28px 55px;
}


/* =====================================================
    FOOTER
===================================================== */

.member-footer {
    padding:
        20px 25px;

    border-top:
        1px solid var(--border);

    background: var(--white);

    color: var(--muted);

    text-align: center;

    font-size: 10px;
}


/* =====================================================
    OVERLAY
===================================================== */

.member-overlay {
    display: none;

    position: fixed;

    inset: 0;

    background:
        rgba(26, 38, 20, 0.32);

    z-index: 900;
}


/* =====================================================
    TABLET
===================================================== */

@media (max-width: 800px) {

    .member-sidebar {
        width: 245px;

        transform:
            translateX(-100%);
    }


    .member-app.sidebar-open
    .member-sidebar {
        transform:
            translateX(0);
    }


    .member-content {
        margin-left: 0 !important;
    }


    .member-overlay {
        display: none;
    }


    .member-app.sidebar-open
    .member-overlay {
        display: block;
    }


    .member-page {
        padding:
            26px 20px 45px;
    }


    .member-topbar {
        padding:
            0 20px;
    }


    .member-app.sidebar-collapsed
    .member-sidebar {
        width: 245px;
    }


    .member-app.sidebar-collapsed
    .member-logo img {
        width: 145px;
    }


    .member-app.sidebar-collapsed
    .member-logo-text {
        font-size: 22px;
    }


    .member-app.sidebar-collapsed
    .member-user {
        justify-content: flex-start;

        padding-left: 8px;

        padding-right: 8px;
    }


    .member-app.sidebar-collapsed
    .member-user-info {
        width: auto;

        opacity: 1;
    }


    .member-app.sidebar-collapsed
    .member-menu-link {
        justify-content: flex-start;

        padding-left: 11px;

        padding-right: 11px;
    }


    .member-app.sidebar-collapsed
    .member-menu-text {
        width: auto;

        opacity: 1;
    }


    .member-app.sidebar-collapsed
    .member-logout {
        justify-content: flex-start;

        padding-left: 11px;

        padding-right: 11px;
    }


    .member-app.sidebar-collapsed
    .member-logout-text {
        width: auto;

        opacity: 1;
    }

}


/* =====================================================
    MOBILE
===================================================== */

@media (max-width: 520px) {

    .member-topbar {
        min-height: 64px;

        padding:
            0 15px;
    }


    .member-page {
        padding:
            22px 15px 40px;
    }


    .topbar-title {
        font-size: 12px;
    }


    .topbar-subtitle {
        font-size: 8px;
    }

}

</style>

@stack('styles')

</head>


<body>


<div
class="member-app"
id="memberApp"
>


{{-- =====================================================
        SIDEBAR
====================================================== --}}

<aside
    class="member-sidebar"
    id="memberSidebar"
>


    {{-- LOGO --}}

    <a
        href="{{ route('member.dashboard') }}"
        class="member-logo"
    >

        @if (file_exists(public_path('images/chiamates-logo.png.jpeg')))

            <img
                src="{{ asset('images/chiamates-logo.png.jpeg') }}"
            >

        @else

            <span class="member-logo-text">
                CHIAMATES
            </span>

        @endif

    </a>



    {{-- USER --}}

    <div class="member-user">


        <div class="member-avatar">

            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

        </div>


        <div class="member-user-info">

            <div class="member-user-name">

                {{ auth()->user()->name }}

            </div>


            <div class="member-user-role">
                Member CHIAMATES
            </div>

        </div>


    </div>



    {{-- MENU --}}

    <div class="member-menu-label">
        Menu Utama
    </div>


    <nav class="member-menu">


        <a
            href="{{ route('member.dashboard') }}"
            class="member-menu-link {{ request()->routeIs('member.dashboard') ? 'active' : '' }}"
            title="Beranda"
        >

            <span class="member-menu-icon">
                H
            </span>

            <span class="member-menu-text">
                Beranda
            </span>

        </a>



        <a
            href="{{ route('member.card') }}"
            class="member-menu-link {{ request()->routeIs('member.card*') ? 'active' : '' }}"
            title="Kartu Member"
        >

            <span class="member-menu-icon">
                K
            </span>

            <span class="member-menu-text">
                Kartu Member
            </span>

        </a>



        <a
            href="{{ route('member.points.history') }}"
            class="member-menu-link {{ request()->routeIs('member.points.history*') ? 'active' : '' }}"
            title="Riwayat Poin"
        >

            <span class="member-menu-icon">
                P
            </span>

            <span class="member-menu-text">
                Riwayat Poin
            </span>

        </a>



        <a
            href="{{ route('member.rewards') }}"
            class="member-menu-link {{ request()->routeIs('member.rewards*') ? 'active' : '' }}"
            title="Reward"
        >

            <span class="member-menu-icon">
                R
            </span>

            <span class="member-menu-text">
                Reward
            </span>

        </a>

        <a
            href="{{ route('member.redeem.history') }}"
            class="member-menu-link {{ request()->routeIs('member.redeem.history*') ? 'active' : '' }}"
            title="Riwayat Redeem"
        >
            <span class="member-menu-icon">
                R
            </span>

            <span class="member-menu-text">
                Riwayat Redeem
            </span>
        </a>



        <a
            href="{{ route('member.profile') }}"
            class="member-menu-link {{ request()->routeIs('member.profile*') ? 'active' : '' }}"
            title="Profil"
        >

            <span class="member-menu-icon">
                U
            </span>

            <span class="member-menu-text">
                Profil
            </span>

        </a>


    </nav>



    {{-- LOGOUT --}}

    <div class="member-sidebar-bottom">


        <form
            method="POST"
            action="{{ route('logout') }}"
            class="logout-form"
            id="logoutForm"
        >
            @csrf

            <button
                type="button"
                class="logout-button"
                onclick="openLogoutModal()"
            >
                <span class="member-menu-icon">
                    ↪
                </span>

                <span class="member-menu-text">
                    Keluar
                </span>
            </button>
        </form>


    </div>


</aside>



{{-- OVERLAY --}}

<div
    class="member-overlay"
    id="memberOverlay"
    onclick="closeMemberSidebar()"
></div>



{{-- =====================================================
        CONTENT
====================================================== --}}

<div class="member-content">


    {{-- TOPBAR --}}

    <header class="member-topbar">


        <button
            type="button"
            class="sidebar-toggle"
            id="sidebarToggle"
            onclick="toggleMemberSidebar()"
            aria-label="Buka atau kecilkan sidebar"
            title="Menu"
        >
            ☰
        </button>


        <div>

            <div class="topbar-title">
                CHIAMATES
            </div>


            <div class="topbar-subtitle">
                Member Area
            </div>

        </div>


    </header>



    {{-- PAGE CONTENT --}}

    <main class="member-page">

        @yield('content')

    </main>



    {{-- FOOTER --}}

    <footer class="member-footer">

        CHIAMATES Loyalty System

    </footer>


</div>


</div>



<script>

const memberApp =
    document.getElementById('memberApp');

const sidebar =
    document.getElementById('memberSidebar');


function isMobile() {

    return window.innerWidth <= 800;

}


function toggleMemberSidebar() {

    if (isMobile()) {

        memberApp.classList.toggle(
            'sidebar-open'
        );

        return;
    }


    memberApp.classList.toggle(
        'sidebar-collapsed'
    );

}


function closeMemberSidebar() {

    if (isMobile()) {

        memberApp.classList.remove(
            'sidebar-open'
        );

    }

}


window.addEventListener(
    'resize',
    function () {

        if (!isMobile()) {

            memberApp.classList.remove(
                'sidebar-open'
            );

        }

    }
);


document.addEventListener(
    'keydown',
    function (event) {

        if (
            event.key === 'Escape' &&
            isMobile()
        ) {

            closeMemberSidebar();

        }

    }
);

</script>

<script>

function openLogoutModal() {
    const modal = document.getElementById('logoutModal');

    if (!modal) {
        return;
    }

    modal.classList.add('show');

    modal.setAttribute(
        'aria-hidden',
        'false'
    );

    document.body.style.overflow = 'hidden';
}


function closeLogoutModal() {
    const modal = document.getElementById('logoutModal');

    if (!modal) {
        return;
    }

    modal.classList.remove('show');

    modal.setAttribute(
        'aria-hidden',
        'true'
    );

    document.body.style.overflow = '';
}


function confirmLogout() {
    const form = document.getElementById('logoutForm');

    if (form) {
        form.submit();
    }
}


document.addEventListener(
    'keydown',
    function (event) {
        if (event.key === 'Escape') {
            closeLogoutModal();
        }
    }
);


</script>

{{-- =====================================================
    LOGOUT CONFIRMATION MODAL
====================================================== --}}

<div
    id="logoutModal"
    class="logout-modal"
    aria-hidden="true"
>
    <div
        class="logout-modal-overlay"
        onclick="closeLogoutModal()"
    ></div>

    <div
        class="logout-modal-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="logoutModalTitle"
    >
        <div class="logout-modal-icon">
            ↪
        </div>

        <h3 id="logoutModalTitle">
            Keluar dari akun?
        </h3>

        <p>
            Apakah kamu yakin ingin keluar dari
            akun CHIAMATES?
        </p>

        <div class="logout-modal-actions">
            <button
                type="button"
                class="logout-cancel-button"
                onclick="closeLogoutModal()"
            >
                Batal
            </button>

            <button
                type="button"
                class="logout-confirm-button"
                onclick="confirmLogout()"
            >
                Ya, Keluar
            </button>
        </div>
    </div>
</div>


@stack('scripts')

</body>

</html>
