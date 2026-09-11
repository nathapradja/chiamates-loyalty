@extends('admin.layouts.app')

@section('title', 'Data Member')

@section('content')

<style>

    .member-page {
        width: 100%;
        max-width: 1250px;
        margin: 0 auto;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .page-header {

        display: flex;
        align-items: flex-start;
        justify-content: space-between;

        gap: 20px;

        margin-bottom: 25px;

    }


    .page-header h1 {

        margin: 0 0 6px;

        color: #29422d;

        font-size: 26px;

        font-weight: 800;

    }


    .page-header p {

        margin: 0;

        color: #849084;

        font-size: 11px;

        line-height: 1.6;

    }


    /* =====================================================
       STATISTICS
    ====================================================== */

    .statistics-grid {

        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 15px;

        margin-bottom: 20px;

    }


    .stat-card {

        padding: 19px;

        background: #ffffff;

        border:
            1px solid #e2ebdd;

        border-radius: 16px;

        box-shadow:
            0 7px 25px
            rgba(
                52,
                91,
                31,
                .045
            );

    }


    .stat-label {

        margin: 0 0 8px;

        color: #8a9588;

        font-size: 10px;

        font-weight: 700;

    }


    .stat-value {

        margin: 0;

        color: #29422d;

        font-size: 25px;

        font-weight: 800;

    }


    .stat-description {

        margin: 5px 0 0;

        color: #a0aaa0;

        font-size: 9px;

    }


    /* =====================================================
       MAIN CARD
    ====================================================== */

    .member-card {

        overflow: hidden;

        background: #ffffff;

        border:
            1px solid #e2ebdd;

        border-radius: 17px;

        box-shadow:
            0 7px 25px
            rgba(
                52,
                91,
                31,
                .045
            );

    }


    .member-card-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 19px 21px;

        border-bottom:
            1px solid #edf1eb;

    }


    .member-card-title {

        margin: 0 0 4px;

        color: #354636;

        font-size: 14px;

        font-weight: 800;

    }


    .member-card-description {

        margin: 0;

        color: #99a399;

        font-size: 9px;

    }


    /* =====================================================
       SEARCH
    ====================================================== */

    .search-box {

        position: relative;

        width: 260px;

        flex-shrink: 0;

    }


    .search-input {

        width: 100%;

        height: 40px;

        padding:
            0 13px;

        border:
            1px solid #dfe8db;

        border-radius: 9px;

        outline: none;

        background: #ffffff;

        color: #354636;

        font-family: inherit;

        font-size: 10px;

    }


    .search-input::placeholder {

        color: #a8b1a6;

    }


    .search-input:focus {

        border-color: #72b52c;

        box-shadow:
            0 0 0 3px
            rgba(
                114,
                181,
                44,
                .09
            );

    }


    /* =====================================================
       TABLE
    ====================================================== */

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

        padding:
            12px 17px;

        background: #fafcf9;

        border-bottom:
            1px solid #e8eee5;

        color: #899589;

        font-size: 8px;

        font-weight: 800;

        text-align: left;

        text-transform: uppercase;

        letter-spacing: .04em;

        white-space: nowrap;

    }


    .member-table td {

        padding:
            14px 17px;

        border-bottom:
            1px solid #edf1eb;

        color: #5f6d60;

        font-size: 10px;

        vertical-align: middle;

    }


    .member-table tbody tr:last-child td {

        border-bottom: 0;

    }


    .member-table tbody tr:hover {

        background: #fbfdf9;

    }


    /* =====================================================
       MEMBER INFO
    ====================================================== */

    .member-info {

        display: flex;

        align-items: center;

        gap: 10px;

    }


    .member-avatar {

        width: 34px;
        height: 34px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        border-radius: 10px;

        background: #eaf5e2;

        color: #579719;

        font-size: 10px;

        font-weight: 800;

    }


    .member-name {

        margin: 0 0 3px;

        color: #354636;

        font-size: 10px;

        font-weight: 800;

    }


    .member-email {

        margin: 0;

        color: #9aa49a;

        font-size: 8px;

    }


    .member-code {

        color: #527d1d;

        font-size: 9px;

        font-weight: 800;

    }


    /* =====================================================
       POINT
    ====================================================== */

    .point-value {

        color: #579719;

        font-size: 11px;

        font-weight: 800;

    }


    /* =====================================================
       STATUS
    ====================================================== */

    .status-badge {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-height: 24px;

        padding:
            0 9px;

        border-radius: 20px;

        font-size: 8px;

        font-weight: 800;

    }


    .status-active {

        background: #edf8e7;

        color: #579719;

    }


    .status-inactive {

        background: #f4f4f2;

        color: #8a9187;

    }


    /* =====================================================
       ACTION
    ====================================================== */

    .detail-button {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-height: 31px;

        padding:
            0 11px;

        border:
            1px solid #dce8d7;

        border-radius: 8px;

        background: #ffffff;

        color: #579719;

        text-decoration: none;

        font-size: 8px;

        font-weight: 800;

        transition: .18s ease;

    }


    .detail-button:hover {

        background: #f3f8ef;

        border-color: #cfe0c8;

    }


    /* =====================================================
       EMPTY STATE
    ====================================================== */

    .empty-state {

        padding: 60px 20px;

        text-align: center;

    }


    .empty-icon {

        width: 48px;
        height: 48px;

        display: flex;

        align-items: center;

        justify-content: center;

        margin:
            0 auto 13px;

        border-radius: 14px;

        background: #f1f6ed;

        color: #79a05c;

        font-size: 13px;

        font-weight: 800;

    }


    .empty-state h3 {

        margin: 0 0 5px;

        color: #4c5c4d;

        font-size: 13px;

        font-weight: 800;

    }


    .empty-state p {

        max-width: 350px;

        margin: 0 auto;

        color: #9aa49a;

        font-size: 9px;

        line-height: 1.6;

    }


    /* =====================================================
       PAGINATION
    ====================================================== */

    .pagination-wrapper {

        padding:
            16px 20px;

        border-top:
            1px solid #edf1eb;

    }


    .pagination-wrapper nav {

        display: flex;

        justify-content: center;

    }


    .pagination-wrapper svg {

        width: 14px;

        height: 14px;

    }


    .pagination-wrapper a,
    .pagination-wrapper span {

        font-size: 9px;

    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 850px) {

        .statistics-grid {

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

        }


        .member-card-header {

            align-items: flex-start;

            flex-direction: column;

        }


        .search-box {

            width: 100%;

        }

    }


    @media (max-width: 600px) {

        .page-header {

            flex-direction: column;

        }


        .page-header h1 {

            font-size: 23px;

        }


        .statistics-grid {

            grid-template-columns: 1fr;

        }


        .member-card-header {

            padding: 17px;

        }

    }

