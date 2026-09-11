@extends('admin.layouts.app')

@section('title', 'Riwayat Poin')

@section('content')

<style>

    .points-page {
        width: 100%;
        max-width: 1250px;
        margin: 0 auto;
    }

    .page-header {
        margin-bottom: 24px;
    }

    .page-header h1 {
        margin: 0 0 6px;
        color: #29422d;
        font-size: 26px;
        font-weight: 800;
    }

    .page-header p {
        margin: 0;
        color: #879287;
        font-size: 12px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 20px;
    }

    .stat-card {
        padding: 19px;
        background: #ffffff;
        border: 1px solid #e2eadf;
        border-radius: 16px;
        box-shadow: 0 6px 22px rgba(52, 91, 31, .05);
    }

    .stat-label {
        margin: 0 0 9px;
        color: #899489;
        font-size: 10px;
        font-weight: 700;
    }

    .stat-value {
        margin: 0;
        color: #29422d;
        font-size: 22px;
        font-weight: 800;
    }

    .table-card {
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e2eadf;
        border-radius: 18px;
        box-shadow: 0 7px 25px rgba(52, 91, 31, .05);
    }

    .table-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 20px 22px;
        border-bottom: 1px solid #edf1eb;
    }

    .table-title {
        margin: 0 0 4px;
        color: #29422d;
        font-size: 15px;
        font-weight: 800;
    }

    .table-subtitle {
        margin: 0;
        color: #99a39a;
        font-size: 10px;
    }

    .search-input {
        width: 230px;
        height: 38px;
        padding: 0 12px;
        border: 1px solid #dfe8dc;
        border-radius: 9px;
        outline: none;
        color: #405040;
        font-family: inherit;
        font-size: 11px;
    }

    .search-input:focus {
        border-color: #65ad20;
        box-shadow: 0 0 0 3px rgba(101,173,32,.08);
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        min-width: 900px;
        border-collapse: collapse;
    }

    thead th {
        padding: 13px 18px;
        background: #f8faf7;
        border-bottom: 1px solid #e7eee3;
        color: #899489;
        font-size: 9px;
        font-weight: 800;
        text-align: left;
        white-space: nowrap;
    }

    tbody td {
        padding: 15px 18px;
        border-bottom: 1px solid #edf1eb;
        color: #526052;
        font-size: 10px;
        vertical-align: middle;
    }

    tbody tr:last-child td {
        border-bottom: 0;
    }

    tbody tr:hover {
        background: #fbfdf9;
    }

    .member-name {
        margin: 0 0 3px;
        color: #354936;
        font-size: 11px;
        font-weight: 800;
    }

    .member-code {
        margin: 0;
        color: #9aa49a;
        font-size: 9px;
    }

    .point-plus {
        color: #579719;
        font-weight: 800;
    }

    .point-minus {
        color: #b05252;
        font-weight: 800;
    }

    .point-total {
        color: #29422d;
        font-weight: 800;
    }

    .type-badge {
        display: inline-flex;
        align-items: center;
        min-height: 25px;
        padding: 0 9px;
        border-radius: 20px;
        background: #eef7e7;
        color: #579719;
        font-size: 9px;
        font-weight: 800;
    }

    .type-redeem {
        background: #fff1f1;
        color: #b05252;
    }

    .empty-state {
        padding: 55px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        border-radius: 14px;
        background: #f1f6ee;
        color: #65ad20;
        font-size: 16px;
        font-weight: 800;
    }

    .empty-state h3 {
        margin: 0 0 5px;
        color: #405040;
        font-size: 13px;
    }

    .empty-state p {
        max-width: 420px;
        margin: 0 auto;
        color: #99a39a;
        font-size: 10px;
        line-height: 1.6;
    }

    .pagination-wrapper {
        padding: 16px 20px;
        border-top: 1px solid #edf1eb;
    }

    @media (max-width: 900px) {

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .table-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .search-input {
            width: 100%;
        }

    }

</style>


