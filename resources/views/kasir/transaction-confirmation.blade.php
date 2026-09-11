@extends('kasir.layouts.app')

@section('title', 'Konfirmasi Transaksi')

@section('content')

<style>
    .confirmation-page {
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

    .confirmation-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 340px;
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

    /* MEMBER */

    .member-summary {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 22px;
        padding: 15px;
        border: 1px solid #dcebd0;
        border-radius: 14px;
        background: #f4faed;
    }

    .member-avatar {
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: #65ad20;
        color: #fff;
        font-size: 17px;
        font-weight: 800;
    }

    .member-name {
        margin: 0 0 3px;
        color: #29422d;
        font-size: 14px;
        font-weight: 800;
    }

    .member-code {
        margin: 0;
        color: #718071;
        font-size: 11px;
    }

    /* TRANSACTION NUMBER */

    .transaction-number {
        margin-bottom: 20px;
        padding: 15px 17px;
        border: 1px solid #e3ebe0;
        border-radius: 13px;
        background: #fafcf9;
    }

    .transaction-number-label {
        margin-bottom: 5px;
        color: #899489;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .transaction-number-value {
        color: #29422d;
        font-size: 15px;
        font-weight: 800;
    }

    /* INFO */

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 20px;
    }

    .info-item {
        padding: 14px;
        border: 1px solid #e3ebe0;
        border-radius: 12px;
        background: #fff;
    }

    .info-label {
        margin-bottom: 6px;
        color: #899489;
        font-size: 10px;
        font-weight: 800;
    }

    .info-value {
        color: #304532;
        font-size: 13px;
        font-weight: 800;
        word-break: break-word;
    }

    /* PRODUCT */

    .product-section {
        margin-top: 22px;
    }

    .section-title {
        margin: 0 0 11px;
        color: #354636;
        font-size: 12px;
        font-weight: 800;
    }

    .product-list {
        overflow: hidden;
        border: 1px solid #e3ebe0;
        border-radius: 13px;
    }

    .product-row {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 70px 125px;
        gap: 12px;
        align-items: center;
        padding: 13px 15px;
        border-bottom: 1px solid #e9eee7;
    }

    .product-row:last-child {
        border-bottom: 0;
    }

    .product-name {
        color: #304532;
        font-size: 12px;
        font-weight: 700;
    }

    .product-qty {
        color: #788478;
        font-size: 11px;
        text-align: center;
    }

    .product-price {
        color: #304532;
        font-size: 12px;
        font-weight: 800;
        text-align: right;
    }

    .empty-products {
        padding: 18px;
        color: #899489;
        font-size: 11px;
        text-align: center;
    }

    /* TOTAL */

    .total-box {
        margin-top: 20px;
        padding: 18px;
        border: 1px solid #dcebd0;
        border-radius: 14px;
        background: #f4faed;
    }

    .total-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 8px 0;
    }

    .total-label {
        color: #718071;
        font-size: 12px;
    }

    .total-value {
        color: #304532;
        font-size: 13px;
        font-weight: 800;
        text-align: right;
    }

    .grand-total {
        margin-top: 8px;
        padding-top: 15px;
        border-top: 1px solid #dce7d8;
    }

    .grand-total .total-label {
        color: #29422d;
        font-weight: 800;
    }

    .grand-total .total-value {
        color: #579719;
        font-size: 22px;
    }

    /* POINT */

    .point-result {
        padding: 27px 20px;
        text-align: center;
        border: 1px solid #dcebd0;
        border-radius: 16px;
        background: #f4faed;
    }

    .point-result-label {
        margin: 0 0 9px;
        color: #718071;
        font-size: 11px;
        font-weight: 700;
    }

    .point-result-value {
        margin: 0;
        color: #579719;
        font-size: 42px;
        line-height: 1;
        font-weight: 800;
    }

    .point-result-unit {
        margin-top: 8px;
        color: #6d7d69;
        font-size: 12px;
        font-weight: 700;
    }

    /* WARNING */

    .confirmation-notice {
        margin-top: 18px;
        padding: 15px;
        border: 1px solid #e4ebe1;
        border-radius: 13px;
        background: #f5f8f3;
    }

    .confirmation-notice-title {
        margin: 0 0 6px;
        color: #354636;
        font-size: 11px;
        font-weight: 800;
    }

    .confirmation-notice-text {
        margin: 0;
        color: #7b877a;
        font-size: 11px;
        line-height: 1.7;
    }

    /* ACTION */

    .action-row {
        display: flex;
        gap: 10px;
        margin-top: 22px;
    }

    .button {
        min-height: 46px;
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 15px;
        border-radius: 11px;
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        box-sizing: border-box;
        transition: .2s ease;
    }

    .button-secondary {
        border: 1px solid #dce7d8;
        background: #fff;
        color: #527d1d;
        cursor: pointer;
    }

    .button-secondary:hover {
        background: #f6f9f4;
    }

    .button-primary {
        border: 0;
        background: #65ad20;
        color: #fff;
        cursor: pointer;
        box-shadow: 0 7px 16px rgba(101, 173, 32, .15);
    }

    .button-primary:hover {
        background: #579719;
        transform: translateY(-1px);
    }

    .button-primary:disabled {
        opacity: .65;
        cursor: not-allowed;
        transform: none;
    }

    @media (max-width: 800px) {

        .confirmation-grid {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 600px) {

        .page-header h1 {
            font-size: 25px;
        }

        .card-body {
            padding: 20px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .product-row {
            grid-template-columns: minmax(0, 1fr) 55px 100px;
        }

        .action-row {
            flex-direction: column;
        }

    }
</style>


<div class="confirmation-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="page-header">

        <h1>
            Konfirmasi Transaksi
        </h1>

        <p>
            Periksa kembali detail transaksi sebelum transaksi diselesaikan.
        </p>

    </div>


    <div class="confirmation-grid">


        {{-- =====================================================
             DETAIL TRANSAKSI
        ====================================================== --}}

        <div class="card">

            <div class="card-header">

                <h2>
                    Detail Transaksi
                </h2>

                <p>
                    Pastikan seluruh data transaksi sudah benar.
                </p>

            </div>


            <div class="card-body">


                {{-- MEMBER --}}

                <div class="member-summary">

                    <div
                        class="member-avatar"
                        id="memberAvatar"
                    >
                        M
                    </div>

                    <div>

                        <p
                            class="member-name"
                            id="memberName"
                        >
                            -
                        </p>

                        <p
                            class="member-code"
                            id="memberCode"
                        >
                            ID Member: -
                        </p>

                    </div>

                </div>


                {{-- NOMOR TRANSAKSI --}}

                <div class="transaction-number">

                    <div class="transaction-number-label">
                        Nomor Transaksi
                    </div>

                    <div
                        class="transaction-number-value"
                        id="transactionNumber"
                    >
                        -
                    </div>

                </div>


                {{-- INFO --}}

                <div class="info-grid">

                    <div class="info-item">

                        <div class="info-label">
                            Tanggal Transaksi
                        </div>

                        <div
                            class="info-value"
                            id="transactionDate"
                        >
                            -
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Jumlah Produk
                        </div>

                        <div
                            class="info-value"
                            id="totalItems"
                        >
                            0 item
                        </div>

                    </div>

                </div>


                {{-- PRODUK --}}

                <div class="product-section">

                    <p class="section-title">
                        Produk
                    </p>


                    <div
                        class="product-list"
                        id="productList"
                    >

                        <div class="empty-products">
                            Memuat produk...
                        </div>

                    </div>

                </div>


                {{-- TOTAL --}}

                <div class="total-box">

                    <div class="total-row">

                        <span class="total-label">
                            Subtotal
                        </span>

                        <span
                            class="total-value"
                            id="subtotal"
                        >
                            Rp 0
                        </span>

                    </div>


                    <div class="total-row grand-total">

                        <span class="total-label">
                            Total Transaksi
                        </span>

                        <span
                            class="total-value"
                            id="transactionTotal"
                        >
                            Rp 0
                        </span>

                    </div>

                </div>


                {{-- ACTION --}}

                <div class="action-row">

                    <button
                        type="button"
                        class="button button-secondary"
                        id="backButton"
                    >
                        Kembali
                    </button>


                    <button
                        type="button"
                        class="button button-primary"
                        id="confirmButton"
                    >
                        Konfirmasi Transaksi
                    </button>

                </div>

            </div>

        </div>


        {{-- =====================================================
             RINGKASAN POIN
        ====================================================== --}}

        <div class="card">

            <div class="card-header">

                <h2>
                    Ringkasan Poin
                </h2>

                <p>
                    Poin yang akan ditambahkan kepada member.
                </p>

            </div>


            <div class="card-body">

                <div class="point-result">

                    <p class="point-result-label">
                        Poin Diperoleh
                    </p>

                    <p
                        class="point-result-value"
                        id="earnedPoints"
                    >
                        0
                    </p>

                    <div class="point-result-unit">
                        poin
                    </div>

                </div>


                <div class="confirmation-notice">

                    <p class="confirmation-notice-title">
                        Periksa Sebelum Konfirmasi
                    </p>

                    <p class="confirmation-notice-text">
                        Setelah transaksi dikonfirmasi,
                        transaksi akan dianggap selesai dan
                        poin akan dicatat untuk member.
                    </p>

                </div>

            </div>

        </div>


    </div>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | STORAGE
    |--------------------------------------------------------------------------
    */

    const transactionStorage =
        sessionStorage.getItem(
            'chiamates_transaction'
        );


    const calculatedPoints =
        Number(
            sessionStorage.getItem(
                'chiamates_calculated_points'
            )
        ) || 0;


    let transaction = null;


    /*
    |--------------------------------------------------------------------------
    | VALIDASI DATA
    |--------------------------------------------------------------------------
    */

    if (!transactionStorage) {

        alert(
            'Data transaksi tidak ditemukan. Silakan kembali ke Input Transaksi.'
        );

        window.location.href =
            "{{ route('kasir.transaction.input') }}";

    }


    try {

        transaction =
            JSON.parse(
                transactionStorage
            );

    } catch (error) {

        console.error(
            'Data transaksi tidak valid:',
            error
        );

        sessionStorage.removeItem(
            'chiamates_transaction'
        );

        sessionStorage.removeItem(
            'chiamates_calculated_points'
        );

        alert(
            'Data transaksi tidak valid.'
        );

        window.location.href =
            "{{ route('kasir.transaction.input') }}";

    }


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
    | FORMAT TANGGAL
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
                month: 'long',
                year: 'numeric'
            }
        ).format(date);

    }


    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN DATA
    |--------------------------------------------------------------------------
    */

    if (transaction) {

        /*
        |--------------------------------------------------------------------------
        | MEMBER
        |--------------------------------------------------------------------------
        */

        const memberName =
            transaction.member_name ||
            (
                transaction.member_id
                    ? 'Member ' + transaction.member_id
                    : 'Member'
            );


        const memberCode =
            transaction.member_code ||
            transaction.member_id ||
            '-';


        document.getElementById(
            'memberName'
        ).textContent =
            memberName;


        document.getElementById(
            'memberCode'
        ).textContent =
            'ID Member: ' + memberCode;


        document.getElementById(
            'memberAvatar'
        ).textContent =
            String(memberName)
                .charAt(0)
                .toUpperCase() || 'M';


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI
        |--------------------------------------------------------------------------
        */

        document.getElementById(
            'transactionNumber'
        ).textContent =
            transaction.transaction_number || '-';


        document.getElementById(
            'transactionDate'
        ).textContent =
            formatDate(
                transaction.transaction_date
            );


        /*
        |--------------------------------------------------------------------------
        | PRODUCTS
        |--------------------------------------------------------------------------
        */

        const products =
            Array.isArray(
                transaction.products
            )
                ? transaction.products
                : [];


        let totalItems = 0;


        products.forEach(
            function(product) {

                totalItems +=
                    Number(
                        product.qty
                    ) || 0;

            }
        );


        document.getElementById(
            'totalItems'
        ).textContent =
            totalItems + ' item';


        /*
        |--------------------------------------------------------------------------
        | PRODUCT LIST
        |--------------------------------------------------------------------------
        */

        const productList =
            document.getElementById(
                'productList'
            );


        if (products.length === 0) {

            productList.innerHTML = `
                <div class="empty-products">
                    Tidak ada detail produk.
                </div>
            `;

        } else {

            productList.innerHTML = '';


            products.forEach(
                function(product) {

                    const name =
                        product.name ||
                        product.product_name ||
                        'Produk';


                    const qty =
                        Number(
                            product.qty
                        ) || 0;


                    const price =
                        Number(
                            product.price
                        ) || 0;


                    const row =
                        document.createElement(
                            'div'
                        );


                    row.className =
                        'product-row';


                    row.innerHTML = `

                        <div class="product-name">
                            ${escapeHtml(name)}
                        </div>

                        <div class="product-qty">
                            ${qty}x
                        </div>

                        <div class="product-price">
                            ${formatRupiah(price * qty)}
                        </div>

                    `;


                    productList.appendChild(
                        row
                    );

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL
        |--------------------------------------------------------------------------
        */

        const total =
            Number(
                transaction.total
            ) || 0;


        document.getElementById(
            'subtotal'
        ).textContent =
            formatRupiah(
                transaction.subtotal ?? total
            );


        document.getElementById(
            'transactionTotal'
        ).textContent =
            formatRupiah(
                total
            );

    }


    /*
    |--------------------------------------------------------------------------
    | POINT
    |--------------------------------------------------------------------------
    */

    document.getElementById(
        'earnedPoints'
    ).textContent =
        calculatedPoints;


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
            value;


        return div.innerHTML;

    }


    /*
    |--------------------------------------------------------------------------
    | KEMBALI
    |--------------------------------------------------------------------------
    */

    document.getElementById(
        'backButton'
    ).addEventListener(
        'click',
        function() {

            window.location.href =
                "{{ route('kasir.point.calculation') }}";

        }
    );


    /*
    |--------------------------------------------------------------------------
    | KONFIRMASI TRANSAKSI
    |--------------------------------------------------------------------------
    */

    document.getElementById(
        'confirmButton'
    ).addEventListener(
        'click',
        function() {

            const button = this;


            if (!transaction) {

                alert(
                    'Data transaksi tidak ditemukan.'
                );

                return;

            }


            const total =
                Number(
                    transaction.total
                ) || 0;


            if (total <= 0) {

                alert(
                    'Total transaksi tidak valid.'
                );

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | KONFIRMASI KASIR
            |--------------------------------------------------------------------------
            */

            const confirmed =
                window.confirm(
                    'Apakah Anda yakin ingin mengonfirmasi transaksi ini?'
                );


            if (!confirmed) {

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | BUTTON STATE
            |--------------------------------------------------------------------------
            */

            button.disabled =
                true;


            button.textContent =
                'Memproses...';


            /*
            |--------------------------------------------------------------------------
            | SIMPAN TRANSAKSI KE DATABASE VIA AJAX
            |--------------------------------------------------------------------------
            */

            fetch("{{ route('kasir.transaction.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    member_id: transaction.member_id,
                    transaction_number: transaction.transaction_number,
                    transaction_type: transaction.transaction_type || 'walk_in',
                    total: transaction.total,
                    points: calculatedPoints
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    sessionStorage.setItem('chiamates_transaction_completed', 'true');
                    // Simpan data return ke session storage untuk view success
                    sessionStorage.setItem('chiamates_success_data', JSON.stringify(data.data));
                    window.location.href = "{{ route('kasir.transaction.success') }}";
                } else {
                    alert(data.message || 'Gagal menyimpan transaksi.');
                    button.disabled = false;
                    button.textContent = 'Konfirmasi Transaksi';
                }
            })
            .catch(err => {
                console.error(err);
                alert('Terjadi kesalahan jaringan.');
                button.disabled = false;
                button.textContent = 'Konfirmasi Transaksi';
            });

        }
    );

</script>

@endsection