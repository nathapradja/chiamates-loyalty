@extends('kasir.layouts.app')

@section('title', 'Data Member')

@section('content')

<style>
    .member-page {
        width: 100%;
    }

    .page-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 26px;
    }

    .page-header-text h1 {
        margin: 0 0 7px;
        color: #18351c;
        font-size: 30px;
        font-weight: 800;
    }

    .page-header-text p {
        margin: 0;
        color: #718071;
        font-size: 14px;
        line-height: 1.6;
    }

    .register-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        min-height: 44px;
        padding: 0 17px;

        border-radius: 11px;

        background: #65ad20;
        color: #fff;

        text-decoration: none;
        font-size: 13px;
        font-weight: 800;

        box-shadow: 0 7px 16px rgba(101, 173, 32, .17);
        transition: .2s ease;
    }

    .register-button:hover {
        background: #579719;
        transform: translateY(-1px);
    }

    .member-card {
        background: #fff;
        border: 1px solid #e1eadb;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(52, 91, 31, .06);
        overflow: hidden;
    }

    .member-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;

        padding: 20px 24px;

        border-bottom: 1px solid #e7eee3;
    }

    .member-count {
        color: #536153;
        font-size: 13px;
        font-weight: 700;
    }

    .search-wrapper {
        width: 310px;
        max-width: 100%;
        position: relative;
    }

    .search-input {
        width: 100%;
        height: 43px;
        box-sizing: border-box;

        padding: 0 14px 0 40px;

        border: 1px solid #dbe5d8;
        border-radius: 11px;

        outline: none;

        color: #29422d;
        font-size: 13px;
    }

    .search-input:focus {
        border-color: #72b52c;
        box-shadow: 0 0 0 3px rgba(114,181,44,.10);
    }

    .search-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);

        color: #8b9889;
        font-size: 14px;
        font-weight: 800;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .member-table {
        width: 100%;
        min-width: 760px;
        border-collapse: collapse;
    }

    .member-table th {
        padding: 14px 20px;

        background: #f7faf5;

        color: #6c786b;

        font-size: 11px;
        font-weight: 800;
        text-align: left;
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    .member-table td {
        padding: 16px 20px;

        border-top: 1px solid #edf2ea;

        color: #354636;
        font-size: 13px;
    }

    .member-table tbody tr {
        transition: background .15s ease;
    }

    .member-table tbody tr:hover {
        background: #fbfdf9;
    }

    .member-profile {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .member-avatar {
        width: 38px;
        height: 38px;
        min-width: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: #edf7e5;
        color: #5b9f19;

        font-size: 14px;
        font-weight: 800;
    }

    .member-name {
        margin: 0 0 3px;
        color: #29422d;
        font-weight: 800;
    }

    .member-email {
        margin: 0;
        color: #8a9589;
        font-size: 11px;
    }

    .member-code {
        display: inline-flex;
        padding: 6px 9px;

        border-radius: 8px;

        background: #f3f7ef;
        color: #5b861f;

        font-size: 11px;
        font-weight: 800;
    }

    .point-badge {
        color: #5b9f19;
        font-weight: 800;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;

        padding: 6px 9px;

        border-radius: 8px;

        background: #eef8e7;
        color: #5a971e;

        font-size: 11px;
        font-weight: 800;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #65ad20;
    }

    .action-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 7px 11px;

        border-radius: 8px;

        border: 1px solid #dce7d8;

        background: #fff;
        color: #527d1d;

        text-decoration: none;

        font-size: 11px;
        font-weight: 800;
    }

    .empty-state {
        padding: 65px 25px;
        text-align: center;
    }

    .empty-icon {
        width: 64px;
        height: 64px;

        margin: 0 auto 16px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 18px;

        background: #f3f6f1;
        color: #97a197;

        font-size: 24px;
        font-weight: 800;
    }

    .empty-state h3 {
        margin: 0 0 7px;

        color: #314432;
        font-size: 16px;
        font-weight: 800;
    }

    .empty-state p {
        margin: 0;

        color: #879287;
        font-size: 13px;
    }

    @media (max-width: 720px) {
        .page-header {
            align-items: stretch;
            flex-direction: column;
        }

        .register-button {
            width: 100%;
        }

        .member-toolbar {
            align-items: stretch;
            flex-direction: column;
        }

        .search-wrapper {
            width: 100%;
        }
    }
</style>


<div class="member-page">

    {{-- HEADER --}}
    <div class="page-header">

        <div class="page-header-text">

            <h1>
                Data Member
            </h1>

            <p>
                Lihat dan cari data member CHIAMATES.
            </p>

        </div>


        <a
            href="{{ route('kasir.member.register') }}"
            class="register-button"
        >
            <span>+</span>
            Registrasi Member
        </a>

    </div>


    {{-- CARD --}}
    <div class="member-card">

        <div class="member-toolbar">

            <div class="member-count">
                Daftar Member
            </div>

            <div class="search-wrapper">

                <span class="search-icon">
                    Q
                </span>

                <input
                    type="search"
                    id="memberSearch"
                    class="search-input"
                    placeholder="Cari nama atau ID member..."
                    autocomplete="off"
                >

            </div>

        </div>


        {{-- =====================================================
             JIKA DATA MEMBER DARI CONTROLLER TERSEDIA
        ====================================================== --}}

        @if(isset($members) && $members->count())

            <div class="table-wrapper">

                <table class="member-table">

                    <thead>

                        <tr>
                            <th>Member</th>
                            <th>ID Member</th>
                            <th>Poin</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody id="memberTableBody">

                        @foreach($members as $member)

                            <tr class="member-row">

                                <td>

                                    <div class="member-profile">

                                        <div class="member-avatar">

                                            {{ strtoupper(
                                                substr(
                                                    $member->user->name ?? 'M',
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>

                                        <div>

                                            <p class="member-name">

                                                {{ $member->user->name ?? '-' }}

                                            </p>

                                            <p class="member-email">

                                                {{ $member->user->email ?? '-' }}

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <span class="member-code">

                                        {{ $member->member_code }}

                                    </span>

                                </td>


                                <td>

                                    <span class="point-badge">

                                        {{ number_format(
                                            $member->points ?? 0,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                        poin

                                    </span>

                                </td>


                                <td>

                                    <span class="status-badge">

                                        <span class="status-dot"></span>

                                        Aktif

                                    </span>

                                </td>


                                <td>

                                    <a
                                        href="{{ route('kasir.member.detail', $member->id) }}"
                                        class="action-button"
                                    >
                                        Detail
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            {{-- EMPTY STATE --}}

            <div
                class="empty-state"
                id="emptyState"
            >

                <div class="empty-icon">
                    M
                </div>

                <h3>
                    Belum Ada Data Member
                </h3>

                <p>
                    Data member yang terdaftar akan muncul di sini.
                </p>

            </div>

        @endif

    </div>

</div>


<script>

    const searchInput =
        document.getElementById('memberSearch');

    if (searchInput) {

        searchInput.addEventListener('input', function () {

            const keyword =
                this.value.toLowerCase().trim();

            const rows =
                document.querySelectorAll('.member-row');

            rows.forEach(function (row) {

                const text =
                    row.textContent.toLowerCase();

                row.style.display =
                    text.includes(keyword)
                        ? ''
                        : 'none';

            });

        });

    }

</script>

@endsection