<div class="points-page">

    {{-- HEADER --}}

    <div class="page-header">

        <h1>
            Riwayat Poin
        </h1>

        <p>
            Pantau seluruh aktivitas perolehan dan penggunaan poin member.
        </p>

    </div>


    {{-- STATISTIK --}}

    <div class="stats-grid">

        <div class="stat-card">

            <p class="stat-label">
                TOTAL AKTIVITAS
            </p>

            <p class="stat-value">
                {{ isset($pointHistories) ? $pointHistories->total() : 0 }}
            </p>

        </div>


        <div class="stat-card">

            <p class="stat-label">
                TOTAL POIN MASUK
            </p>

            <p class="stat-value">
                {{ $totalPointsIn ?? 0 }}
            </p>

        </div>


        <div class="stat-card">

            <p class="stat-label">
                TOTAL POIN KELUAR
            </p>

            <p class="stat-value">
                {{ $totalPointsOut ?? 0 }}
            </p>

        </div>

    </div>


    {{-- TABLE --}}

    <div class="table-card">

        <div class="table-header">

            <div>

                <p class="table-title">
                    Aktivitas Poin Member
                </p>

                <p class="table-subtitle">
                    Daftar perubahan poin yang tercatat dalam sistem.
                </p>

            </div>


            <input
                type="text"
                id="pointSearch"
                class="search-input"
                placeholder="Cari member..."
            >

        </div>


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th>
                            NO
                        </th>

                        <th>
                            MEMBER
                        </th>

                        <th>
                            TANGGAL
                        </th>

                        <th>
                            AKTIVITAS
                        </th>

                        <th>
                            POIN
                        </th>

                        <th>
                            SALDO POIN
                        </th>

                    </tr>

                </thead>


                <tbody id="pointTableBody">

                    @if(isset($pointHistories) && $pointHistories->count())

                        @foreach($pointHistories as $history)

                            <tr>

                                <td>
                                    {{ $pointHistories->firstItem() + $loop->index }}
                                </td>


                                <td>

                                    <p class="member-name">
                                        {{ $history->member->user->name ?? '-' }}
                                    </p>

                                    <p class="member-code">
                                        {{ $history->member->member_code ?? '-' }}
                                    </p>

                                </td>


                                <td>

                                    {{ optional($history->created_at)->format('d/m/Y H:i') }}

                                </td>


                                <td>

                                    @php
                                        $isRedeem =
                                            isset($history->type)
                                                && in_array(
                                                    strtolower($history->type),
                                                    ['redeem', 'debit', 'minus', 'out']
                                                );
                                    @endphp

                                    <span
                                        class="type-badge {{ $isRedeem ? 'type-redeem' : '' }}"
                                    >
                                        {{ $history->description ?? $history->type ?? 'Perubahan poin' }}
                                    </span>

                                </td>


                                <td>

                                    <span
                                        class="{{ $isRedeem ? 'point-minus' : 'point-plus' }}"
                                    >
                                        {{ $isRedeem ? '-' : '+' }}
                                        {{ abs((int) ($history->points ?? $history->point ?? 0)) }}
                                    </span>

                                </td>


                                <td>

                                    <span class="point-total">
                                        {{ $history->balance ?? $history->remaining_points ?? 0 }}
                                    </span>

                                </td>

                            </tr>

                        @endforeach

                    @else

                        <tr>

                            <td colspan="6">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        P
                                    </div>

                                    <h3>
                                        Belum ada riwayat poin
                                    </h3>

                                    <p>
                                        Aktivitas poin member akan tampil
                                        di halaman ini setelah terdapat
                                        transaksi atau penggunaan poin.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endif

                </tbody>

            </table>

        </div>


        @if(isset($pointHistories) && method_exists($pointHistories, 'links'))

            <div class="pagination-wrapper">

                {{ $pointHistories->links() }}

            </div>

        @endif

    </div>

</div>


<script>

    const pointSearch =
        document.getElementById('pointSearch');

    if (pointSearch) {

        pointSearch.addEventListener(
            'input',
            function () {

                const keyword =
                    this.value
                        .toLowerCase()
                        .trim();

                const rows =
                    document.querySelectorAll(
                        '#pointTableBody tr'
                    );

                rows.forEach(function (row) {

                    const text =
                        row.textContent
                            .toLowerCase();

                    row.style.display =
                        text.includes(keyword)
                            ? ''
                            : 'none';

                });

            }
        );

    }

</script>

@endsection