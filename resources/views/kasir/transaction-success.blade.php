@extends('kasir.layouts.app')

@section('title', 'Transaksi Berhasil')

@section('content')

<style>
    /* =================================================================
       TAMPILAN WEB (NORMAL VIEW)
    ================================================================= */
    .success-page {
        width: 100%;
        max-width: 700px;
        margin: 0 auto;
    }

    .success-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e1eadb;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(52, 91, 31, .05);
    }

    .success-top {
        padding: 35px 25px 25px;
        text-align: center;
        background: #f4faed;
        border-bottom: 1px solid #dfead8;
    }

    .success-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #65ad20;
        color: #fff;
        font-size: 28px;
        font-weight: 800;
        box-shadow: 0 8px 15px rgba(101, 173, 32, .15);
    }

    .success-top h1 {
        margin: 0 0 5px;
        color: #29422d;
        font-size: 24px;
        font-weight: 800;
    }

    .success-top p {
        margin: 0;
        color: #718071;
        font-size: 12px;
    }

    .success-body {
        padding: 25px;
    }

    .transaction-number {
        margin-bottom: 20px;
        padding: 12px;
        border: 1px dashed #c2d9b3;
        border-radius: 10px;
        background: #fafcf9;
        text-align: center;
    }

    .transaction-number-label {
        color: #899489;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 3px;
    }

    .transaction-number-value {
        color: #29422d;
        font-size: 16px;
        font-weight: 800;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 20px;
    }

    .summary-item {
        padding: 12px;
        border: 1px solid #e3ebe0;
        border-radius: 10px;
        background: #fff;
    }

    .summary-label {
        margin-bottom: 4px;
        color: #899489;
        font-size: 10px;
        font-weight: 800;
    }

    .summary-value {
        color: #304532;
        font-size: 13px;
        font-weight: 800;
    }

    /* RINCIAN PRODUK */
    .product-list {
        margin-bottom: 20px;
        border: 1px solid #e1eadb;
        border-radius: 10px;
        overflow: hidden;
    }

    .product-list-title {
        margin: 0;
        padding: 12px 15px;
        background: #f4faed;
        border-bottom: 1px solid #e1eadb;
        font-size: 11px;
        font-weight: 800;
        color: #29422d;
    }

    .product-table {
        width: 100%;
        border-collapse: collapse;
    }

    .product-table th, .product-table td {
        padding: 10px 15px;
        font-size: 12px;
        border-bottom: 1px solid #e1eadb;
    }

    .product-table th {
        text-align: left;
        color: #899489;
        font-size: 10px;
    }

    .product-table tbody tr:last-child td {
        border-bottom: none;
    }

    .total-box {
        display: flex;
        justify-content: space-between;
        padding: 15px;
        border-top: 1px solid #e3ebe0;
        border-bottom: 1px solid #e3ebe0;
        margin-bottom: 20px;
    }

    .total-label { color: #647164; font-weight: 700; font-size: 13px; }
    .total-value { color: #29422d; font-weight: 800; font-size: 18px; }

    /* QR & POINT */
    .promo-grid {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 15px;
        margin-bottom: 25px;
    }

    .point-box {
        padding: 15px;
        border: 1px solid #dcebd0;
        border-radius: 12px;
        background: #f4faed;
        text-align: center;
    }

    .point-label { margin: 0 0 5px; color: #718071; font-size: 10px; font-weight: 700; }
    .point-value { margin: 0; color: #579719; font-size: 24px; font-weight: 800; line-height: 1; }

    .qr-box {
        padding: 15px;
        border: 1px dashed #b5d78a;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .qr-box img {
        width: 60px;
        height: 60px;
        border: 1px solid #e1eadb;
        padding: 3px;
        border-radius: 6px;
    }

    .qr-text p { margin: 0 0 3px; font-weight: 800; font-size: 13px; color: #29422d; }
    .qr-text span { font-size: 10px; color: #718071; line-height: 1.3; }

    /* TOMBOL AKSI YANG SUDAH DIPERBAIKI */
    .kasir-actions {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 24px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 800;
        cursor: pointer;
        text-decoration: none;
        transition: 0.2s;
    }

    /* Membatasi ukuran icon SVG agar tidak raksasa */
    .btn-action svg {
        width: 18px;
        height: 18px;
    }

    .btn-print {
        border: 1px solid #7BAF24;
        background: #fff;
        color: #5E8D18;
    }

    .btn-print:hover { background: #EEF6DF; }

    .btn-done {
        border: 1px solid #7BAF24;
        background: #7BAF24;
        color: #fff;
    }

    .btn-done:hover { background: #5E8D18; }


    /* =================================================================
       MODE CETAK (STRUK KASIR THERMAL POLOS)
    ================================================================= */
    .receipt-print-only {
        display: none; /* Sembunyikan dari layar web */
    }

    @media print {
        @page {
            margin: 0; 
        }
        
        body {
            margin: 0;
            padding: 0;
            background: #fff !important;
        }

        /* Sembunyikan seluruh tampilan web */
        .kasir-sidebar, 
        .kasir-topbar, 
        .success-page {
            display: none !important;
        }

        /* Tampilkan khusus area struk */
        .receipt-print-only {
            display: block;
            width: 80mm; /* Ukuran kertas struk standar */
            margin: 0 auto;
            padding: 5mm;
            font-family: 'Courier New', Courier, monospace; /* Font struk */
            font-size: 12px;
            color: #000;
            background: #fff;
            position: absolute;
            top: 0;
            left: 0;
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 10px;
        }
        
        .receipt-title {
            font-size: 16px;
            font-weight: bold;
        }

        .divider {
            border-bottom: 1px dashed #000;
            margin: 8px 0;
        }

        .receipt-table {
            width: 100%;
            font-size: 12px;
        }

        .receipt-table td {
            vertical-align: top;
            padding: 2px 0;
        }

        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .font-bold { font-weight: bold; }
        
        .qr-print {
            margin: 15px auto 5px;
            text-align: center;
        }
        
        .qr-print img {
            width: 80px;
            height: 80px;
        }
    }
</style>


{{-- TAMPILAN WEB (Disembunyikan saat di-print) --}}
<div class="success-page">
    <div class="success-card">
        <div class="success-top">
            <div class="success-icon">✓</div>
            <h1>Transaksi Berhasil</h1>
            <p>Transaksi telah berhasil diproses dan poin member dicatat.</p>
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
                    <div class="summary-label">Total Item</div>
                    <div class="summary-value" id="totalItems">0 item</div>
                </div>
            </div>

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
                        <!-- Dimuat oleh JS -->
                    </tbody>
                </table>
            </div>

            <div class="total-box">
                <span class="total-label">Total Transaksi</span>
                <span class="total-value" id="transactionTotal">Rp 0</span>
            </div>

            <div class="promo-grid">
                <div class="point-box">
                    <p class="point-label">Poin Didapat</p>
                    <p class="point-value" id="earnedPoints">0</p>
                </div>
                <div class="qr-box">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ urlencode(url('/')) }}" alt="QR Code">
                    <div class="qr-text">
                        <p>Belum jadi member?</p>
                        <span>Scan QR Code ini untuk daftar dan kumpulkan poin!</span>
                    </div>
                </div>
            </div>

            <div class="kasir-actions">
                <button onclick="window.print()" class="btn-action btn-print">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Cetak Struk
                </button>

                <a href="#" id="newTransactionButton" class="btn-action btn-done">
                    Selesai & Transaksi Baru
                </a>
            </div>
        </div>
    </div>
</div>


{{-- TAMPILAN STRUK THERMAL (Hanya muncul saat cetak) --}}
<div class="receipt-print-only">
    <div class="receipt-header">
        <div class="receipt-title">CHIAMATES</div>
        <div>Loyalty System</div>
    </div>
    
    <div class="divider"></div>
    
    <table class="receipt-table">
        <tr><td width="35%">No. Trans</td><td width="5%">:</td><td id="pTransactionNumber"></td></tr>
        <tr><td>Tanggal</td><td>:</td><td id="pTransactionDate"></td></tr>
        <tr><td>Member</td><td>:</td><td id="pMemberName"></td></tr>
        <tr><td>ID Member</td><td>:</td><td id="pMemberCode"></td></tr>
    </table>
    
    <div class="divider"></div>
    
    <table class="receipt-table" id="pProductListBody">
        <!-- Rincian Produk Struk Dimuat JS -->
    </table>
    
    <div class="divider"></div>
    
    <table class="receipt-table">
        <tr>
            <td class="font-bold">TOTAL</td>
            <td class="text-right font-bold" id="pTransactionTotal"></td>
        </tr>
    </table>
    
    <div class="divider"></div>
    
    <div class="text-center" style="margin-top: 10px;">
        Poin Diperoleh: <b id="pEarnedPoints"></b>
    </div>
    
    <div class="qr-print">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ urlencode(url('/')) }}" alt="QR Code">
        <div style="font-size: 10px; margin-top: 3px;">Scan QR untuk jadi Member</div>
    </div>
    
    <div class="text-center" style="margin-top: 15px; font-size: 10px;">
        Terima kasih atas kunjungan Anda
    </div>
</div>


<script>
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

    function formatRupiah(value) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(Number(value) || 0);
    }

    function formatDate(value) {
        if (!value) return '-';
        const date = new Date(value + 'T00:00:00');
        if (isNaN(date.getTime())) return value;
        return new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: 'long', year: 'numeric' }).format(date);
    }

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

    /* Isi Data Tampilan Web */
    document.getElementById('transactionNumber').textContent = tNumber;
    document.getElementById('memberName').textContent = mName;
    document.getElementById('memberCode').textContent = mCode;
    document.getElementById('transactionDate').textContent = formatDate(tDate);
    document.getElementById('totalItems').textContent = totalItems + ' item';
    document.getElementById('transactionTotal').textContent = formatRupiah(total);
    document.getElementById('earnedPoints').textContent = points;

    /* Isi Data Tampilan Struk Kertas */
    document.getElementById('pTransactionNumber').textContent = tNumber;
    document.getElementById('pMemberName').textContent = mName;
    document.getElementById('pMemberCode').textContent = mCode;
    document.getElementById('pTransactionDate').textContent = formatDate(tDate);
    document.getElementById('pTransactionTotal').textContent = formatRupiah(total);
    document.getElementById('pEarnedPoints').textContent = points;

    /* Looping Produk untuk Web dan Kertas Struk */
    const tbody = document.getElementById('productListBody');
    const ptbody = document.getElementById('pProductListBody');
    tbody.innerHTML = '';
    ptbody.innerHTML = '';

    if (transaction.products && Array.isArray(transaction.products) && transaction.products.length > 0) {
        transaction.products.forEach(p => {
            const name = p.name || p.nama || p.nama_produk || 'Produk';
            const qty = Number(p.qty) || Number(p.quantity) || 1;
            const price = Number(p.price) || Number(p.harga) || 0;
            const subtotal = price * qty;

            /* Render Web */
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>
                    <div class="product-name">${name}</div>
                    <div style="font-size: 11px; color: #718071;">${formatRupiah(price)}</div>
                </td>
                <td style="text-align:center; font-weight:700;">${qty}</td>
                <td style="text-align:right; font-weight:700;">${formatRupiah(subtotal)}</td>
            `;
            tbody.appendChild(tr);

            /* Render Kertas Struk */
            const ptr1 = document.createElement('tr');
            ptr1.innerHTML = `<td colspan="2">${name}</td>`;
            
            const ptr2 = document.createElement('tr');
            ptr2.innerHTML = `
                <td style="padding-bottom: 5px;">${qty} x ${formatRupiah(price)}</td>
                <td class="text-right" style="padding-bottom: 5px;">${formatRupiah(subtotal)}</td>
            `;
            ptbody.appendChild(ptr1);
            ptbody.appendChild(ptr2);
        });
    } else {
        tbody.innerHTML = `<tr><td colspan="3" style="text-align:center;">Tidak ada rincian</td></tr>`;
        ptbody.innerHTML = `<tr><td colspan="2" class="text-center">Tidak ada rincian</td></tr>`;
    }

    document.getElementById('newTransactionButton').addEventListener('click', function(e) {
        e.preventDefault();
        sessionStorage.removeItem('chiamates_transaction');
        sessionStorage.removeItem('chiamates_calculated_points');
        sessionStorage.removeItem('chiamates_tx_result');
        window.location.href = "{{ route('kasir.transaction.input') }}";
    });
</script>

@endsection