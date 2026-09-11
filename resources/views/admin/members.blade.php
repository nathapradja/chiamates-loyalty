@extends('admin.layouts.app')

@section('title', 'Data Member')

@section('content')

<style>

    .members-page {
        width: 100%;
        max-width: 1250px;
        margin: 0 auto;
    }

    /* =====================================================
       HEADER
    ====================================================== */

    .members-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .members-title {
        margin: 0 0 6px;
        color: #18351c;
        font-size: 28px;
        font-weight: 800;
    }

    .members-description {
        margin: 0;
        color: #7b887b;
        font-size: 13px;
        line-height: 1.6;
    }

    .member-add-button {
        min-height: 43px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 0 17px;
        border: 0;
        border-radius: 11px;
        background: #65ad20;
        color: #fff;
        text-decoration: none;
        font-size: 11px;
        font-weight: 800;
        box-shadow: 0 7px 17px rgba(101,173,32,.16);
        transition: .2s ease;
    }

    .member-add-button:hover {
        background: #579719;
        transform: translateY(-1px);
    }


    /* =====================================================
       STATISTICS
    ====================================================== */

    .member-stat-grid {
        display: grid;
        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 16px;

        margin-bottom: 20px;
    }

    .member-stat-card {
        padding: 19px;
        background: #fff;
        border: 1px solid #e3ebdf;
        border-radius: 16px;
        box-shadow:
            0 7px 25px
            rgba(52,91,31,.05);
    }

    .member-stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .member-stat-label {
        margin: 0;
        color: #879287;
        font-size: 10px;
        font-weight: 700;
    }

    .member-stat-icon {
        width: 32px;
        height: 32px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #eef7e7;
        color: #579719;

        font-size: 10px;
        font-weight: 800;
    }

    .member-stat-value {
        margin: 10px 0 0;
        color: #29422d;
        font-size: 24px;
        font-weight: 800;
    }


    /* =====================================================
       MAIN CARD
    ====================================================== */

    .member-card {
        overflow: hidden;

        background: #fff;

        border:
            1px solid #e3ebdf;

        border-radius: 18px;

        box-shadow:
            0 8px 30px
            rgba(52,91,31,.05);
    }


    /* =====================================================
       TOOLBAR
    ====================================================== */

    .member-toolbar {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 18px 20px;

        border-bottom:
            1px solid #edf1eb;

    }


    .member-search {

        position: relative;

        flex: 1;

        max-width: 390px;

    }


    .member-search-icon {

        position: absolute;

        top: 50%;

        left: 13px;

        transform:
            translateY(-50%);

        color: #9aa49a;

        font-size: 11px;

        pointer-events: none;

    }


    .member-search-input {

        width: 100%;

        height: 42px;

        padding:
            0 13px 0 35px;

        border:
            1px solid #dce6d8;

        border-radius: 10px;

        outline: none;

        background: #fff;

        color: #29422d;

        font-family: inherit;

        font-size: 12px;

        transition: .2s ease;

    }


    .member-search-input:focus {

        border-color:
            #72b52c;

        box-shadow:
            0 0 0 3px
            rgba(114,181,44,.10);

    }


    .member-search-input::placeholder {

        color: #a1aaa0;

    }


    .member-filter {

        height: 42px;

        padding:
            0 12px;

        border:
            1px solid #dce6d8;

        border-radius: 10px;

        background: #fff;

        color: #536153;

        font-family: inherit;

        font-size: 11px;

        outline: none;

        cursor: pointer;

    }


    /* =====================================================
       TABLE
    ====================================================== */

    .member-table-wrapper {

        width: 100%;

        overflow-x: auto;

    }


    .member-table {

        width: 100%;

        min-width: 820px;

        border-collapse: collapse;

    }


    .member-table th {

        padding:
            13px 17px;

        background:
            #f7faf5;

        color:
            #7b8779;

        font-size: 9px;

        font-weight: 800;

        text-align: left;

        text-transform: uppercase;

        letter-spacing: .04em;

        white-space: nowrap;

    }


    .member-table td {

        padding:
            15px 17px;

        border-top:
            1px solid #edf2ea;

        color:
            #526252;

        font-size: 11px;

        vertical-align: middle;

    }


    .member-table tbody tr {

        transition:
            background .15s ease;

    }


    .member-table tbody tr:hover {

        background:
            #fbfdf9;

    }


    /* =====================================================
       MEMBER IDENTITY
    ====================================================== */

    .member-identity {

        display: flex;

        align-items: center;

        gap: 10px;

        min-width: 190px;

    }


    .member-row-avatar {

        width: 36px;
        height: 36px;

        flex: 0 0 36px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background:
            linear-gradient(
                135deg,
                #78b82a,
                #5c941d
            );

        color: #fff;

        font-size: 10px;

        font-weight: 800;

    }


    .member-row-name {

        margin: 0 0 3px;

        color: #29422d;

        font-size: 11px;

        font-weight: 800;

    }


    .member-row-id {

        margin: 0;

        color: #98a297;

        font-size: 9px;

    }


    /* =====================================================
       POINT
    ====================================================== */

    .member-point {

        color: #579719;

        font-weight: 800;

    }


    /* =====================================================
       STATUS
    ====================================================== */

    .member-status {

        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding:
            5px 9px;

        border-radius: 20px;

        background:
            #eef7e7;

        color:
            #579719;

        font-size: 9px;

        font-weight: 800;

    }


    .member-status-dot {

        width: 5px;
        height: 5px;

        border-radius: 50%;

        background:
            #65ad20;

    }


    /* =====================================================
       ACTION
    ====================================================== */

    .member-detail-button {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-height: 32px;

        padding:
            0 11px;

        border:
            1px solid #dce7d8;

        border-radius: 8px;

        background: #fff;

        color: #579719;

        text-decoration: none;

        font-size: 9px;

        font-weight: 800;

        transition: .18s ease;

    }


    .member-detail-button:hover {

        background:
            #f2f8e8;

        border-color:
            #cfe0c6;

    }


    /* =====================================================
       EMPTY
    ====================================================== */

    .member-empty {

        padding:
            55px 20px;

        text-align: center;

    }


    .member-empty-icon {

        width: 48px;
        height: 48px;

        margin:
            0 auto 13px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 14px;

        background:
            #f1f6ed;

        color:
            #75a84c;

        font-size: 14px;

        font-weight: 800;

    }


    .member-empty-title {

        margin: 0 0 5px;

        color:
            #405241;

        font-size: 13px;

        font-weight: 800;

    }


    .member-empty-text {

        margin: 0;

        color:
            #98a297;

        font-size: 10px;

    }


    /* =====================================================
       PAGINATION
    ====================================================== */

    .member-pagination {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding:
            15px 20px;

        border-top:
            1px solid #edf1eb;

    }


    .member-pagination-info {

        color:
            #98a297;

        font-size: 9px;

    }


    .member-pagination-buttons {

        display: flex;

        gap: 5px;

    }


    .pagination-button {

        min-width: 30px;

        height: 30px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        border:
            1px solid #dfe7dc;

        border-radius: 7px;

        background: #fff;

        color: #6f7d6d;

        font-size: 9px;

        font-weight: 700;

    }


    .pagination-button.active {

        background:
            #65ad20;

        border-color:
            #65ad20;

        color: #fff;

    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 850px) {

        .member-stat-grid {

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

        }

        .member-toolbar {

            align-items:
                stretch;

            flex-direction:
                column;

        }

        .member-search {

            max-width:
                none;

        }

    }


    @media (max-width: 650px) {

        .members-header {

            flex-direction:
                column;

        }

        .member-add-button {

            width: 100%;

        }

        .member-stat-grid {

            grid-template-columns:
                1fr;

        }

        .member-pagination {

            align-items:
                flex-start;

            flex-direction:
                column;

        }

    }

