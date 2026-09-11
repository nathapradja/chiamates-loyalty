@extends('kasir.layouts.app')

@section('title', 'Perhitungan Poin')

@section('content')

<style>
    .point-page {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        padding: 32px;
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

    .calculation-grid {
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
        margin-bottom: 20px;
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

    /* TRANSACTION INFO */

    .transaction-info {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 22px;
    }

    .transaction-info-item {
        padding: 13px;
        border: 1px solid #e3ebe0;
        border-radius: 12px;
        background: #fafcf9;
    }

    .transaction-info-label {
        margin-bottom: 5px;
        color: #879287;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .transaction-info-value {
        color: #29422d;
        font-size: 13px;
        font-weight: 800;
        word-break: break-word;
    }

    /* CALCULATION */

    .calculation-box {
        padding: 18px;
        border: 1px solid #e3ebdf;
        border-radius: 14px;
        background: #fafcf9;
        margin-bottom: 20px;
    }

    .calculation-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 11px 0;
        border-bottom: 1px solid #e9eee7;
    }

    .calculation-row:last-child {
        border-bottom: 0;
    }

    .calculation-label {
        color: #788478;
        font-size: 12px;
    }

    .calculation-value {
        color: #304532;
        font-size: 13px;
        font-weight: 800;
        text-align: right;
    }

    .calculation-total {
        margin-top: 4px;
        padding-top: 11px;
        border-top: 1px solid #dfe8da;
    }

    .calculation-total .calculation-label {
        color: #29422d;
        font-weight: 800;
    }

    .calculation-total .calculation-value {
        color: #65ad20;
        font-size: 18px;
    }

    /* REDEEM SECTION */

    .redeem-section {
        margin-bottom: 20px;
    }

    .redeem-section-title {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 14px;
        font-size: 13px;
        font-weight: 800;
        color: #29422d;
    }

    .redeem-section-title .badge-optional {
        padding: 2px 8px;
        background: #f0f4ed;
        border-radius: 20px;
        font-size: 10px;
        color: #7b8a7b;
        font-weight: 700;
    }

    .redeem-tabs {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .redeem-tab {
        padding: 8px 14px;
        border-radius: 20px;
        border: 1px solid #d8e4d4;
        background: #f7faf5;
        color: #527d1d;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s ease;
        white-space: nowrap;
    }

    .redeem-tab:hover {
        background: #edf5e6;
        border-color: #b5d78a;
    }

    .redeem-tab.active {
        background: #65ad20;
        border-color: #65ad20;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(101, 173, 32, .2);
    }

    .redeem-panel {
        display: none;
        padding: 18px;
        background: #f9fcf7;
        border: 1px solid #ddebd5;
        border-radius: 14px;
    }

    .redeem-panel.active {
        display: block;
    }

    .redeem-panel-desc {
        margin: 0 0 14px;
        color: #7b887a;
        font-size: 12px;
        line-height: 1.6;
    }

    .form-label-sm {
        display: block;
        margin-bottom: 7px;
        font-size: 12px;
        font-weight: 700;
        color: #29422d;
    }

    .form-input-sm {
        width: 100%;
        box-sizing: border-box;
        padding: 11px 13px;
        border: 1px solid #d8e4d4;
        border-radius: 10px;
        font-family: inherit;
        font-size: 13px;
        color: #243b27;
        background: #fff;
        outline: none;
        transition: .2s;
    }

    .form-input-sm:focus {
        border-color: #65ad20;
        box-shadow: 0 0 0 3px rgba(101, 173, 32, .1);
    }

    .input-btn-row {
        display: flex;
        gap: 8px;
        margin-top: 10px;
    }

    .btn-verify {
        padding: 11px 18px;
        border: 0;
        border-radius: 10px;
        background: #65ad20;
        color: #fff;
        font-size: 12px;
        font-weight: 800;
        cursor: pointer;
        white-space: nowrap;
        transition: .2s;
    }

    .btn-verify:hover {
        background: #579719;
    }

    .btn-verify:disabled {
        opacity: .6;
        cursor: not-allowed;
    }

    .btn-open-scanner {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 18px;
        border: 1px solid #65ad20;
        border-radius: 10px;
        background: #fff;
        color: #4a8010;
        font-size: 12px;
        font-weight: 800;
        cursor: pointer;
        transition: .2s;
    }

    .btn-open-scanner:hover {
        background: #f2faeb;
    }

    .verify-result {
        display: none;
        margin-top: 14px;
        padding: 14px;
        border-radius: 10px;
        border: 1px solid #d4edda;
        background: #f0faf3;
    }

    .verify-result.error {
        border-color: #f5c6cb;
        background: #fff3f2;
    }

    .verify-result-title {
        font-size: 12px;
        font-weight: 800;
        color: #29422d;
        margin: 0 0 4px;
    }

    .verify-result.error .verify-result-title {
        color: #b91c1c;
    }

    .verify-result-text {
        font-size: 12px;
        color: #4b7a5a;
        margin: 0;
        line-height: 1.5;
    }

    .verify-result.error .verify-result-text {
        color: #b91c1c;
    }

    .discount-hint {
        margin-top: 10px;
        padding: 10px 13px;
        background: #f0faf3;
        border-radius: 10px;
        font-size: 12px;
        color: #3d6e47;
        font-weight: 700;
    }

    /* SCANNER MODAL */

    .scanner-modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,.6);
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }

    .scanner-modal-overlay.show {
        display: flex;
    }

    .scanner-modal {
        background: #fff;
        border-radius: 20px;
        padding: 24px;
        width: 380px;
        max-width: 95vw;
        box-shadow: 0 20px 60px rgba(0,0,0,.25);
    }

    .scanner-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }

    .scanner-modal-title {
        font-size: 16px;
        font-weight: 800;
        color: #18351c;
        margin: 0;
    }

    .btn-close-modal {
        border: 0;
        background: #f0f4ed;
        color: #536153;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        line-height: 1;
    }

    /* RULE */

    .rule-box {
        padding: 15px;
        border-radius: 13px;
        background: #f5f8f3;
        border: 1px solid #e4ebe1;
        margin-bottom: 16px;
    }

    .rule-title {
        margin: 0 0 6px;
        color: #354636;
        font-size: 11px;
        font-weight: 800;
    }

    .rule-text {
        margin: 0;
        color: #7b877a;
        font-size: 11px;
        line-height: 1.7;
    }

    /* POINT RESULT */

    .point-result {
        padding: 26px 22px;
        text-align: center;
        background: #f4faed;
        border: 1px solid #dcebd0;
        border-radius: 16px;
    }

    .point-result-label {
        margin: 0 0 8px;
        color: #718071;
        font-size: 11px;
    }

    .point-result-value {
        margin: 0;
        color: #579719;
        font-size: 40px;
        line-height: 1;
        font-weight: 800;
    }

    .point-result-unit {
        margin-top: 8px;
        color: #6d7d69;
        font-size: 12px;
        font-weight: 700;
    }

    /* STATUS */

    .status-box {
        margin-top: 18px;
        padding: 15px;
        border: 1px solid #e4ebe1;
        border-radius: 13px;
        background: #f5f8f3;
    }

    .status-title {
        margin: 0 0 6px;
        color: #354636;
        font-size: 11px;
        font-weight: 800;
    }

    .status-text {
        margin: 0;
        color: #7b877a;
        font-size: 11px;
        line-height: 1.6;
    }

    /* BUTTON */

    .action-row {
        display: flex;
        gap: 10px;
        margin-top: 22px;
    }

    .button {
        min-height: 45px;
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 14px;
        border-radius: 11px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 800;
        transition: .2s ease;
        box-sizing: border-box;
    }

    .button-primary {
        border: 0;
        background: #65ad20;
        color: #fff;
        cursor: pointer;
        box-shadow: 0 7px 16px rgba(101,173,32,.15);
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

    .button-secondary {
        border: 1px solid #dce7d8;
        background: #fff;
        color: #527d1d;
        cursor: pointer;
    }

    .button-secondary:hover {
        background: #f6f9f4;
    }

    @media (max-width: 800px) {
        .calculation-grid {
            grid-template-columns: 1fr;
        }
        .point-page { padding: 20px 16px; }
    }

    @media (max-width: 560px) {
        .page-header h1 { font-size: 25px; }
        .card-body { padding: 20px; }
        .transaction-info { grid-template-columns: 1fr; }
        .action-row { flex-direction: column; }
        .redeem-tabs { gap: 6px; }
    }
</style>


<div class="point-page">

    <div class="page-header">
        <h1>Perhitungan Poin & Redeem</h1>
        <p>Periksa detail transaksi, pilih opsi pengurangan poin jika ada, lalu simpan transaksi.</p>
    </div>


    <div class="calculation-grid">


        {{-- =====================================================
             DETAIL TRANSAKSI + OPSI REDEEM
        ====================================================== --}}

        <div class="card">

            <div class="card-header">
                <h2>Detail Transaksi</h2>
                <p>Data diambil dari transaksi yang telah diinput.</p>
            </div>


            <div class="card-body">


                {{-- MEMBER --}}

                <div class="member-summary">

                    <div class="member-avatar" id="memberAvatar">M</div>

                    <div>
                        <p class="member-name" id="memberName">Member</p>
                        <p class="member-code" id="memberCode">-</p>
                        <p style="margin:4px 0 0; font-size:12px; font-weight:800; color:#65ad20;">
                            Saldo Poin: <span id="memberPointsBadge">0</span> Poin
                        </p>
                    </div>

                </div>


                {{-- TRANSACTION INFO --}}

                <div class="transaction-info">

                    <div class="transaction-info-item">
                        <div class="transaction-info-label">Nomor Transaksi</div>
                        <div class="transaction-info-value" id="transactionNumber">-</div>
                    </div>

                    <div class="transaction-info-item">
                        <div class="transaction-info-label">Tanggal</div>
                        <div class="transaction-info-value" id="transactionDate">-</div>
                    </div>

                </div>


                {{-- HASIL PERHITUNGAN --}}

                <div class="calculation-box">

                    <div class="calculation-row">
                        <span class="calculation-label">Total Item</span>
                        <span class="calculation-value" id="displayItems">0 item</span>
                    </div>

                    <div class="calculation-row">
                        <span class="calculation-label">Nominal Transaksi</span>
                        <span class="calculation-value" id="displayAmount">Rp 0</span>
                    </div>

                    <div class="calculation-row">
                        <span class="calculation-label">Poin Diperoleh (Transaksi Ini)</span>
                        <span class="calculation-value" id="displayPoints" style="color:#65ad20;">0 poin</span>
                    </div>

                    <div class="calculation-row">
                        <span class="calculation-label">Poin Digunakan / Redeem</span>
                        <span class="calculation-value" id="displayPointsRedeemed" style="color:#d97706;">0 poin</span>
                    </div>

                    <div class="calculation-row calculation-total">
                        <span class="calculation-label">Estimasi Saldo Poin Setelah Transaksi</span>
                        <span class="calculation-value" id="displayTotalPoints">0 poin</span>
                    </div>

                </div>


                {{-- OPSI PENGURANGAN POIN --}}

                <div class="redeem-section">

                    <div class="redeem-section-title">
                        Opsi Penggunaan Poin
                        <span class="badge-optional">Opsional</span>
                    </div>

                    <div class="redeem-tabs">
                        <button type="button" class="redeem-tab active" onclick="switchTab('none')">
                            Tidak Ada
                        </button>
                        <button type="button" class="redeem-tab" onclick="switchTab('direct_point')">
                            Opsi 1: Diskon Poin Langsung
                        </button>
                        <button type="button" class="redeem-tab" onclick="switchTab('resi_code')">
                            Opsi 2: Input No. Resi
                        </button>
                        <button type="button" class="redeem-tab" onclick="switchTab('resi_scan')">
                            Opsi 3: Scan QR Resi
                        </button>
                    </div>

                    {{-- Panel: Tidak Ada --}}
                    <div class="redeem-panel active" id="panel-none">
                        <p class="redeem-panel-desc">
                            Member tidak menukar poin dalam transaksi ini. Poin belanja akan tetap ditambahkan ke akun member.
                        </p>
                    </div>

                    {{-- Panel: Diskon Poin Langsung --}}
                    <div class="redeem-panel" id="panel-direct_point">
                        <p class="redeem-panel-desc">
                            Masukkan jumlah poin yang ingin digunakan sebagai diskon belanja.<br>
                            <strong>1.000 poin = Rp 10.000 diskon</strong>
                        </p>
                        <label class="form-label-sm">Jumlah Poin Yang Digunakan</label>
                        <input
                            type="number"
                            class="form-input-sm"
                            id="directPointInput"
                            min="0"
                            step="100"
                            placeholder="Contoh: 1000"
                            oninput="updateDirectPointDiscount()"
                        >
                        <div class="discount-hint" id="directDiscountHint" style="display:none;">
                            Diskon: <strong id="directDiscountValue">Rp 0</strong>
                        </div>
                        <p id="directPointError" style="display:none; color:#b91c1c; font-size:11px; margin:8px 0 0;"></p>
                    </div>

                    {{-- Panel: Input No Resi --}}
                    <div class="redeem-panel" id="panel-resi_code">
                        <p class="redeem-panel-desc">
                            Masukkan nomor resi checkout reward yang sudah dibuat oleh customer dari halaman Member.
                        </p>
                        <label class="form-label-sm">Nomor Resi Checkout</label>
                        <div class="input-btn-row">
                            <input
                                type="text"
                                class="form-input-sm"
                                id="resiCodeInput"
                                placeholder="Contoh: RDM-20260831-ABCD"
                                style="flex:1;"
                            >
                            <button type="button" class="btn-verify" id="btnVerifyResi" onclick="verifyResi()">
                                Verifikasi
                            </button>
                        </div>
                        <div class="verify-result" id="resiVerifyResult"></div>
                    </div>

                    {{-- Panel: Scan QR Resi --}}
                    <div class="redeem-panel" id="panel-resi_scan">
                        <p class="redeem-panel-desc">
                            Scan QR Code resi checkout yang ditampilkan oleh customer pada layar HP mereka.
                        </p>
                        <button type="button" class="btn-open-scanner" onclick="openResiScanner()">
                            Buka Kamera Scanner
                        </button>
                        <div style="margin-top:12px;">
                            <label class="form-label-sm">Kode Resi Hasil Scan</label>
                            <input
                                type="text"
                                class="form-input-sm"
                                id="resiScanInput"
                                placeholder="Kode akan otomatis terisi setelah scan..."
                                readonly
                            >
                        </div>
                        <div class="verify-result" id="resiScanVerifyResult" style="margin-top:12px;"></div>
                    </div>

                </div>


                {{-- ATURAN --}}

                <div class="rule-box">
                    <p class="rule-title">Aturan Perhitungan Poin</p>
                    <p class="rule-text">
                        Setiap Rp 10.000 transaksi = 100 poin. Minimal transaksi Rp 10.000. Berlaku untuk transaksi walk-in maupun ojol.
                    </p>
                </div>


                {{-- ACTION --}}

                <div class="action-row">

                    <button type="button" class="button button-secondary" id="backButton">
                        ← Kembali
                    </button>

                    <button type="button" class="button button-primary" id="continueButton">
                        Simpan Transaksi
                    </button>

                </div>

            </div>

        </div>


        {{-- =====================================================
             HASIL POIN
        ====================================================== --}}

        <div style="display:flex; flex-direction:column; gap:16px;">

            <div class="card">

                <div class="card-header">
                    <h2>Estimasi Poin</h2>
                    <p>Poin yang akan diterima member setelah transaksi.</p>
                </div>

                <div class="card-body">

                    <div class="point-result">
                        <p class="point-result-label">Poin Diperoleh</p>
                        <p class="point-result-value" id="pointResult">0</p>
                        <div class="point-result-unit">poin dari transaksi ini</div>
                    </div>

                    <div class="status-box">
                        <p class="status-title">Keterangan</p>
                        <p class="status-text" id="calculationStatus">
                            Menyiapkan data transaksi...
                        </p>
                    </div>

                </div>

            </div>

            <div class="card">
                <div class="card-body" style="padding:18px;">
                    <p style="font-size:11px; font-weight:800; color:#29422d; margin:0 0 10px;">Ringkasan Transaksi</p>
                    <div style="font-size:12px; color:#6d796d; line-height:2;">
                        <div style="display:flex; justify-content:space-between;">
                            <span>Poin Sebelum</span>
                            <strong id="summaryPointsBefore">-</strong>
                        </div>
                        <div style="display:flex; justify-content:space-between;">
                            <span>+ Poin Diperoleh</span>
                            <strong style="color:#65ad20;" id="summaryPointsEarned">+0</strong>
                        </div>
                        <div style="display:flex; justify-content:space-between;" id="summaryRedeemRow">
                            <span>- Poin Digunakan</span>
                            <strong style="color:#d97706;" id="summaryPointsRedeemed">-0</strong>
                        </div>
                        <div style="display:flex; justify-content:space-between; border-top:1px solid #e4ebe1; padding-top:8px; margin-top:4px;">
                            <span style="font-weight:800; color:#29422d;">Saldo Akhir</span>
                            <strong style="color:#65ad20; font-size:14px;" id="summaryPointsFinal">-</strong>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


{{-- QR Scanner Modal untuk scan resi --}}
<div class="scanner-modal-overlay" id="resiScannerModal">
    <div class="scanner-modal">
        <div class="scanner-modal-header">
            <p class="scanner-modal-title">📷 Scan QR Resi Checkout</p>
            <button type="button" class="btn-close-modal" onclick="closeResiScanner()">×</button>
        </div>
        <p style="font-size:12px; color:#7b887a; margin:0 0 14px; line-height:1.5;">
            Arahkan kamera ke QR Code resi yang ditampilkan di HP customer.
        </p>
        <div id="resiReader" style="border-radius:12px; overflow:hidden;"></div>
        <p id="resiScanStatus" style="text-align:center; font-size:12px; color:#718071; margin:12px 0 0;"></p>
    </div>
</div>


<script src="https://unpkg.com/html5-qrcode"></script>

<script>

    /*
    |--------------------------------------------------------------------------
    | AMBIL DATA TRANSAKSI DARI SESSION STORAGE
    |--------------------------------------------------------------------------
    */

    const transactionStorage = sessionStorage.getItem('chiamates_transaction');

    if (!transactionStorage) {
        alert('Data transaksi tidak ditemukan. Silakan kembali ke Input Transaksi.');
        window.location.href = "{{ route('kasir.transaction.input') }}";
    }

    let transaction = null;

    try {
        transaction = JSON.parse(transactionStorage);
    } catch (error) {
        sessionStorage.removeItem('chiamates_transaction');
        alert('Data transaksi tidak valid.');
        window.location.href = "{{ route('kasir.transaction.input') }}";
    }


    /*
    |--------------------------------------------------------------------------
    | STATE
    |--------------------------------------------------------------------------
    */

    let currentTab = 'none';
    let earnedPoints = 0;
    let memberCurrentPoints = 0;
    let verifiedRedeemCode = '';
    let verifiedRedeemPoints = 0;
    let resiQrScanner = null;
    let isResiScanning = false;


    /*
    |--------------------------------------------------------------------------
    | HELPER FUNCTIONS
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

    function formatNumber(n) {
        return new Intl.NumberFormat('id-ID').format(n);
    }


    /*
    |--------------------------------------------------------------------------
    | ISI DATA TRANSAKSI
    |--------------------------------------------------------------------------
    */

    if (transaction) {
        memberCurrentPoints = parseInt(transaction.member_points) || 0;

        document.getElementById('memberName').textContent = transaction.member_name || 'Member';
        document.getElementById('memberCode').textContent = 'ID: ' + (transaction.member_code || '-');
        document.getElementById('memberAvatar').textContent = (transaction.member_name || 'M').charAt(0).toUpperCase();
        document.getElementById('memberPointsBadge').textContent = formatNumber(memberCurrentPoints);

        document.getElementById('transactionNumber').textContent = transaction.transaction_number || '-';
        document.getElementById('transactionDate').textContent = formatDate(transaction.transaction_date);

        const products = Array.isArray(transaction.products) ? transaction.products : [];
        let totalItems = 0;
        products.forEach(p => { totalItems += Number(p.qty) || 0; });
        document.getElementById('displayItems').textContent = totalItems + ' item';

        const total = Number(transaction.total) || 0;
        document.getElementById('displayAmount').textContent = formatRupiah(total);

        // Hitung poin: Rp10.000 = 100 poin
        earnedPoints = total >= 10000 ? Math.floor(total / 10000) * 100 : 0;

        document.getElementById('displayPoints').textContent = formatNumber(earnedPoints) + ' poin';
        document.getElementById('pointResult').textContent = formatNumber(earnedPoints);
        document.getElementById('calculationStatus').textContent = 'Perhitungan poin selesai. Pilih opsi penggunaan poin jika diperlukan.';

        updateSummary(0);

        sessionStorage.setItem('chiamates_calculated_points', earnedPoints);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE RINGKASAN POIN
    |--------------------------------------------------------------------------
    */

    function updateSummary(pointsRedeemed) {
        const finalPoints = memberCurrentPoints + earnedPoints - pointsRedeemed;
        document.getElementById('summaryPointsBefore').textContent = formatNumber(memberCurrentPoints) + ' poin';
        document.getElementById('summaryPointsEarned').textContent = '+' + formatNumber(earnedPoints) + ' poin';
        document.getElementById('summaryPointsRedeemed').textContent = '-' + formatNumber(pointsRedeemed) + ' poin';
        document.getElementById('summaryPointsFinal').textContent = formatNumber(Math.max(0, finalPoints)) + ' poin';
        document.getElementById('displayPointsRedeemed').textContent = formatNumber(pointsRedeemed) + ' poin';

        const totalFinalPoints = earnedPoints - pointsRedeemed;
        document.getElementById('displayTotalPoints').textContent = formatNumber(memberCurrentPoints + Math.max(0, totalFinalPoints)) + ' poin';
    }


    /*
    |--------------------------------------------------------------------------
    | TAB SWITCHING
    |--------------------------------------------------------------------------
    */

    function switchTab(tab) {
        currentTab = tab;
        verifiedRedeemCode = '';
        verifiedRedeemPoints = 0;

        // Update tab buttons
        document.querySelectorAll('.redeem-tab').forEach((btn, i) => {
            const tabs = ['none', 'direct_point', 'resi_code', 'resi_scan'];
            btn.classList.toggle('active', tabs[i] === tab);
        });

        // Show/hide panels
        document.querySelectorAll('.redeem-panel').forEach(p => p.classList.remove('active'));
        document.getElementById('panel-' + tab)?.classList.add('active');

        updateSummary(0);
    }


    /*
    |--------------------------------------------------------------------------
    | OPSI 1: DISKON POIN LANGSUNG
    |--------------------------------------------------------------------------
    */

    function updateDirectPointDiscount() {
        const input = parseInt(document.getElementById('directPointInput').value) || 0;
        const discountRupiah = Math.floor(input / 1000) * 10000;
        const hint = document.getElementById('directDiscountHint');
        const errorEl = document.getElementById('directPointError');

        if (input > 0) {
            hint.style.display = 'block';
            document.getElementById('directDiscountValue').textContent = formatRupiah(discountRupiah);
        } else {
            hint.style.display = 'none';
        }

        if (input > memberCurrentPoints) {
            errorEl.textContent = `⚠ Poin tidak mencukupi. Saldo member: ${formatNumber(memberCurrentPoints)} poin.`;
            errorEl.style.display = 'block';
            updateSummary(0);
        } else {
            errorEl.style.display = 'none';
            updateSummary(input);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | OPSI 2: VERIFIKASI RESI CODE (AJAX)
    |--------------------------------------------------------------------------
    */

    function verifyResi() {
        const code = document.getElementById('resiCodeInput').value.trim();
        if (!code) {
            alert('Masukkan nomor resi terlebih dahulu.');
            return;
        }

        const btn = document.getElementById('btnVerifyResi');
        btn.disabled = true;
        btn.textContent = 'Memverifikasi...';

        fetch(`{{ url('/kasir/api/verify-resi') }}/${code}`, {
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        })
        .then(res => res.json())
        .then(data => {
            showResiResult('resiVerifyResult', data, code);
        })
        .catch(() => {
            showResiResult('resiVerifyResult', { success: false, message: 'Gagal terhubung ke server.' }, code);
        })
        .finally(() => {
            btn.disabled = false;
            btn.textContent = 'Verifikasi';
        });
    }


    /*
    |--------------------------------------------------------------------------
    | OPSI 3: SCAN QR RESI
    |--------------------------------------------------------------------------
    */

    function openResiScanner() {
        document.getElementById('resiScannerModal').classList.add('show');
        document.getElementById('resiScanStatus').textContent = 'Menginisialisasi kamera...';

        if (!resiQrScanner) {
            resiQrScanner = new Html5Qrcode('resiReader');
        }

        isResiScanning = false;

        resiQrScanner.start(
            { facingMode: 'environment' },
            { fps: 10, qrbox: { width: 200, height: 200 } },
            (decodedText) => {
                if (isResiScanning) return;
                isResiScanning = true;

                document.getElementById('resiScanInput').value = decodedText;
                document.getElementById('resiScanStatus').textContent = 'Kode terdeteksi! Memverifikasi...';

                // Auto verify
                fetch(`{{ url('/kasir/api/verify-resi') }}/${decodedText}`, {
                    headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                })
                .then(res => res.json())
                .then(data => {
                    showResiResult('resiScanVerifyResult', data, decodedText);
                    closeResiScanner();
                })
                .catch(() => {
                    showResiResult('resiScanVerifyResult', { success: false, message: 'Gagal terhubung ke server.' }, decodedText);
                    closeResiScanner();
                });
            },
            () => {} // fail callback - ignore
        ).then(() => {
            document.getElementById('resiScanStatus').textContent = 'Kamera aktif, arahkan ke QR resi...';
        }).catch(err => {
            document.getElementById('resiScanStatus').textContent = 'Gagal mengakses kamera: ' + err;
        });
    }

    function closeResiScanner() {
        document.getElementById('resiScannerModal').classList.remove('show');
        if (resiQrScanner) {
            resiQrScanner.stop().catch(() => {});
        }
    }


    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN HASIL VERIFIKASI RESI
    |--------------------------------------------------------------------------
    */

    function showResiResult(elementId, data, code) {
        const el = document.getElementById(elementId);
        el.style.display = 'block';

        if (data.success && data.redeem) {
            el.className = 'verify-result';
            el.innerHTML = `
                <p class="verify-result-title">✅ Resi Valid — Reward Ditemukan!</p>
                <p class="verify-result-text">
                    <strong>Reward:</strong> ${data.redeem.reward_name}<br>
                    <strong>Poin Dipotong:</strong> ${formatNumber(data.redeem.points_used)} poin<br>
                    <strong>Checkout oleh:</strong> ${data.redeem.member_name} (${data.redeem.member_code})<br>
                    <strong>Waktu Checkout:</strong> ${data.redeem.created_at}
                </p>
            `;
            verifiedRedeemCode = code;
            verifiedRedeemPoints = data.redeem.points_used;
            updateSummary(verifiedRedeemPoints);
        } else {
            el.className = 'verify-result error';
            el.innerHTML = `
                <p class="verify-result-title">❌ Resi Tidak Valid</p>
                <p class="verify-result-text">${data.message || 'Resi tidak ditemukan atau sudah diproses.'}</p>
            `;
            verifiedRedeemCode = '';
            verifiedRedeemPoints = 0;
            updateSummary(0);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | KEMBALI
    |--------------------------------------------------------------------------
    */

    document.getElementById('backButton').addEventListener('click', function() {
        window.location.href = "{{ route('kasir.transaction.input') }}";
    });


    /*
    |--------------------------------------------------------------------------
    | SIMPAN TRANSAKSI
    |--------------------------------------------------------------------------
    */

    document.getElementById('continueButton').addEventListener('click', function() {
        const btn = this;

        if (!transaction) {
            alert('Data transaksi tidak ditemukan.');
            return;
        }

        const total = Number(transaction.total) || 0;
        if (total <= 0) {
            alert('Total transaksi tidak valid.');
            return;
        }

        // Validasi opsi 1: poin langsung
        if (currentTab === 'direct_point') {
            const directPoints = parseInt(document.getElementById('directPointInput').value) || 0;
            if (directPoints > memberCurrentPoints) {
                alert(`Poin tidak mencukupi. Saldo member: ${formatNumber(memberCurrentPoints)} poin.`);
                return;
            }
        }

        // Validasi opsi 2/3: resi harus sudah diverifikasi
        if (currentTab === 'resi_code' || currentTab === 'resi_scan') {
            if (!verifiedRedeemCode) {
                alert('Silakan verifikasi nomor resi terlebih dahulu sebelum melanjutkan.');
                return;
            }
        }

        // Bangun payload redeem
        let redeemOption = 'none';
        let directPointAmount = 0;
        let directDiscountAmount = 0;
        let redeemCode = '';

        if (currentTab === 'direct_point') {
            redeemOption = 'direct_point';
            directPointAmount = parseInt(document.getElementById('directPointInput').value) || 0;
            directDiscountAmount = Math.floor(directPointAmount / 1000) * 10000;
        } else if (currentTab === 'resi_code') {
            redeemOption = 'resi_code';
            redeemCode = verifiedRedeemCode;
        } else if (currentTab === 'resi_scan') {
            redeemOption = 'resi_scan';
            redeemCode = verifiedRedeemCode;
        }

        btn.disabled = true;
        btn.textContent = 'Menyimpan...';

        // Kirim ke backend
        fetch("{{ route('kasir.transaction.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                member_id: transaction.member_id,
                transaction_number: transaction.transaction_number,
                transaction_type: transaction.transaction_type,
                total: transaction.total,
                points: earnedPoints,
                redeem_option: redeemOption,
                direct_point_amount: directPointAmount,
                direct_discount_amount: directDiscountAmount,
                redeem_code: redeemCode,
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Simpan hasil untuk halaman sukses
                sessionStorage.setItem('chiamates_tx_result', JSON.stringify(data.data));
                
                // BARIS INI DIMATIKAN AGAR RINCIAN PRODUK TERBAWA KE HALAMAN SUKSES
                // sessionStorage.removeItem('chiamates_transaction');
                
                sessionStorage.removeItem('chiamates_calculated_points');
                window.location.href = "{{ route('kasir.transaction.success') }}";
            } else {
                alert('Gagal: ' + (data.message || 'Terjadi kesalahan.'));
                btn.disabled = false;
                btn.textContent = 'Simpan Transaksi';
            }
        })
        .catch(err => {
            console.error(err);
            alert('Terjadi kesalahan jaringan. Silakan coba lagi.');
            btn.disabled = false;
            btn.textContent = 'Simpan Transaksi';
        });

    });

</script>

@endsection