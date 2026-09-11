@extends('kasir.layouts.app')

@section('title', 'Transaksi Berhasil')

@section('content')

<style>
    .success-page {
        width: 100%;
        max-width: 820px;
        margin: 0 auto;
    }

    .success-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e1eadb;
        border-radius: 24px;
        box-shadow: 0 10px 35px rgba(52, 91, 31, .07);
    }

    .success-top {
        padding: 42px 30px 32px;
        text-align: center;
        background: #f4faed;
        border-bottom: 1px solid #dfead8;
    }

    .success-icon {
        width: 74px;
        height: 74px;
        margin: 0 auto 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #65ad20;
        color: #fff;
        font-size: 36px;
        font-weight: 800;
        box-shadow: 0 8px 20px rgba(101, 173, 32, .20);
    }

    .success-top h1 {
        margin: 0 0 8px;
        color: #29422d;
        font-size: 28px;
        font-weight: 800;
    }

    .success-top p {
        margin: 0;
        color: #718071;
        font-size: 13px;
        line-height: 1.6;
    }

    .success-body {
        padding: 28px;
    }

    .transaction-number {
        margin-bottom: 22px;
        padding: 15px 17px;
        border: 1px solid #e1eadb;
        border-radius: 13px;
        background: #fafcf9;
        text-align: center;
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
        font-size: 16px;
        font-weight: 800;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 13px;
        margin-bottom: 22px;
    }

    .summary-item {
        padding: 16px;
        border: 1px solid #e3ebe0;
        border-radius: 13px;
        background: #fff;
    }

    .summary-label {
        margin-bottom: 6px;
        color: #899489;
        font-size: 10px;
        font-weight: 800;
    }

    .summary-value {
        color: #304532;
        font-size: 14px;
        font-weight: 800;
        word-break: break-word;
    }

    /* RINCIAN PRODUK */
    .product-list {
        margin-bottom: 22px;
        border: 1px solid #e1eadb;
        border-radius: 13px;
        background: #fafcf9;
        overflow: hidden;
    }

    .product-list-title {
        margin: 0;
        padding: 15px 17px;
        background: #f4faed;
        border-bottom: 1px solid #e1eadb;
        font-size: 11px;
        font-weight: 800;
        color: #29422d;
        text-transform: uppercase;
    }

    .product-table {
        width: 100%;
        border-collapse: collapse;
    }

    .product-table th, .product-table td {
        padding: 12px 17px;
        font-size: 13px;
        border-bottom: 1px solid #e1eadb;
    }

    .product-table th {
        text-align: left;
        color: #899489;
        font-size: 10px;
        text-transform: uppercase;
    }

    .product-table tbody tr:last-child td {
        border-bottom: none;
    }

    .product-name {
        font-weight: 700;
        color: #304532;
    }

    .product-price {
        font-size: 11px;
        color: #718071;
        margin-top: 2px;
    }

    .point-box {
        margin-top: 4px;
        padding: 22px;
        border: 1px solid #dcebd0;
        border-radius: 16px;
        background: #f4faed;
        text-align: center;
    }

    .point-label {
        margin: 0 0 7px;
        color: #718071;
        font-size: 11px;
        font-weight: 700;
    }

    .point-value {
        margin: 0;
        color: #579719;
        font-size: 34px;
        line-height: 1;
        font-weight: 800;
    }

    .point-unit {
        margin-top: 7px;
        color: #718071;
        font-size: 11px;
        font-weight: 700;
    }

    .total-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-top: 18px;
        padding: 17px 18px;
        border-top: 1px solid #e3ebe0;
        border-bottom: 1px solid #e3ebe0;
    }

    .total-label {
        color: #647164;
        font-size: 13px;
        font-weight: 700;
    }

    .total-value {
        color: #29422d;
        font-size: 20px;
        font-weight: 800;
    }

    /* QR CODE PROMO */
    .qr-box {
        margin-top: 18px;
        padding: 20px;
        border: 1px dashed #b5d78a;
        border-radius: 16px;
        background: #fcfdfa;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
    }

    .qr-box img {
        width: 80px;
        height: 80px;
        border-radius: 8px;
        padding: 4px;
        background: #fff;
        border: 1px solid #e1eadb;
    }

    .qr-text {
        text-align: left;
    }

    .qr-text p {
        margin: 0 0 4px;
        color: #29422d;
        font-size: 14px;
        font-weight: 800;
    }

    .qr-text span {
        color: #718071;
        font-size: 11px;
        line-height: 1.4;
        display: block;
    }

    .actions {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .button {
        min-height: 46px;
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 16px;
        border-radius: 11px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 800;
        box-sizing: border-box;
        transition: .2s ease;
        cursor: pointer;
    }

    .button-primary {
        border: 0;
        background: #65ad20;
        color: #fff;
    }

    .button-primary:hover {
        background: #579719;
    }

    .button-secondary {
        border: 1px solid #dce7d8;
        background: #fff;
        color: #527d1d;
    }

    .button-secondary:hover {
        background: #f6f9f4;
    }

    .button-print {
        border: 1px solid #c2d9b3;
        background: #eaf5e1;
        color: #3b5e15;
    }

    .button-print:hover {
        background: #dcebd0;
    }

    /* MODE CETAK STRUK (PRINT) */
    @media print {
        body * {
            visibility: hidden;
        }
        .success-page, .success-page * {
            visibility: visible;
        }
        .success-page {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .success-card {
            border: none;
            box-shadow: none;
            border-radius: 0;
        }
        .actions {
            display: none !important;
        }
        .qr-box {
            border: 1px solid #000;
            background: transparent;
        }
    }

    @media (max-width: 600px) {
        .success-top { padding: 34px 20px 27px; }
        .success-body { padding: 20px; }
        .summary-grid { grid-template-columns: 1fr; }
        .actions { flex-direction: column; }
        .qr-box { flex-direction: column; text-align: center; gap: 10px; }
        .qr-text { text-align: center; }
    }
</style>


<div class="success-page">

    <div class="success-card">

        <div class="success-top">
            <div class="success-icon">✓</div>
            <h1>Transaksi Berhasil</h1>
            <p>Transaksi telah berhasil diproses dan poin member telah dicatat oleh sistem.</p>
        </div>


        <div class="success-body">

            <div class="transaction-number">
                <div class="transaction-number-label">Nomor Transaksi</div>
                <div class="transaction-number-value" id="transactionNumber">-</div>
            </div>

            <div class="summary-grid">
                <div class="summary-item">
                    <div class="summary-label">Member</div>
                    <div class="summary-value" id="memberName">-</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">ID Member</div>
                    <div class="summary-value" id="memberCode">-</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">Tanggal Transaksi</div>
                    <div class="summary-value" id="transactionDate">-</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">Total Item Produk</div>
                    <div class="summary-value" id="totalItems">0 item</div>
                </div>
            </div>


            {{-- TABEL RINCIAN PRODUK --}}
            <div class="product-list">
                <h3 class="product-list-title">Rincian Produk</h3>
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th style="text-align:center;">Qty</th>
                            <th style="text-align:right;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="productListBody">
                        <!-- Data produk akan dimuat oleh JavaScript -->
                    </tbody>
                </table>
            </div>


            <div class="total-box">
                <span class="total-label">Total Transaksi</span>
                <span class="total-value" id="transactionTotal">Rp 0</span>
            </div>

            <div class="point-box">
                <p class="point-label">Poin Diperoleh</p>
                <p class="point-value" id="earnedPoints">0</p>
                <div class="point-unit">poin</div>
            </div>

            <div class="actions">
                <a href="{{ route('kasir.dashboard') }}" class="button button-secondary">
                    Dashboard
                </a>
                
            </div>

        </div>

    </div>

</div>


<script>
    /*
    |--------------------------------------------------------------------------
    | AMBIL DATA DARI SESSION STORAGE
    |--------------------------------------------------------------------------
    */
    const txResultStorage = sessionStorage.getItem('chiamates_tx_result');
    const txStorage = sessionStorage.getItem('chiamates_transaction');

    let successData = {};
    let transaction = {};

    try { if (txResultStorage && txResultStorage !== 'undefined') successData = JSON.parse(txResultStorage); } catch(e) {}
    try { if (txStorage && txStorage !== 'undefined') transaction = JSON.parse(txStorage); } catch(e) {}

    if (Object.keys(successData).length === 0 && Object.keys(transaction).length === 0) {
        alert('Sesi struk hilang. Mengembalikan ke Input Transaksi.');
        window.location.href = "{{ route('kasir.transaction.input') }}";
    }

    /*
    |--------------------------------------------------------------------------
    | FORMATTER
    |--------------------------------------------------------------------------
    */
    function formatRupiah(value) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(Number(value) || 0);
    }

    function formatDate(value) {
        if (!value) return '-';
        const date = new Date(value + 'T00:00:00');
        if (isNaN(date.getTime())) return value;
        return new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: 'long', year: 'numeric' }).format(date);
    }

    /*
    |--------------------------------------------------------------------------
    | AMBIL NILAI (HEADER & TOTAL)
    |--------------------------------------------------------------------------
    */
    const tNumber = successData.transaction_number || transaction.transaction_number || '-';
    const mName = successData.member_name || transaction.member_name || '-';
    const mCode = successData.member_code || transaction.member_code || '-';
    const tDate = successData.transaction_date || transaction.transaction_date || new Date().toISOString().split('T')[0];
    const points = successData.points_earned !== undefined ? successData.points_earned : (successData.points || transaction.points || 0);
    
    let total = Number(successData.total) || Number(successData.amount) || Number(successData.grand_total) || 
                Number(transaction.total) || Number(transaction.subtotal) || 0;

    let totalItems = 0;
    if (transaction.products && Array.isArray(transaction.products)) {
        transaction.products.forEach(p => {
            totalItems += Number(p.qty) || Number(p.quantity) || 1;
            if (total === 0) {
                const price = Number(p.price) || Number(p.harga) || 0;
                total += price * (Number(p.qty) || 1);
            }
        });
    } else {
        totalItems = successData.total_items || 1;
    }

    if (total === 0 && points > 0) total = (points / 100) * 10000;

    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN KE HTML (HEADER)
    |--------------------------------------------------------------------------
    */
    document.getElementById('transactionNumber').textContent = tNumber;
    document.getElementById('memberName').textContent = mName;
    document.getElementById('memberCode').textContent = mCode;
    document.getElementById('transactionDate').textContent = formatDate(tDate);
    document.getElementById('totalItems').textContent = totalItems + ' item';
    document.getElementById('transactionTotal').textContent = formatRupiah(total);
    document.getElementById('earnedPoints').textContent = points;

    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN KE HTML (RINCIAN PRODUK)
    |--------------------------------------------------------------------------
    */
    const tbody = document.getElementById('productListBody');
    tbody.innerHTML = '';

    if (transaction.products && Array.isArray(transaction.products) && transaction.products.length > 0) {
        transaction.products.forEach(p => {
            const name = p.name || p.nama || p.nama_produk || 'Produk';
            const qty = Number(p.qty) || Number(p.quantity) || 1;
            const price = Number(p.price) || Number(p.harga) || 0;
            const subtotal = price * qty;

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>
                    <div class="product-name">${name}</div>
                    <div class="product-price">${formatRupiah(price)}</div>
                </td>
                <td style="text-align:center; font-weight:700; color:#304532;">${qty}</td>
                <td style="text-align:right; font-weight:700; color:#304532;">${formatRupiah(subtotal)}</td>
            `;
            tbody.appendChild(tr);
        });
    } else {
        tbody.innerHTML = `<tr><td colspan="3" style="text-align:center; color:#899489; font-style:italic;">Detail produk tidak tersedia di sesi ini</td></tr>`;
    }

    /*
    |--------------------------------------------------------------------------
    | TOMBOL TRANSAKSI BARU
    |--------------------------------------------------------------------------
    */
    document.getElementById('newTransactionButton').addEventListener('click', function() {
        sessionStorage.removeItem('chiamates_transaction');
        sessionStorage.removeItem('chiamates_calculated_points');
        sessionStorage.removeItem('chiamates_tx_result');
        window.location.href = "{{ route('kasir.transaction.input') }}";
    });
</script>

@endsection