</style>


<div class="member-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="page-header">

        <div>

            <h1>
                Data Member
            </h1>

            <p>
                Kelola dan pantau data member loyalty
                Amidyas Superfood.
            </p>

        </div>

    </div>


    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="statistics-grid">


        <div class="stat-card">

            <p class="stat-label">
                TOTAL MEMBER
            </p>

            <p class="stat-value">
                {{ $members->total() }}
            </p>

            <p class="stat-description">
                Seluruh member terdaftar
            </p>

        </div>


        <div class="stat-card">

            <p class="stat-label">
                HALAMAN SAAT INI
            </p>

            <p class="stat-value">
                {{ $members->count() }}
            </p>

            <p class="stat-description">
                Member pada halaman ini
            </p>

        </div>


        <div class="stat-card">

            <p class="stat-label">
                STATUS
            </p>

            <p class="stat-value">
                Aktif
            </p>

            <p class="stat-description">
                Data member loyalty
            </p>

        </div>


    </div>


    {{-- =====================================================
         MEMBER TABLE
    ====================================================== --}}

    <div class="member-card">


        <div class="member-card-header">

            <div>

                <p class="member-card-title">
                    Daftar Member
                </p>

                <p class="member-card-description">
                    Data member yang terdaftar dalam sistem.
                </p>

            </div>


            <div class="search-box">

                <input
                    type="text"
                    id="memberSearch"
                    class="search-input"
                    placeholder="Cari nama, email, atau ID member..."
                >

            </div>


        </div>


        @if ($members->count())


            <div class="table-wrapper">

                <table class="member-table">

                    <thead>

                        <tr>

                            <th>
                                Member
                            </th>

                            <th>
                                ID Member
                            </th>

                            <th>
                                Poin
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Terdaftar
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody id="memberTableBody">


                        @foreach ($members as $member)

                            @php

                                $memberName =
                                    $member->user->name
                                    ?? 'Member';

                                $memberEmail =
                                    $member->user->email
                                    ?? '-';

                                $initial =
                                    strtoupper(
                                        substr(
                                            $memberName,
                                            0,
                                            1
                                        )
                                    );

                            @endphp


                            <tr
                                class="member-row"
                                data-search="
                                    {{ strtolower(
                                        $memberName .
                                        ' ' .
                                        $memberEmail .
                                        ' ' .
                                        ($member->member_code ?? '')
                                    ) }}
                                "
                            >


                                {{-- MEMBER --}}

                                <td>

                                    <div class="member-info">

                                        <div class="member-avatar">

                                            {{ $initial }}

                                        </div>


                                        <div>

                                            <p class="member-name">

                                                {{ $memberName }}

                                            </p>


                                            <p class="member-email">

                                                {{ $memberEmail }}

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- CODE --}}

                                <td>

                                    <span class="member-code">

                                        {{ $member->member_code ?? '-' }}

                                    </span>

                                </td>


                                {{-- POINT --}}

                                <td>

                                    <span class="point-value">

                                        {{ number_format(
                                            $member->points ?? 0,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                        poin

                                    </span>

                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @if (
                                        isset($member->status) &&
                                        $member->status
                                    )

                                        <span
                                            class="status-badge status-active"
                                        >
                                            Aktif
                                        </span>

                                    @else

                                        <span
                                            class="status-badge status-active"
                                        >
                                            Aktif
                                        </span>

                                    @endif

                                </td>


                                {{-- REGISTERED --}}

                                <td>

                                    {{
                                        optional(
                                            $member->created_at
                                        )->format(
                                            'd M Y'
                                        )
                                    }}

                                </td>


                                {{-- ACTION --}}

                                <td>

                                    <a
                                        href="#"
                                        class="detail-button"
                                    >
                                        Detail
                                    </a>

                                </td>


                            </tr>

                        @endforeach


                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}

            @if ($members->hasPages())

                <div class="pagination-wrapper">

                    {{ $members->links() }}

                </div>

            @endif


        @else


            {{-- EMPTY --}}

            <div class="empty-state">

                <div class="empty-icon">
                    M
                </div>


                <h3>
                    Belum ada member
                </h3>


                <p>
                    Belum terdapat data member yang
                    terdaftar di dalam sistem.
                </p>

            </div>


        @endif


    </div>


</div>


<script>

    /* =====================================================
       MEMBER SEARCH
    ====================================================== */

    const memberSearch =
        document.getElementById(
            'memberSearch'
        );


    if (memberSearch) {

        memberSearch.addEventListener(
            'input',
            function () {

                const keyword =
                    this.value
                        .toLowerCase()
                        .trim();


                const rows =
                    document.querySelectorAll(
                        '.member-row'
                    );


                rows.forEach(
                    function (row) {

                        const text =
                            row.dataset.search
                                || '';


                        if (
                            text.includes(
                                keyword
                            )
                        ) {

                            row.style.display =
                                '';

                        } else {

                            row.style.display =
                                'none';

                        }

                    }
                );

            }
        );

    }

</script>

@endsection