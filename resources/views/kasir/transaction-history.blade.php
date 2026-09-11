@extends('kasir.layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')

<style>
    .history-page {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
    }

    .page-header {
        margin-bottom: 25px;
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

    .history-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e1eadb;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(52, 91, 31, .06);
    }

    /* FILTER */

    .filter-area {
        padding: 20px 22px;
        border-bottom: 1px solid #e7eee3;
        background: #fff;
    }

    .filter-grid {
        display: grid;
        grid-template-columns: minmax(200px, 1fr) 170px 170px 150px;
        gap: 11px;
        align-items: end;
    }

    .filter-group label {
        display: block;
        margin-bottom: 7px;
        color: #354636;
        font-size: 11px;
        font-weight: 800;
    }

    .filter-input {
        width: 100%;
        height: 43px;
        padding: 0 12px;
        box-sizing: border-box;
        border: 1px solid #dbe5d8;
        border-radius: 10px;
        outline: none;
        background: #fff;
        color: #304532;
        font-size: 12px;
    }

    .filter-input:focus {
        border-color: #72b52c;
        box-shadow: 0 0 0 3px rgba(114,181,44,.10);
    }

    .filter-button {
        width: 100%;
        height: 43px;
        border: 0;
        border-radius: 10px;
        background: #65ad20;
        color: #fff;
        font-size: 12px;
        font-weight: 800;
        cursor: pointer;
        transition: .2s ease;
    }

    .filter-button:hover {
        background: #579719;
    }

    /* TABLE */

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .transaction-table {
        width: 100%;
        min-width: 850px;
        border-collapse: collapse;
    }

    .transaction-table thead {
        background: #f7faf5;
    }

    .transaction-table th {
        padding: 14px 17px;
        border-bottom: 1px solid #e3ebe0;
        color: #718071;
        font-size: 10px;
        font-weight: 800;
        text-align: left;
        white-space: nowrap;
    }

    .transaction-table td {
        padding: 16px 17px;
        border-bottom: 1px solid #edf1eb;
        color: #526052;
        font-size: 12px;
        vertical-align: middle;
    }

    .transaction-table tbody tr {
        transition: .15s ease;
    }

    .transaction-table tbody tr:hover {
        background: #fafcf9;
    }

    .transaction-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .transaction-number {
        color: #29422d;
        font-weight: 800;
    }

    .member-name {
        margin-bottom: 3px;
        color: #304532;
        font-weight: 800;
    }

    .member-code {
        color: #929c91;
        font-size: 10px;
    }

    .transaction-total {
        color: #29422d;
        font-weight: 800;
    }

    .point-value {
        color: #579719;
        font-weight: 800;
    }

    .status {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 72px;
        padding: 6px 9px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 800;
    }

    .status-success {
        background: #eaf6df;
        color: #579719;
    }

    .status-pending {
        background: #fff6df;
        color: #a87918;
    }

    .status-cancelled {
        background: #fbeaea;
        color: #b05252;
    }

    .detail-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 32px;
        padding: 0 11px;
        border: 1px solid #dce7d8;
        border-radius: 8px;
        background: #fff;
        color: #527d1d;
        font-size: 10px;
        font-weight: 800;
        text-decoration: none;
        white-space: nowrap;
        transition: .2s ease;
    }

    .detail-button:hover {
        background: #f5f9f2;
        border-color: #cfdcc9;
    }

    /* EMPTY */

    .empty-state {
        padding: 55px 25px;
        text-align: center;
    }

    .empty-icon {
        width: 54px;
        height: 54px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: #f1f6ee;
        color: #65ad20;
        font-size: 23px;
        font-weight: 800;
    }

    .empty-state h3 {
        margin: 0 0 6px;
        color: #354636;
        font-size: 15px;
        font-weight: 800;
    }

    .empty-state p {
        margin: 0;
        color: #899489;
        font-size: 11px;
    }

    /* FOOTER */

    .table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 15px 20px;
        border-top: 1px solid #e7eee3;
        background: #fafcf9;
    }

    .total-info {
        color: #899489;
        font-size: 11px;
    }

    .pagination {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .page-button {
        min-width: 32px;
        height: 32px;
        padding: 0 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #dce7d8;
        border-radius: 8px;
        background: #fff;
        color: #527d1d;
        font-size: 10px;
        font-weight: 800;
        cursor: pointer;
    }

    .page-button.active {
        border-color: #65ad20;
        background: #65ad20;
        color: #fff;
    }

    .page-button:disabled {
        opacity: .45;
        cursor: not-allowed;
    }

    @media (max-width: 900px) {

        .filter-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

    }

    @media (max-width: 560px) {

        .page-header h1 {
            font-size: 25px;
        }

        .filter-grid {
            grid-template-columns: 1fr;
        }

        .filter-area {
            padding: 17px;
        }

        .table-footer {
            align-items: flex-start;
            flex-direction: column;
        }

    }
</style>


<div class="history-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="page-header">

        <h1>
            Riwayat Transaksi
        </h1>

        <p>
            Lihat dan cari transaksi yang telah diproses oleh kasir.
        </p>

    </div>


    <div class="history-card">


        {{-- =====================================================
             FILTER
        ====================================================== --}}

        <div class="filter-area">

            <div class="filter-grid">

                <div class="filter-group">

                    <label for="searchTransaction">
                        Cari Transaksi / Member
                    </label>

                    <input
                        type="text"
                        id="searchTransaction"
                        class="filter-input"
                        placeholder="Nomor transaksi atau nama member..."
                    >

                </div>


                <div class="filter-group">

                    <label for="startDate">
                        Dari Tanggal
                    </label>

                    <input
                        type="date"
                        id="startDate"
                        class="filter-input"
                    >

                </div>


                <div class="filter-group">

                    <label for="endDate">
                        Sampai Tanggal
                    </label>

                    <input
                        type="date"
                        id="endDate"
                        class="filter-input"
                    >

                </div>


                <div class="filter-group">

                    <button
                        type="button"
                        class="filter-button"
                        id="filterButton"
                    >
                        Terapkan Filter
                    </button>

                </div>

            </div>

        </div>


        {{-- =====================================================
             TABLE
        ====================================================== --}}

        <div class="table-wrapper">

            <table class="transaction-table">

                <thead>

                    <tr>

                        <th>
                            NO. TRANSAKSI
                        </th>

                        <th>
                            MEMBER
                        </th>

                        <th>
                            TANGGAL
                        </th>

                        <th>
                            TOTAL
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

                    {{-- Data akan dimuat oleh JavaScript --}}

                </tbody>

            </table>


            {{-- EMPTY STATE --}}

            <div
                class="empty-state"
                id="emptyState"
                style="display: none;"
            >

                <div class="empty-icon">
                    T
                </div>

                <h3>
                    Belum Ada Transaksi
                </h3>

                <p>
                    Riwayat transaksi akan muncul setelah kasir menyelesaikan transaksi.
                </p>

            </div>

        </div>


        {{-- =====================================================
             FOOTER
        ====================================================== --}}

        <div class="table-footer">

            <div
                class="total-info"
                id="totalInfo"
            >
                Menampilkan 0 transaksi
            </div>


            <div class="pagination">

                <button
                    type="button"
                    class="page-button"
                    id="previousButton"
                    disabled
                >
                    ‹
                </button>


                <button
                    type="button"
                    class="page-button active"
                    id="pageNumber"
                >
                    1
                </button>


                <button
                    type="button"
                    class="page-button"
                    id="nextButton"
                    disabled
                >
                    ›
                </button>

            </div>

        </div>

    </div>

</div>


@php
    $txData = \App\Models\Transaction::with('member.user')->latest()->get()->map(function($t) {
        return [
            'transaction_number' => $t->transaction_number,
            'member_name' => optional(optional($t->member)->user)->name ?? '-',
            'member_code' => optional($t->member)->member_code ?? '-',
            'transaction_date' => $t->created_at ? $t->created_at->format('Y-m-d') : '',
            'total' => $t->total_amount,
            'points' => $t->points_earned,
            'status' => $t->status == 'success' ? 'Berhasil' : ($t->status == 'pending' ? 'Pending' : 'Batal'),
        ];
    });
@endphp

<script>

    /*
    |--------------------------------------------------------------------------
    | DATA
    |--------------------------------------------------------------------------
    */

    let transactions = {!! json_encode($txData) !!};


    /*
    |--------------------------------------------------------------------------
    | ELEMENT
    |--------------------------------------------------------------------------
    */

    const tableBody =
        document.getElementById(
            'transactionTableBody'
        );


    const emptyState =
        document.getElementById(
            'emptyState'
        );


    const totalInfo =
        document.getElementById(
            'totalInfo'
        );


    const searchInput =
        document.getElementById(
            'searchTransaction'
        );


    const startDateInput =
        document.getElementById(
            'startDate'
        );


    const endDateInput =
        document.getElementById(
            'endDate'
        );


    /*
    |--------------------------------------------------------------------------
    | FORMAT RUPIAH
    |--------------------------------------------------------------------------
    */

    function formatRupiah(value) {

        return new Intl.NumberFormat(
            'id-ID',
            {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0
            }
        ).format(
            Number(value) || 0
        );

    }


    /*
    |--------------------------------------------------------------------------
    | FORMAT DATE
    |--------------------------------------------------------------------------
    */

    function formatDate(value) {

        if (!value) {

            return '-';

        }


        const date =
            new Date(
                value + 'T00:00:00'
            );


        if (isNaN(date.getTime())) {

            return value;

        }


        return new Intl.DateTimeFormat(
            'id-ID',
            {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            }
        ).format(date);

    }


    /*
    |--------------------------------------------------------------------------
    | ESCAPE HTML
    |--------------------------------------------------------------------------
    */

    function escapeHtml(value) {

        const div =
            document.createElement(
                'div'
            );


        div.textContent =
            value ?? '';


        return div.innerHTML;

    }


    /*
    |--------------------------------------------------------------------------
    | RENDER TABLE
    |--------------------------------------------------------------------------
    */

    function renderTransactions(
        data
    ) {

        tableBody.innerHTML = '';


        if (!data.length) {

            emptyState.style.display =
                'block';


            totalInfo.textContent =
                'Menampilkan 0 transaksi';


            return;

        }


        emptyState.style.display =
            'none';


        totalInfo.textContent =
            'Menampilkan ' +
            data.length +
            ' transaksi';


        data.forEach(
            function(transaction) {

                const row =
                    document.createElement(
                        'tr'
                    );


                const memberName =
                    transaction.member_name ||
                    (
                        transaction.member_id
                            ? 'Member ' +
                              transaction.member_id
                            : '-'
                    );


                const memberCode =
                    transaction.member_code ||
                    transaction.member_id ||
                    '-';


                const transactionNumber =
                    transaction.transaction_number ||
                    '-';


                const transactionDate =
                    transaction.transaction_date ||
                    '';


                const total =
                    Number(
                        transaction.total
                    ) || 0;


                const points =
                    Number(
                        transaction.points
                    ) || 0;


                const status =
                    transaction.status ||
                    'Berhasil';


                let statusClass =
                    'status-success';


                if (
                    status.toLowerCase()
                        .includes('pending')
                ) {

                    statusClass =
                        'status-pending';

                }


                if (
                    status.toLowerCase()
                        .includes('batal')
                ) {

                    statusClass =
                        'status-cancelled';

                }


                row.innerHTML = `

                    <td>

                        <div class="transaction-number">
                            ${escapeHtml(transactionNumber)}
                        </div>

                    </td>


                    <td>

                        <div class="member-name">
                            ${escapeHtml(memberName)}
                        </div>

                        <div class="member-code">
                            ${escapeHtml(memberCode)}
                        </div>

                    </td>


                    <td>
                        ${escapeHtml(
                            formatDate(transactionDate)
                        )}
                    </td>


                    <td>

                        <span class="transaction-total">
                            ${formatRupiah(total)}
                        </span>

                    </td>


                    <td>

                        <span class="point-value">
                            +${points} poin
                        </span>

                    </td>


                    <td>

                        <span
                            class="status ${statusClass}"
                        >
                            ${escapeHtml(status)}
                        </span>

                    </td>


                    <td>

                        <a
                            href="#"
                            class="detail-button"
                            data-transaction="${escapeHtml(transactionNumber)}"
                        >
                            Detail
                        </a>

                    </td>

                `;


                tableBody.appendChild(
                    row
                );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | FILTER
    |--------------------------------------------------------------------------
    */

    function applyFilter() {

        const keyword =
            searchInput.value
                .trim()
                .toLowerCase();


        const startDate =
            startDateInput.value;


        const endDate =
            endDateInput.value;


        const filtered =
            transactions.filter(
                function(transaction) {

                    const memberName =
                        String(
                            transaction.member_name || ''
                        ).toLowerCase();


                    const memberCode =
                        String(
                            transaction.member_code ||
                            transaction.member_id ||
                            ''
                        ).toLowerCase();


                    const transactionNumber =
                        String(
                            transaction.transaction_number || ''
                        ).toLowerCase();


                    const date =
                        String(
                            transaction.transaction_date || ''
                        );


                    const matchesKeyword =
                        !keyword ||
                        memberName.includes(keyword) ||
                        memberCode.includes(keyword) ||
                        transactionNumber.includes(keyword);


                    const matchesStartDate =
                        !startDate ||
                        date >= startDate;


                    const matchesEndDate =
                        !endDate ||
                        date <= endDate;


                    return (
                        matchesKeyword &&
                        matchesStartDate &&
                        matchesEndDate
                    );

                }
            );


        renderTransactions(
            filtered
        );

    }


    /*
    |--------------------------------------------------------------------------
    | EVENTS
    |--------------------------------------------------------------------------
    */

    document.getElementById(
        'filterButton'
    ).addEventListener(
        'click',
        applyFilter
    );


    searchInput.addEventListener(
        'input',
        applyFilter
    );


    /*
    |--------------------------------------------------------------------------
    | DETAIL
    |--------------------------------------------------------------------------
    */

    tableBody.addEventListener(
        'click',
        function(event) {

            const button =
                event.target.closest(
                    '[data-transaction]'
                );


            if (!button) {

                return;

            }


            event.preventDefault();


            const transactionNumber =
                button.dataset.transaction;


            if (!transactionNumber) {

                return;

            }


            /*
            | Untuk sementara detail menggunakan
            | data transaksi yang ada di session.
            |
            | Nanti dapat diarahkan ke:
            | kasir.transaction.detail
            */

            alert(
                'Detail transaksi: ' +
                transactionNumber
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | INITIAL RENDER
    |--------------------------------------------------------------------------
    */

    renderTransactions(
        transactions
    );

</script>

@endsection