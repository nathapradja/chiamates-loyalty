@extends('kasir.layouts.app')

@section('title', 'Profil Kasir')

@section('content')

<style>
    .profile-page {
        width: 100%;
        max-width: 1050px;
        margin: 0 auto;
    }

    .page-header {
        margin-bottom: 26px;
    }

    .page-header h1 {
        margin: 0 0 7px;
        color: #18351c;
        font-size: 30px;
        font-weight: 800;
    }

    .page-header p {
        margin: 0;
        color: #718071;
        font-size: 14px;
        line-height: 1.6;
    }

    .profile-grid {
        display: grid;
        grid-template-columns: 300px minmax(0, 1fr);
        gap: 22px;
        align-items: start;
    }

    .card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e1eadb;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(52, 91, 31, .06);
    }

    /* =========================================================
       PROFILE SUMMARY
    ========================================================= */

    .profile-summary {
        padding: 28px 22px;
        text-align: center;
    }

    .avatar {
        width: 88px;
        height: 88px;
        margin: 0 auto 17px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 24px;
        background: #65ad20;
        color: #fff;
        font-size: 32px;
        font-weight: 800;
        box-shadow: 0 8px 20px rgba(101, 173, 32, .18);
    }

    .profile-name {
        margin: 0 0 5px;
        color: #29422d;
        font-size: 18px;
        font-weight: 800;
        word-break: break-word;
    }

    .profile-role {
        margin: 0;
        color: #718071;
        font-size: 11px;
    }

    .profile-divider {
        height: 1px;
        margin: 22px 0;
        background: #e8eee5;
    }

    .profile-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 11px;
        border-radius: 20px;
        background: #eaf6df;
        color: #579719;
        font-size: 10px;
        font-weight: 800;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #65ad20;
    }

    .summary-info {
        margin-top: 20px;
        text-align: left;
    }

    .summary-item {
        padding: 11px 0;
        border-bottom: 1px solid #edf1eb;
    }

    .summary-item:last-child {
        border-bottom: 0;
    }

    .summary-label {
        margin-bottom: 4px;
        color: #929c91;
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .summary-value {
        color: #354636;
        font-size: 12px;
        font-weight: 700;
        word-break: break-word;
    }

    /* =========================================================
       FORM CARD
    ========================================================= */

    .card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #e7eee3;
    }

    .card-header h2 {
        margin: 0 0 5px;
        color: #29422d;
        font-size: 17px;
        font-weight: 800;
    }

    .card-header p {
        margin: 0;
        color: #879287;
        font-size: 12px;
    }

    .card-body {
        padding: 24px;
    }

    .form-section {
        margin-bottom: 26px;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .section-title {
        margin: 0 0 14px;
        color: #354636;
        font-size: 12px;
        font-weight: 800;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 17px;
    }

    .form-group {
        min-width: 0;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #354636;
        font-size: 11px;
        font-weight: 800;
    }

    .form-input {
        width: 100%;
        height: 45px;
        padding: 0 13px;
        box-sizing: border-box;
        border: 1px solid #dbe5d8;
        border-radius: 10px;
        outline: none;
        background: #fff;
        color: #304532;
        font-size: 12px;
        transition: .2s ease;
    }

    .form-input:focus {
        border-color: #72b52c;
        box-shadow: 0 0 0 3px rgba(114,181,44,.10);
    }

    .form-input:disabled {
        background: #f7f9f6;
        color: #8a9588;
        cursor: not-allowed;
    }

    .form-help {
        margin-top: 6px;
        color: #929c91;
        font-size: 9px;
        line-height: 1.5;
    }

    /* =========================================================
       PASSWORD
    ========================================================= */

    .password-box {
        position: relative;
    }

    .password-box .form-input {
        padding-right: 70px;
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        border: 0;
        background: transparent;
        color: #579719;
        font-size: 10px;
        font-weight: 800;
        cursor: pointer;
    }

    /* =========================================================
       ACTION
    ========================================================= */

    .action-row {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #e8eee5;
    }

    .button {
        min-height: 44px;
        padding: 0 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-size: 11px;
        font-weight: 800;
        text-decoration: none;
        box-sizing: border-box;
        cursor: pointer;
        transition: .2s ease;
    }

    .button-secondary {
        border: 1px solid #dce7d8;
        background: #fff;
        color: #527d1d;
    }

    .button-secondary:hover {
        background: #f6f9f4;
    }

    .button-primary {
        border: 0;
        background: #65ad20;
        color: #fff;
        box-shadow: 0 7px 16px rgba(101,173,32,.14);
    }

    .button-primary:hover {
        background: #579719;
        transform: translateY(-1px);
    }

    /* =========================================================
       ALERT
    ========================================================= */

    .alert {
        display: none;
        margin-bottom: 20px;
        padding: 13px 15px;
        border-radius: 11px;
        font-size: 11px;
        line-height: 1.5;
    }

    .alert.success {
        background: #eaf6df;
        border: 1px solid #d4e8c6;
        color: #579719;
    }

    .alert.error {
        background: #fbeaea;
        border: 1px solid #efd2d2;
        color: #a84f4f;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 850px) {

        .profile-grid {
            grid-template-columns: 1fr;
        }

        .profile-summary {
            text-align: left;
        }

        .avatar {
            margin-left: 0;
        }

        .profile-divider {
            margin: 18px 0;
        }

    }

    @media (max-width: 600px) {

        .page-header h1 {
            font-size: 25px;
        }

        .card-body {
            padding: 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .action-row {
            flex-direction: column-reverse;
        }

        .button {
            width: 100%;
        }

    }
</style>


<div class="profile-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="page-header">

        <h1>
            Profil Kasir
        </h1>

        <p>
            Kelola informasi akun dan data profil kasir.
        </p>

    </div>


    <div class="profile-grid">


        {{-- =====================================================
             PROFILE SUMMARY
        ====================================================== --}}

        <div class="card">

            <div class="profile-summary">

                <div
                    class="avatar"
                    id="profileAvatar"
                >
                    K
                </div>


                <h2
                    class="profile-name"
                    id="summaryName"
                >
                    {{ auth()->user()->name ?? 'Kasir' }}
                </h2>


                <p class="profile-role">
                    Kasir
                </p>


                <div class="profile-divider"></div>


                <div class="profile-status">

                    <span class="status-dot"></span>

                    Aktif

                </div>


                <div class="summary-info">

                    <div class="summary-item">

                        <div class="summary-label">
                            Nama Lengkap
                        </div>

                        <div
                            class="summary-value"
                            id="summaryFullName"
                        >
                            {{ auth()->user()->name ?? '-' }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-label">
                            Email
                        </div>

                        <div
                            class="summary-value"
                            id="summaryEmail"
                        >
                            {{ auth()->user()->email ?? '-' }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-label">
                            Nomor Telepon
                        </div>

                        <div
                            class="summary-value"
                            id="summaryPhone"
                        >
                            {{ auth()->user()->phone ?? '-' }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-label">
                            Role
                        </div>

                        <div class="summary-value">
                            Kasir
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             EDIT PROFILE
        ====================================================== --}}

        <div class="card">

            <div class="card-header">

                <h2>
                    Informasi Profil
                </h2>

                <p>
                    Perbarui informasi pribadi akun kasir.
                </p>

            </div>


            <div class="card-body">


                <div
                    class="alert success"
                    id="successAlert"
                >
                    Profil berhasil diperbarui.
                </div>


                <div
                    class="alert error"
                    id="errorAlert"
                >
                    Silakan periksa kembali data yang dimasukkan.
                </div>


                {{-- =================================================
                     DATA DIRI
                ================================================== --}}

                <div class="form-section">

                    <p class="section-title">
                        Data Diri
                    </p>


                    <div class="form-grid">

                        <div class="form-group full">

                            <label
                                for="name"
                                class="form-label"
                            >
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                id="name"
                                class="form-input"
                                value="{{ auth()->user()->name ?? '' }}"
                                placeholder="Masukkan nama lengkap"
                            >

                        </div>


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
                                class="form-input"
                                value="{{ auth()->user()->email ?? '' }}"
                                placeholder="Masukkan email"
                            >

                        </div>


                        <div class="form-group">

                            <label
                                for="phone"
                                class="form-label"
                            >
                                Nomor Telepon
                            </label>

                            <input
                                type="text"
                                id="phone"
                                class="form-input"
                                value="{{ auth()->user()->phone ?? '' }}"
                                placeholder="Masukkan nomor telepon"
                            >

                        </div>


                        <div class="form-group full">

                            <label
                                for="username"
                                class="form-label"
                            >
                                Username
                            </label>

                            <input
                                type="text"
                                id="username"
                                class="form-input"
                                value="{{ auth()->user()->username ?? '' }}"
                                disabled
                            >

                            <div class="form-help">
                                Username digunakan untuk login dan tidak dapat diubah dari halaman ini.
                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     PASSWORD
                ================================================== --}}

                <div class="form-section">

                    <p class="section-title">
                        Ubah Password
                    </p>


                    <div class="form-grid">

                        <div class="form-group">

                            <label
                                for="currentPassword"
                                class="form-label"
                            >
                                Password Saat Ini
                            </label>

                            <div class="password-box">

                                <input
                                    type="password"
                                    id="currentPassword"
                                    class="form-input"
                                    placeholder="Password saat ini"
                                >

                                <button
                                    type="button"
                                    class="toggle-password"
                                    data-target="currentPassword"
                                >
                                    Lihat
                                </button>

                            </div>

                        </div>


                        <div class="form-group">

                            <label
                                for="newPassword"
                                class="form-label"
                            >
                                Password Baru
                            </label>

                            <div class="password-box">

                                <input
                                    type="password"
                                    id="newPassword"
                                    class="form-input"
                                    placeholder="Password baru"
                                >

                                <button
                                    type="button"
                                    class="toggle-password"
                                    data-target="newPassword"
                                >
                                    Lihat
                                </button>

                            </div>

                        </div>


                        <div class="form-group full">

                            <label
                                for="confirmPassword"
                                class="form-label"
                            >
                                Konfirmasi Password Baru
                            </label>

                            <div class="password-box">

                                <input
                                    type="password"
                                    id="confirmPassword"
                                    class="form-input"
                                    placeholder="Ulangi password baru"
                                >

                                <button
                                    type="button"
                                    class="toggle-password"
                                    data-target="confirmPassword"
                                >
                                    Lihat
                                </button>

                            </div>

                            <div class="form-help">
                                Kosongkan bagian password jika tidak ingin mengganti password.
                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     ACTION
                ================================================== --}}

                <div class="action-row">

                    <a
                        href="{{ route('kasir.dashboard') }}"
                        class="button button-secondary"
                    >
                        Batal
                    </a>


                    <button
                        type="button"
                        class="button button-primary"
                        id="saveProfileButton"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | ELEMENT
    |--------------------------------------------------------------------------
    */

    const nameInput =
        document.getElementById('name');

    const emailInput =
        document.getElementById('email');

    const phoneInput =
        document.getElementById('phone');

    const currentPasswordInput =
        document.getElementById('currentPassword');

    const newPasswordInput =
        document.getElementById('newPassword');

    const confirmPasswordInput =
        document.getElementById('confirmPassword');

    const saveButton =
        document.getElementById('saveProfileButton');


    /*
    |--------------------------------------------------------------------------
    | UPDATE AVATAR
    |--------------------------------------------------------------------------
    */

    function updateAvatar() {

        const name =
            nameInput.value.trim();


        document.getElementById(
            'profileAvatar'
        ).textContent =
            name
                ? name.charAt(0).toUpperCase()
                : 'K';

    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE SUMMARY
    |--------------------------------------------------------------------------
    */

    function updateSummary() {

        const name =
            nameInput.value.trim();


        const email =
            emailInput.value.trim();


        const phone =
            phoneInput.value.trim();


        document.getElementById(
            'summaryName'
        ).textContent =
            name || 'Kasir';


        document.getElementById(
            'summaryFullName'
        ).textContent =
            name || '-';


        document.getElementById(
            'summaryEmail'
        ).textContent =
            email || '-';


        document.getElementById(
            'summaryPhone'
        ).textContent =
            phone || '-';


        updateAvatar();

    }


    /*
    |--------------------------------------------------------------------------
    | PASSWORD TOGGLE
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll(
        '.toggle-password'
    ).forEach(
        function(button) {

            button.addEventListener(
                'click',
                function() {

                    const targetId =
                        this.dataset.target;


                    const input =
                        document.getElementById(
                            targetId
                        );


                    if (
                        input.type ===
                        'password'
                    ) {

                        input.type =
                            'text';

                        this.textContent =
                            'Sembunyikan';

                    } else {

                        input.type =
                            'password';

                        this.textContent =
                            'Lihat';

                    }

                }
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | SAVE
    |--------------------------------------------------------------------------
    */

    saveButton.addEventListener(
        'click',
        function() {

            const name =
                nameInput.value.trim();


            const email =
                emailInput.value.trim();


            const phone =
                phoneInput.value.trim();


            const currentPassword =
                currentPasswordInput.value;


            const newPassword =
                newPasswordInput.value;


            const confirmPassword =
                confirmPasswordInput.value;


            const successAlert =
                document.getElementById(
                    'successAlert'
                );


            const errorAlert =
                document.getElementById(
                    'errorAlert'
                );


            successAlert.style.display =
                'none';


            errorAlert.style.display =
                'none';


            /*
            |--------------------------------------------------------------------------
            | VALIDASI
            |--------------------------------------------------------------------------
            */

            if (!name) {

                errorAlert.textContent =
                    'Nama lengkap wajib diisi.';

                errorAlert.style.display =
                    'block';

                nameInput.focus();

                return;

            }


            if (!email) {

                errorAlert.textContent =
                    'Email wajib diisi.';

                errorAlert.style.display =
                    'block';

                emailInput.focus();

                return;

            }


            if (
                newPassword ||
                confirmPassword ||
                currentPassword
            ) {

                if (!currentPassword) {

                    errorAlert.textContent =
                        'Masukkan password saat ini untuk mengganti password.';

                    errorAlert.style.display =
                        'block';

                    currentPasswordInput.focus();

                    return;

                }


                if (
                    newPassword.length < 8
                ) {

                    errorAlert.textContent =
                        'Password baru minimal 8 karakter.';

                    errorAlert.style.display =
                        'block';

                    newPasswordInput.focus();

                    return;

                }


                if (
                    newPassword !==
                    confirmPassword
                ) {

                    errorAlert.textContent =
                        'Konfirmasi password baru tidak cocok.';

                    errorAlert.style.display =
                        'block';

                    confirmPasswordInput.focus();

                    return;

                }

            }


            /*
            |--------------------------------------------------------------------------
            | FRONTEND PREVIEW
            |--------------------------------------------------------------------------
            |
            | Bagian ini sementara memperbarui tampilan.
            | Untuk penyimpanan permanen, sambungkan ke controller Laravel.
            |
            */

            updateSummary();


            successAlert.textContent =
                'Profil berhasil diperbarui.';


            successAlert.style.display =
                'block';


            /*
            |--------------------------------------------------------------------------
            | RESET PASSWORD FIELD
            |--------------------------------------------------------------------------
            */

            currentPasswordInput.value =
                '';

            newPasswordInput.value =
                '';

            confirmPasswordInput.value =
                '';


            /*
            |--------------------------------------------------------------------------
            | SCROLL KE ALERT
            |--------------------------------------------------------------------------
            */

            successAlert.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });

        }
    );


    /*
    |--------------------------------------------------------------------------
    | LIVE PREVIEW
    |--------------------------------------------------------------------------
    */

    nameInput.addEventListener(
        'input',
        updateSummary
    );


    emailInput.addEventListener(
        'input',
        updateSummary
    );


    phoneInput.addEventListener(
        'input',
        updateSummary
    );

</script>

@endsection