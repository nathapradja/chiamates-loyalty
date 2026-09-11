@extends('member.layouts.app')

@section('content')

<style>
    .profile-edit-header {
        margin-bottom: 24px;
    }

    .profile-edit-label {
        margin-bottom: 7px;

        color: var(--green-dark);

        font-size: 10px;
        font-weight: 800;

        text-transform: uppercase;
        letter-spacing: .7px;
    }

    .profile-edit-title {
        margin-bottom: 7px;

        color: var(--text);

        font-size: 29px;
        line-height: 1.2;
        font-weight: 800;
    }

    .profile-edit-description {
        max-width: 680px;

        color: var(--muted);

        font-size: 12px;
        line-height: 1.7;
    }


    /*
    |--------------------------------------------------------------------------
    | LAYOUT
    |--------------------------------------------------------------------------
    */

    .profile-edit-layout {
        display: grid;

        grid-template-columns:
            minmax(0, 1fr)
            300px;

        gap: 20px;

        align-items: start;
    }


    /*
    |--------------------------------------------------------------------------
    | FORM CARD
    |--------------------------------------------------------------------------
    */

    .profile-edit-card {
        padding: 26px;

        background: var(--white);

        border: 1px solid var(--border);

        border-radius: 18px;

        box-shadow:
            0 12px 35px
            rgba(61, 91, 38, .06);
    }

    .profile-card-heading {
        margin-bottom: 4px;

        color: var(--text);

        font-size: 16px;
        font-weight: 800;
    }

    .profile-card-subheading {
        margin-bottom: 23px;

        color: var(--muted);

        font-size: 10px;
        line-height: 1.6;
    }


    /*
    |--------------------------------------------------------------------------
    | FORM
    |--------------------------------------------------------------------------
    */

    .profile-form {
        display: flex;

        flex-direction: column;

        gap: 18px;
    }

    .profile-field {
        display: flex;

        flex-direction: column;

        gap: 7px;
    }

    .profile-field label {
        color: var(--text);

        font-size: 10px;
        font-weight: 800;
    }

    .profile-field .field-hint {
        margin-top: -2px;

        color: var(--muted);

        font-size: 8px;
    }

    .profile-field input,
    .profile-field textarea {
        width: 100%;

        box-sizing: border-box;

        padding: 12px 14px;

        border: 1px solid var(--border);

        border-radius: 10px;

        outline: none;

        background: #FCFDFB;

        color: var(--text);

        font-family: inherit;

        font-size: 11px;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .profile-field input {
        min-height: 45px;
    }

    .profile-field textarea {
        min-height: 105px;

        resize: vertical;

        line-height: 1.6;
    }

    .profile-field input:focus,
    .profile-field textarea:focus {
        border-color: var(--green);

        background: var(--white);

        box-shadow:
            0 0 0 3px
            rgba(92, 148, 29, .10);
    }

    .profile-field input::placeholder,
    .profile-field textarea::placeholder {
        color: #A7ADA2;
    }


    /*
    |--------------------------------------------------------------------------
    | TWO COLUMN FIELD
    |--------------------------------------------------------------------------
    */

    .profile-form-row {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 15px;
    }


    /*
    |--------------------------------------------------------------------------
    | ERROR
    |--------------------------------------------------------------------------
    */

    .field-error {
        color: #B64C4C;

        font-size: 9px;

        line-height: 1.5;
    }


    /*
    |--------------------------------------------------------------------------
    | SUCCESS
    |--------------------------------------------------------------------------
    */

    .profile-success {
        margin-bottom: 18px;

        padding: 12px 14px;

        border-radius: 10px;

        background: var(--green-light);

        color: var(--green-dark);

        font-size: 10px;

        line-height: 1.6;
    }


    /*
    |--------------------------------------------------------------------------
    | FORM ACTION
    |--------------------------------------------------------------------------
    */

    .profile-form-actions {
        margin-top: 5px;

        padding-top: 19px;

        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 10px;

        border-top: 1px solid #EDF1E9;
    }

    .profile-cancel-button {
        min-height: 43px;

        padding: 0 18px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        border: 1px solid var(--border);

        border-radius: 10px;

        background: var(--white);

        color: var(--muted);

        font-size: 10px;
        font-weight: 800;

        transition: .2s ease;
    }

    .profile-cancel-button:hover {
        border-color: var(--green);

        color: var(--green-dark);
    }

    .profile-save-button {
        min-height: 43px;

        padding: 0 21px;

        border: 0;

        border-radius: 10px;

        background:
            linear-gradient(
                135deg,
                var(--green-dark),
                var(--green)
            );

        color: var(--white);

        font-family: inherit;

        font-size: 10px;
        font-weight: 800;

        cursor: pointer;

        transition:
            transform .2s ease,
            box-shadow .2s ease;
    }

    .profile-save-button:hover {
        transform: translateY(-1px);

        box-shadow:
            0 8px 20px
            rgba(92, 148, 29, .20);
    }


    /*
    |--------------------------------------------------------------------------
    | SIDE INFORMATION
    |--------------------------------------------------------------------------
    */

    .profile-info-card {
        padding: 22px;

        background:
            linear-gradient(
                145deg,
                var(--green-dark),
                var(--green)
            );

        border-radius: 18px;

        color: var(--white);

        box-shadow:
            0 12px 35px
            rgba(61, 91, 38, .12);
    }

    .profile-info-icon {
        width: 45px;
        height: 45px;

        margin-bottom: 17px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: rgba(255,255,255,.14);

        color: var(--white);

        font-size: 16px;
        font-weight: 800;
    }

    .profile-info-title {
        margin-bottom: 8px;

        font-size: 15px;
        font-weight: 800;
    }

    .profile-info-text {
        color: rgba(255,255,255,.78);

        font-size: 9px;

        line-height: 1.8;
    }

    .profile-info-list {
        margin-top: 19px;

        display: flex;

        flex-direction: column;

        gap: 11px;
    }

    .profile-info-item {
        display: flex;

        align-items: flex-start;

        gap: 9px;

        color: rgba(255,255,255,.86);

        font-size: 9px;

        line-height: 1.6;
    }

    .profile-info-item span:first-child {
        flex: 0 0 auto;

        width: 18px;
        height: 18px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 5px;

        background: rgba(255,255,255,.12);

        font-size: 8px;
        font-weight: 800;
    }


    /*
    |--------------------------------------------------------------------------
    | RESPONSIVE
    |--------------------------------------------------------------------------
    */

    @media (max-width: 900px) {

        .profile-edit-layout {
            grid-template-columns: 1fr;
        }

        .profile-info-card {
            order: -1;
        }
    }

    @media (max-width: 600px) {

        .profile-edit-title {
            font-size: 25px;
        }

        .profile-edit-card {
            padding: 20px;
        }

        .profile-form-row {
            grid-template-columns: 1fr;
        }

        .profile-form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .profile-cancel-button,
        .profile-save-button {
            width: 100%;
        }
    }
</style>


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="profile-edit-header">

    <div class="profile-edit-label">
        Profil Member
    </div>

    <h1 class="profile-edit-title">
        Edit Profil
    </h1>

    <p class="profile-edit-description">
        Perbarui informasi pribadi kamu agar data
        member CHIAMATES tetap sesuai.
    </p>

</div>


{{-- =====================================================
     CONTENT
====================================================== --}}

<div class="profile-edit-layout">


    {{-- =================================================
         FORM
    ================================================== --}}

    <section class="profile-edit-card">

        <div class="profile-card-heading">
            Informasi Pribadi
        </div>

        <div class="profile-card-subheading">
            Isi data di bawah ini dengan informasi yang benar.
        </div>


        {{-- SUCCESS MESSAGE --}}

        @if (session('success'))

            <div class="profile-success">
                {{ session('success') }}
            </div>

        @endif


        {{-- ERROR SUMMARY --}}

        @if ($errors->any())

            <div
                class="field-error"
                style="
                    margin-bottom:18px;
                    padding:12px 14px;
                    background:#FFF3F3;
                    border-radius:10px;
                "
            >
                Ada data yang belum benar. Silakan periksa
                kembali form di bawah.
            </div>

        @endif


        <form
            method="POST"
            action="{{ route('member.profile.update') }}"
            class="profile-form"
        >

            @csrf

            @method('PUT')


            {{-- =================================================
                 NAMA + EMAIL
            ================================================== --}}

            <div class="profile-form-row">


                <div class="profile-field">

                    <label for="name">
                        Nama Lengkap
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name', auth()->user()->name) }}"
                        placeholder="Masukkan nama lengkap"
                        autocomplete="name"
                        required
                    >

                    @error('name')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                <div class="profile-field">

                    <label for="email">
                        Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email', auth()->user()->email) }}"
                        placeholder="Masukkan email"
                        autocomplete="email"
                        required
                    >

                    @error('email')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


            </div>


            {{-- =================================================
                 PHONE
            ================================================== --}}

            <div class="profile-field">

                <label for="phone">
                    No. Telepon
                </label>

                <span class="field-hint">
                    Gunakan nomor yang masih aktif.
                </span>

                <input
                    id="phone"
                    type="text"
                    name="phone"
                    value="{{ old(
                        'phone',
                        optional(auth()->user()->member)->phone
                    ) }}"
                    placeholder="Contoh: 081234567890"
                    autocomplete="tel"
                >

                @error('phone')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- =================================================
                 ADDRESS
            ================================================== --}}

            <div class="profile-field">

                <label for="address">
                    Alamat
                </label>

                <span class="field-hint">
                    Masukkan alamat tempat tinggal kamu.
                </span>

                <textarea
                    id="address"
                    name="address"
                    placeholder="Masukkan alamat lengkap"
                >{{ old(
                    'address',
                    optional(auth()->user()->member)->address
                ) }}</textarea>

                @error('address')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- =================================================
                 ACTION
            ================================================== --}}

            <div class="profile-form-actions">

                <a
                    href="{{ route('member.profile') }}"
                    class="profile-cancel-button"
                >
                    Batal
                </a>


                <button
                    type="submit"
                    class="profile-save-button"
                >
                    Simpan Perubahan
                </button>

            </div>


        </form>

    </section>



    {{-- =================================================
         SIDE INFO
    ================================================== --}}

    <aside class="profile-info-card">

        <div class="profile-info-icon">
            P
        </div>


        <div class="profile-info-title">
            Data Profil Kamu
        </div>


        <div class="profile-info-text">
            Pastikan informasi yang kamu masukkan
            benar dan masih aktif agar komunikasi
            dan layanan member berjalan dengan baik.
        </div>


        <div class="profile-info-list">


            <div class="profile-info-item">

                <span>
                    ✓
                </span>

                <span>
                    Nama digunakan sebagai identitas
                    utama akun kamu.
                </span>

            </div>


            <div class="profile-info-item">

                <span>
                    ✓
                </span>

                <span>
                    Nomor telepon sebaiknya menggunakan
                    nomor yang aktif.
                </span>

            </div>


            <div class="profile-info-item">

                <span>
                    ✓
                </span>

                <span>
                    Periksa kembali alamat sebelum
                    menyimpan perubahan.
                </span>

            </div>


        </div>

    </aside>


</div>

@endsection