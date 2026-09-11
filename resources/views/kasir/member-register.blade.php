@extends('kasir.layouts.app')

@section('title', 'Registrasi Member')

@section('content')

<style>
    .register-page {
        width: 100%;
    }

    /* =========================================================
       HEADER HALAMAN
    ========================================================= */

    .page-heading {
        margin-bottom: 26px;
    }

    .page-heading h1 {
        font-size: 28px;
        line-height: 1.3;
        color: var(--green-dark);
        font-weight: 800;
        margin-bottom: 7px;
    }

    .page-heading p {
        font-size: 14px;
        color: var(--text-light);
        line-height: 1.6;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .register-card {
        width: 100%;
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 20px;
        box-shadow: var(--shadow);
        overflow: hidden;
    }


    /* =========================================================
       CARD HEADER
    ========================================================= */

    .register-card-header {
        padding: 23px 28px;

        display: flex;
        align-items: center;
        gap: 15px;

        border-bottom: 1px solid var(--border);
        background: #ffffff;
    }

    .register-card-icon {
        width: 48px;
        height: 48px;
        min-width: 48px;

        border-radius: 14px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--green-light);
        color: var(--green-dark);

        font-size: 19px;
        font-weight: 800;
    }

    .register-card-title h2 {
        font-size: 18px;
        color: var(--text-dark);
        font-weight: 800;
        margin-bottom: 4px;
    }

    .register-card-title p {
        font-size: 13px;
        color: var(--text-light);
    }


    /* =========================================================
       FORM
    ========================================================= */

    .register-form {
        padding: 30px 28px;
    }

    .form-section {
        margin-bottom: 30px;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .form-section-title {
        font-size: 15px;
        color: var(--green-dark);
        font-weight: 800;

        padding-bottom: 12px;
        margin-bottom: 20px;

        border-bottom: 1px solid var(--border);
    }


    /* =========================================================
       GRID
    ========================================================= */

    .form-grid {
        display: grid;

        grid-template-columns: repeat(2, minmax(0, 1fr));

        gap: 20px 22px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .form-label {
        font-size: 13px;
        font-weight: 700;
        color: var(--text-dark);

        margin-bottom: 8px;
    }

    .required {
        color: var(--red);
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;

        border: 1px solid #dfe5da;

        background: #ffffff;

        border-radius: 11px;

        padding: 12px 14px;

        color: var(--text-dark);

        font-size: 14px;

        outline: none;

        transition:
            border-color 0.2s ease,
            box-shadow 0.2s ease;
    }

    .form-input,
    .form-select {
        height: 46px;
    }

    .form-textarea {
        min-height: 105px;
        resize: vertical;
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #a2aaa5;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: var(--green);

        box-shadow:
            0 0 0 3px rgba(120, 184, 42, 0.12);
    }


    /* =========================================================
       INFO BOX
    ========================================================= */

    .register-info {
        display: flex;
        align-items: flex-start;

        gap: 12px;

        padding: 15px 16px;

        margin-top: 20px;

        background: var(--green-soft);

        border: 1px solid #e1ecd1;

        border-radius: 12px;
    }

    .register-info-icon {
        width: 28px;
        height: 28px;
        min-width: 28px;

        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--green);

        color: #ffffff;

        font-size: 13px;
        font-weight: 800;
    }

    .register-info-text {
        font-size: 12px;
        line-height: 1.6;
        color: var(--text);
    }


    /* =========================================================
       ACTION
    ========================================================= */

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;

        gap: 12px;

        padding-top: 24px;

        border-top: 1px solid var(--border);

        margin-top: 30px;
    }

    .btn {
        min-height: 44px;

        padding: 0 21px;

        border-radius: 11px;

        font-size: 13px;
        font-weight: 700;

        border: none;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease,
            background 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: #f1f4ee;
        color: var(--text);
    }

    .btn-secondary:hover {
        background: #e8ede4;
    }

    .btn-primary {
        background: var(--green);
        color: #ffffff;

        box-shadow:
            0 5px 12px rgba(120, 184, 42, 0.20);
    }

    .btn-primary:hover {
        background: #6da923;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 700px) {

        .page-heading h1 {
            font-size: 23px;
        }

        .register-card-header {
            padding: 20px;
        }

        .register-form {
            padding: 22px 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn {
            width: 100%;
        }
    }
</style>


<div class="register-page">

    {{-- =====================================================
         JUDUL HALAMAN
    ====================================================== --}}

    <div class="page-heading">

        <h1>
            Registrasi Member
        </h1>

        <p>
            Tambahkan member baru ke dalam sistem loyalty CHIAMATES.
        </p>

    </div>


    {{-- =====================================================
         CARD FORM
    ====================================================== --}}

    <div class="register-card">


        {{-- CARD HEADER --}}

        <div class="register-card-header">

            <div class="register-card-icon">
                +
            </div>

            <div class="register-card-title">

                <h2>
                    Data Member Baru
                </h2>

                <p>
                    Isi data member dengan lengkap dan benar.
                </p>

            </div>

        </div>


        {{-- FORM --}}

        <form
            class="register-form"
            method="POST"
            action="{{ route('kasir.member.store') }}"
        >

            @csrf


            {{-- =================================================
                 DATA PRIBADI
            ================================================== --}}

            <div class="form-section">

                <div class="form-section-title">
                    Data Pribadi
                </div>


                <div class="form-grid">

                    {{-- NAMA --}}

                    <div class="form-group">

                        <label
                            class="form-label"
                            for="name"
                        >
                            Nama Lengkap
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-input"
                            placeholder="Masukkan nama lengkap"
                            value="{{ old('name') }}"
                            autocomplete="name"
                        >

                    </div>


                    {{-- NOMOR HP --}}

                    <div class="form-group">

                        <label
                            class="form-label"
                            for="phone"
                        >
                            Nomor HP
                            <span class="required">*</span>
                        </label>

                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            class="form-input"
                            placeholder="Contoh: 081234567890"
                            value="{{ old('phone') }}"
                            autocomplete="tel"
                        >

                    </div>


                    {{-- EMAIL --}}

                    <div class="form-group">

                        <label
                            class="form-label"
                            for="email"
                        >
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            placeholder="Contoh: nama@email.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                        >

                    </div>


                    {{-- JENIS KELAMIN --}}

                    <div class="form-group">

                        <label
                            class="form-label"
                            for="gender"
                        >
                            Jenis Kelamin
                        </label>

                        <select
                            id="gender"
                            name="gender"
                            class="form-select"
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

                    </div>


                    {{-- ALAMAT --}}

                    <div class="form-group full">

                        <label
                            class="form-label"
                            for="address"
                        >
                            Alamat
                        </label>

                        <textarea
                            id="address"
                            name="address"
                            class="form-textarea"
                            placeholder="Masukkan alamat lengkap member"
                        >{{ old('address') }}</textarea>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 INFORMASI
            ================================================== --}}

            <div class="register-info">

                <div class="register-info-icon">
                    i
                </div>

                <div class="register-info-text">

                    Setelah registrasi berhasil, member akan
                    mendapatkan identitas member yang dapat
                    digunakan dalam sistem loyalty CHIAMATES.

                </div>

            </div>


            {{-- =================================================
                 ACTION
            ================================================== --}}

            <div class="form-actions">

                <a
                    href="{{ route('kasir.dashboard') }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Daftarkan Member
                </button>

            </div>

        </form>

    </div>

</div>

@endsection