</style>


<div class="members-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="members-header">

        <div>

            <h1 class="members-title">
                Data Member
            </h1>

            <p class="members-description">
                Kelola dan pantau data member CHIAMATES
                beserta informasi poin yang dimiliki.
            </p>

        </div>


        {{-- Untuk sementara diarahkan ke halaman registrasi member kasir
             jika route admin.register-member belum dibuat. --}}

        <a
            href="{{ route('kasir.member.register') }}"
            class="member-add-button"
        >
            <span>
                +
            </span>

            <span>
                Tambah Member
            </span>
        </a>

    </div>


    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="member-stat-grid">


        <div class="member-stat-card">

            <div class="member-stat-top">

                <p class="member-stat-label">
                    Total Member
                </p>

                <div class="member-stat-icon">
                    M
                </div>

            </div>

            <p class="member-stat-value">
                {{ isset($members) ? $members->count() : 0 }}
            </p>

        </div>


        <div class="member-stat-card">

            <div class="member-stat-top">

                <p class="member-stat-label">
                    Member Aktif
                </p>

                <div class="member-stat-icon">
                    ✓
                </div>

            </div>

            <p class="member-stat-value">
                {{ isset($members) ? $members->count() : 0 }}
            </p>

        </div>


        <div class="member-stat-card">

            <div class="member-stat-top">

                <p class="member-stat-label">
                    Total Poin
                </p>

                <div class="member-stat-icon">
                    P
                </div>

            </div>

            <p class="member-stat-value">

                {{ isset($members)
                    ? number_format(
                        $members->sum('points'),
                        0,
                        ',',
                        '.'
                    )
                    : 0
                }}

            </p>

        </div>


    </div>


    {{-- =====================================================
         MEMBER TABLE CARD
    ====================================================== --}}

    <div class="member-card">


        {{-- TOOLBAR --}}

        <div class="member-toolbar">


            <div class="member-search">

                <span class="member-search-icon">
                    ⌕
                </span>

                <input
                    type="text"
                    id="memberSearch"
                    class="member-search-input"
                    placeholder="Cari nama, ID member, nomor HP..."
                >

            </div>


            <select
                id="memberStatus"
                class="member-filter"
            >

                <option value="all">
                    Semua Status
                </option>

                <option value="active">
                    Aktif
                </option>

                <option value="inactive">
                    Tidak Aktif
                </option>

            </select>


        </div>


        {{-- TABLE --}}

        <div class="member-table-wrapper">

            <table class="member-table">

                <thead>

                    <tr>

                        <th>
                            Member
                        </th>

                        <th>
                            Nomor HP
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Poin
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody id="memberTableBody">


                    @if(isset($members) && $members->count())


                        @foreach($members as $member)

                            @php

                                $name =
                                    $member->user->name
                                    ?? $member->name
                                    ?? 'Member';

                                $initial =
                                    strtoupper(
                                        substr(
                                            $name,
                                            0,
                                            1
                                        )
                                    );

                                $points =
                                    $member->points
                                    ?? $member->point
                                    ?? 0;

                                $phone =
                                    $member->phone
                                    ?? $member->user->phone
                                    ?? '-';

                                $email =
                                    $member->user->email
                                    ?? $member->email
                                    ?? '-';

                                $status =
                                    $member->status
                                    ?? 'active';

                            @endphp


                            <tr
                                data-member-row
                                data-status="{{ $status }}"
                                data-search="
                                    {{ strtolower(
                                        $name . ' ' .
                                        ($member->member_code ?? '') . ' ' .
                                        $phone . ' ' .
                                        $email
                                    ) }}
                                "
                            >


                                <td>

                                    <div class="member-identity">


                                        <div class="member-row-avatar">

                                            {{ $initial }}

                                        </div>


                                        <div>

                                            <p class="member-row-name">

                                                {{ $name }}

                                            </p>


                                            <p class="member-row-id">

                                                {{ $member->member_code ?? 'ID Member -' }}

                                            </p>

                                        </div>


                                    </div>

                                </td>


                                <td>

                                    {{ $phone }}

                                </td>


                                <td>

                                    {{ $email }}

                                </td>


                                <td>

                                    <span class="member-point">

                                        {{ number_format(
                                            $points,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                        poin

                                    </span>

                                </td>


                                <td>

                                    <span class="member-status">

                                        <span
                                            class="member-status-dot"
                                        ></span>

                                        {{ ucfirst($status) }}

                                    </span>

                                </td>


                                <td>

                                    <a
                                        href="{{ route('admin.member.detail', $member->id) }}"
                                        class="member-detail-button"
                                    >
                                        Detail
                                    </a>

                                </td>


                            </tr>

                        @endforeach


                    @else


                        <tr>

                            <td
                                colspan="6"
                                style="padding:0;"
                            >

                                <div class="member-empty">

                                    <div class="member-empty-icon">
                                        M
                                    </div>

                                    <p class="member-empty-title">
                                        Belum ada data member
                                    </p>

                                    <p class="member-empty-text">
                                        Data member yang terdaftar
                                        akan muncul di halaman ini.
                                    </p>

                                </div>

                            </td>

                        </tr>


                    @endif


                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}

        <div class="member-pagination">

            <p class="member-pagination-info">
                Menampilkan data member
            </p>


            <div class="member-pagination-buttons">

                <span class="pagination-button active">
                    1
                </span>

            </div>

        </div>


    </div>


</div>


<script>

    const memberSearch =
        document.getElementById(
            'memberSearch'
        );

    const memberStatus =
        document.getElementById(
            'memberStatus'
        );

    const memberRows =
        document.querySelectorAll(
            '[data-member-row]'
        );


    function filterMembers() {

        const keyword =
            (
                memberSearch?.value ||
                ''
            )
            .toLowerCase()
            .trim();


        const status =
            memberStatus?.value ||
            'all';


        memberRows.forEach(
            function(row) {

                const rowSearch =
                    (
                        row.dataset.search ||
                        ''
                    )
                    .toLowerCase();


                const rowStatus =
                    (
                        row.dataset.status ||
                        ''
                    )
                    .toLowerCase();


                const matchSearch =
                    rowSearch.includes(
                        keyword
                    );


                const matchStatus =
                    status === 'all' ||
                    rowStatus === status;


                row.style.display =
                    matchSearch &&
                    matchStatus
                        ? ''
                        : 'none';

            }
        );

    }


    if (memberSearch) {

        memberSearch.addEventListener(
            'input',
            filterMembers
        );

    }


    if (memberStatus) {

        memberStatus.addEventListener(
            'change',
            filterMembers
        );

    }

</script>

@endsection