@extends('admin.layouts.app')

@section('title', 'Data Transaksi')

@section('content')

<style>
    .transaction-page {
        width: 100%;
        max-width: 1250px;
        margin: 0 auto;
    }

    /* =====================================================
       HEADER
    ====================================================== */

    .page-header {
        margin-bottom: 24px;
    }

    .page-header-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
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

    /* =====================================================
       STATISTICS
    ====================================================== */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 20px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;
        padding: 19px;
        background: #fff;
        border: 1px solid #e2eadf;
        border-radius: 16px;
        box-shadow: 0 6px 22px rgba(52, 91, 31, .05);
    }

    .stat-card::after {
        content: "";
        position: absolute;
        right: -22px;
        bottom: -22px;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #f2f8ed;
    }

    .stat-label {
        position: relative;
        z-index: 1;
        margin: 0 0 9px;
        color: #899489;
        font-size: 10px;
        font-weight: 700;
    }

    .stat-value {
        position: relative;
        z-index: 1;
        margin: 0;
        color: #29422d;
        font-size: 22px;
        font-weight: 800;
    }

    /* =====================================================
       TABLE CARD
    ====================================================== */

    .table-card {
        overflow: hidden;
        background: #fff;
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

    /* =====================================================
       SEARCH
    ====================================================== */

    .filter-box {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .search-input {
        width: 240px;
        height: 38px;
        padding: 0 12px;
        border: 1px solid #dfe8dc;
        border-radius: 9px;
        outline: none;
        color: #405040;
        background: #fff;
        font-family: inherit;
        font-size: 11px;
    }

    .search-input::placeholder {
        color: #a4ada4;
    }

    .search-input:focus {
        border-color: #65ad20;
        box-shadow: 0 0 0 3px rgba(101,173,32,.08);
    }

    /* =====================================================
       TABLE
    ====================================================== */

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        min-width: 1000px;
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

    /* =====================================================
       TRANSACTION CODE
    ====================================================== */

    .transaction-code {
        margin: 0 0 3px;
        color: #354936;
        font-size: 10px;
        font-weight: 800;
        white-space: nowrap;
    }

    .transaction-date {
        margin: 0;
        color: #9aa49a;
        font-size: 9px;
    }

    /* =====================================================
       MEMBER
    ====================================================== */

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

    /* =====================================================
       NOMINAL
    ====================================================== */

    .amount {
        color: #354936;
        font-weight: 800;
        white-space: nowrap;
    }

    .points {
        color: #579719;
        font-weight: 800;
        white-space: nowrap;
    }

    /* =====================================================
       STATUS
    ====================================================== */

    .status {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 25px;
        padding: 0 9px;
        border-radius: 20px;
        font-size: 9px;
        font-weight: 800;
        white-space: nowrap;
    }

    .status-success {
        background: #eef7e7;
        color: #579719;
    }

    .status-pending {
        background: #fff8e8;
        color: #a47a22;
    }

    .status-failed {
        background: #fff1f1;
        color: #b05252;
    }

    .status-default {
        background: #f1f3f1;
        color: #697369;
    }

    /* =====================================================
       DETAIL BUTTON
    ====================================================== */

    .detail-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 31px;
        padding: 0 11px;
        border: 1px solid #dce8d7;
        border-radius: 8px;
        background: #f7faf5;
        color: #579719;
        text-decoration: none;
        font-size: 9px;
        font-weight: 800;
        white-space: nowrap;
        transition: .18s ease;
    }

    .detail-button:hover {
        border-color: #65ad20;
        background: #65ad20;
        color: #fff;
    }

    /* =====================================================
       EMPTY STATE
    ====================================================== */

    .empty-state {
        padding: 60px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 13px;
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

    /* =====================================================
       PAGINATION
    ====================================================== */

    .pagination-wrapper {
        padding: 16px 20px;
        border-top: 1px solid #edf1eb;
    }

    .pagination-wrapper nav {
        display: flex;
        justify-content: center;
    }

    .pagination-wrapper svg {
        width: 15px;
        height: 15px;
    }

    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 900px) {

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .table-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .filter-box {
            width: 100%;
        }

        .search-input {
            width: 100%;
        }
    }

    @media (max-width: 600px) {

        .page-header h1 {
            font-size: 22px;
        }

        .stat-card {
            padding: 16px;
        }

        .table-header {
            padding: 17px;
        }
    }
</style>


<div class="transaction-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="page-header">

        <div class="page-header-top">

            <div>

                <h1>
                    Data Transaksi
                </h1>

                <p>
                    Kelola dan pantau seluruh transaksi member.
                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
         STATISTIK
    ====================================================== --}}

    @php

        /*
        |--------------------------------------------------------------------------
        | Data transaksi
        |--------------------------------------------------------------------------
        |
        | View ini dibuat fleksibel supaya tetap aman apabila controller
        | belum mengirim variable $transactions.
        |
        */

        $transactionCollection =
            isset($transactions)
                ? collect(
                    method_exists($transactions, 'items')
                        ? $transactions->items()
                        : $transactions
                )
                : collect();


        $totalTransactions =
            isset($transactions) && method_exists($transactions, 'total')
                ? $transactions->total()
                : $transactionCollection->count();


        $successfulTransactions =
            $transactionCollection->filter(function ($transaction) {

                $status = strtolower(
                    (string) (
                        data_get($transaction, 'status')
                        ?? data_get($transaction, 'payment_status')
                        ?? ''
                    )
                );

                return in_array(
                    $status,
                    [
                        'success',
                        'successful',
                        'completed',
                        'complete',
                        'berhasil',
                        'paid',
                    ],
                    true
                );

            })->count();


        $totalPoints =
            $transactionCollection->sum(function ($transaction) {

                return (int) (
                    data_get($transaction, 'points')
                    ?? data_get($transaction, 'point')
                    ?? data_get($transaction, 'earned_points')
                    ?? 0
                );

            });

    @endphp


    <div class="stats-grid">

        {{-- TOTAL TRANSAKSI --}}

        <div class="stat-card">

            <p class="stat-label">
                TOTAL TRANSAKSI
            </p>

            <p class="stat-value">
                {{ number_format($totalTransactions, 0, ',', '.') }}
            </p>

        </div>


        {{-- TRANSAKSI BERHASIL --}}

        <div class="stat-card">

            <p class="stat-label">
                TRANSAKSI BERHASIL
            </p>

            <p class="stat-value">
                {{ number_format($successfulTransactions, 0, ',', '.') }}
            </p>

        </div>


        {{-- TOTAL POIN --}}

        <div class="stat-card">

            <p class="stat-label">
                TOTAL POIN
            </p>

            <p class="stat-value">
                {{ number_format($totalPoints, 0, ',', '.') }}
            </p>

        </div>

    </div>


    {{-- =====================================================
         TABLE
    ====================================================== --}}

    <div class="table-card">

        <div class="table-header">

            <div>

                <p class="table-title">
                    Riwayat Transaksi
                </p>

                <p class="table-subtitle">
                    Daftar transaksi yang tercatat dalam sistem.
                </p>

            </div>


            <div class="filter-box">

                <input
                    type="text"
                    id="transactionSearch"
                    class="search-input"
                    placeholder="Cari kode atau nama member..."
                    autocomplete="off"
                >

            </div>

        </div>


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th>
                            NO
                        </th>

                        <th>
                            TRANSAKSI
                        </th>

                        <th>
                            MEMBER
                        </th>

                        <th>
                            TANGGAL
                        </th>

                        <th>
                            NOMINAL
                        </th>

                        <th>
                            POIN
                        </th>

                        <th>
                            STATUS
                        </th>

                        <th>
                            AKSI
                        </th>

                    </tr>

                </thead>


                <tbody id="transactionTableBody">

                    @forelse ($transactionCollection as $index => $transaction)

                        @php

                            /*
                            |--------------------------------------------------------------------------
                            | IDENTITAS TRANSAKSI
                            |--------------------------------------------------------------------------
                            */

                            $transactionId =
                                data_get($transaction, 'id');


                            $transactionCode =
                                data_get($transaction, 'transaction_code')
                                ?? data_get($transaction, 'transaction_number')
                                ?? data_get($transaction, 'invoice_number')
                                ?? data_get($transaction, 'code')
                                ?? ('TRX-' . str_pad(
                                    (string) $transactionId,
                                    5,
                                    '0',
                                    STR_PAD_LEFT
                                ));


                            /*
                            |--------------------------------------------------------------------------
                            | MEMBER
                            |--------------------------------------------------------------------------
                            */

                            $member =
                                data_get($transaction, 'member');


                            $user =
                                data_get($member, 'user')
                                ?? data_get($transaction, 'user');


                            $memberName =
                                data_get($user, 'name')
                                ?? data_get($transaction, 'member_name')
                                ?? data_get($transaction, 'name')
                                ?? 'Member';


                            $memberCode =
                                data_get($member, 'member_code')
                                ?? data_get($transaction, 'member_code')
                                ?? '-';


                            /*
                            |--------------------------------------------------------------------------
                            | TANGGAL
                            |--------------------------------------------------------------------------
                            */

                            $transactionDate =
                                data_get($transaction, 'created_at')
                                ?? data_get($transaction, 'transaction_date')
                                ?? data_get($transaction, 'date');


                            /*
                            |--------------------------------------------------------------------------
                            | NOMINAL
                            |--------------------------------------------------------------------------
                            */

                            $amount =
                                data_get($transaction, 'total_amount')
                                ?? data_get($transaction, 'amount')
                                ?? data_get($transaction, 'total')
                                ?? 0;


                            /*
                            |--------------------------------------------------------------------------
                            | POIN
                            |--------------------------------------------------------------------------
                            */

                            $points =
                                data_get($transaction, 'points')
                                ?? data_get($transaction, 'point')
                                ?? data_get($transaction, 'earned_points')
                                ?? 0;


                            /*
                            |--------------------------------------------------------------------------
                            | STATUS
                            |--------------------------------------------------------------------------
                            */

                            $rawStatus =
                                data_get($transaction, 'status')
                                ?? data_get($transaction, 'payment_status')
                                ?? 'success';


                            $normalizedStatus =
                                strtolower(
                                    trim(
                                        (string) $rawStatus
                                    )
                                );


                            if (
                                in_array(
                                    $normalizedStatus,
                                    [
                                        'success',
                                        'successful',
                                        'completed',
                                        'complete',
                                        'berhasil',
                                        'paid',
                                    ],
                                    true
                                )
                            ) {

                                $statusClass =
                                    'status-success';

                                $statusText =
                                    'Berhasil';

                            } elseif (
                                in_array(
                                    $normalizedStatus,
                                    [
                                        'pending',
                                        'waiting',
                                        'menunggu',
                                    ],
                                    true
                                )
                            ) {

                                $statusClass =
                                    'status-pending';

                                $statusText =
                                    'Menunggu';

                            } elseif (
                                in_array(
                                    $normalizedStatus,
                                    [
                                        'failed',
                                        'failure',
                                        'cancelled',
                                        'canceled',
                                        'gagal',
                                    ],
                                    true
                                )
                            ) {

                                $statusClass =
                                    'status-failed';

                                $statusText =
                                    'Gagal';

                            } else {

                                $statusClass =
                                    'status-default';

                                $statusText =
                                    ucfirst(
                                        $normalizedStatus ?: 'Tidak diketahui'
                                    );

                            }

                        @endphp


                        <tr>

                            {{-- NO --}}

                            <td>
                                {{
                                    isset($transactions) &&
                                    method_exists($transactions, 'firstItem')
                                        ? $transactions->firstItem() + $index
                                        : $index + 1
                                }}
                            </td>


                            {{-- TRANSAKSI --}}

                            <td>

                                <p class="transaction-code">
                                    {{ $transactionCode }}
                                </p>

                                @if ($transactionDate)

                                    <p class="transaction-date">

                                        {{
                                            \Illuminate\Support\Carbon::parse(
                                                $transactionDate
                                            )->format('d M Y H:i')
                                        }}

                                    </p>

                                @endif

                            </td>


                            {{-- MEMBER --}}

                            <td>

                                <p class="member-name">
                                    {{ $memberName }}
                                </p>

                                <p class="member-code">
                                    {{ $memberCode }}
                                </p>

                            </td>


                            {{-- TANGGAL --}}

                            <td>

                                @if ($transactionDate)

                                    {{
                                        \Illuminate\Support\Carbon::parse(
                                            $transactionDate
                                        )->translatedFormat('d M Y')
                                    }}

                                @else

                                    -

                                @endif

                            </td>


                            {{-- NOMINAL --}}

                            <td>

                                <span class="amount">

                                    Rp
                                    {{
                                        number_format(
                                            (float) $amount,
                                            0,
                                            ',',
                                            '.'
                                        )
                                    }}

                                </span>

                            </td>


                            {{-- POIN --}}

                            <td>

                                <span class="points">

                                    +{{ number_format((int) $points, 0, ',', '.') }}

                                </span>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                <span
                                    class="status {{ $statusClass }}"
                                >
                                    {{ $statusText }}
                                </span>

                            </td>


                            {{-- DETAIL --}}

                            <td>

                                @if ($transactionId)

                                    <a
                                        href="{{ route('admin.transaction.detail', $transactionId) }}"
                                        class="detail-button"
                                    >
                                        Detail
                                    </a>

                                @else

                                    <span
                                        class="detail-button"
                                        style="opacity:.45; cursor:not-allowed;"
                                    >
                                        Detail
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        T
                                    </div>

                                    <h3>
                                        Belum ada transaksi
                                    </h3>

                                    <p>
                                        Data transaksi akan tampil
                                        di halaman ini setelah transaksi
                                        tersimpan di sistem.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}

        @if (
            isset($transactions) &&
            method_exists($transactions, 'links')
        )

            <div class="pagination-wrapper">

                {{ $transactions->links() }}

            </div>

        @endif

    </div>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | SEARCH TRANSAKSI
    |--------------------------------------------------------------------------
    */

    const searchInput =
        document.getElementById(
            'transactionSearch'
        );


    if (searchInput) {

        searchInput.addEventListener(
            'input',
            function () {

                const keyword =
                    this.value
                        .toLowerCase()
                        .trim();


                const rows =
                    document.querySelectorAll(
                        '#transactionTableBody tr'
                    );


                rows.forEach(
                    function (row) {

                        const text =
                            row.textContent
                                .toLowerCase();


                        row.style.display =
                            text.includes(keyword)
                                ? ''
                                : 'none';

                    }
                );

            }
        );

    }

</script>

@endsection