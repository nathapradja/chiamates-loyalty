@extends('kasir.layouts.app')

@section('title', 'Input Transaksi')

@section('content')

<style>
    .transaction-page {
        padding: 32px;
    }

    .page-header {
        margin-bottom: 28px;
    }

    .page-eyebrow {
        font-size: 14px;
        font-weight: 800;
        letter-spacing: 1px;
        color: #5b9f19;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .page-title {
        margin: 0;
        font-size: 34px;
        line-height: 1.2;
        font-weight: 800;
        color: #18351c;
    }

    .page-description {
        margin: 10px 0 0;
        color: #718071;
        font-size: 16px;
    }

    .transaction-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(320px, .9fr);
        gap: 24px;
        align-items: start;
    }

    .card {
        background: #ffffff;
        border: 1px solid #e1eadb;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(52, 91, 31, .06);
    }

    .card-header {
        padding: 22px 26px;
        border-bottom: 1px solid #e7eee3;
    }

    .card-title {
        margin: 0;
        color: #18351c;
        font-size: 20px;
        font-weight: 800;
    }

    .card-description {
        margin: 6px 0 0;
        color: #7b887b;
        font-size: 14px;
    }

    .card-body {
        padding: 26px;
    }

    .member-box {
        display: flex;
        gap: 14px;
        align-items: center;
        padding: 18px;
        background: #f5faef;
        border: 1px solid #dcebd0;
        border-radius: 16px;
        margin-bottom: 24px;
    }

    .member-avatar {
        width: 48px;
        height: 48px;
        flex: 0 0 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #6aad20;
        color: white;
        font-size: 20px;
        font-weight: 800;
    }

    .member-info {
        min-width: 0;
    }

    .member-name {
        margin: 0;
        color: #18351c;
        font-weight: 800;
        font-size: 16px;
    }

    .member-code {
        margin: 4px 0 0;
        color: #718071;
        font-size: 13px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #29422d;
        font-size: 14px;
        font-weight: 700;
    }

    .form-input,
    .form-select {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #d8e4d4;
        border-radius: 12px;
        padding: 13px 14px;
        background: #fff;
        color: #243b27;
        font-size: 14px;
        outline: none;
        transition: .2s ease;
    }

    .form-input:focus,
    .form-select:focus {
        border-color: #72b52c;
        box-shadow: 0 0 0 3px rgba(114, 181, 44, .12);
    }

    .form-input::placeholder {
        color: #a1aca1;
    }

    .field-error {
        display: none;
        margin-top: 7px;
        color: #c84b43;
        font-size: 12px;
    }

    .form-input.error {
        border-color: #c84b43;
        box-shadow: 0 0 0 3px rgba(200, 75, 67, .08);
    }

    .product-table-wrapper {
        overflow-x: auto;
        border: 1px solid #e4ece0;
        border-radius: 14px;
    }

    .product-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 620px;
    }

    .product-table th {
        padding: 13px 14px;
        background: #f7faf5;
        color: #687568;
        font-size: 12px;
        font-weight: 800;
        text-align: left;
        text-transform: uppercase;
    }

    .product-table td {
        padding: 12px 14px;
        border-top: 1px solid #edf2ea;
        vertical-align: middle;
    }

    .product-table input {
        width: 100%;
        box-sizing: border-box;
        padding: 10px 11px;
        border: 1px solid #dbe5d8;
        border-radius: 9px;
        outline: none;
        font-family: inherit;
        color: #243b27;
    }

    .product-table input:focus {
        border-color: #72b52c;
        box-shadow: 0 0 0 3px rgba(114, 181, 44, .08);
    }

    .product-subtotal {
        background: #f7faf5 !important;
    }

    .btn-remove {
        width: 36px;
        height: 36px;
        border: 0;
        border-radius: 9px;
        background: #fff1f0;
        color: #c84b43;
        cursor: pointer;
        font-weight: 800;
    }

    .btn-remove:hover {
        background: #ffe3e1;
    }

    .btn-add {
        margin-top: 14px;
        padding: 11px 16px;
        border: 1px dashed #8fbd68;
        border-radius: 10px;
        background: #f8fcf4;
        color: #4f8e18;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-add:hover {
        background: #f0f8e8;
    }

    .summary-card {
        position: sticky;
        top: 24px;
    }

    .summary-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 12px 0;
        color: #6d796d;
        font-size: 14px;
    }

    .summary-row strong {
        color: #243b27;
    }

    .summary-total {
        margin-top: 10px;
        padding-top: 18px;
        border-top: 1px solid #e4ece0;
    }

    .summary-total .summary-row {
        color: #18351c;
        font-size: 18px;
        font-weight: 800;
    }

    .summary-total .summary-row strong {
        font-size: 18px;
    }

    .point-box {
        margin-top: 18px;
        padding: 16px;
        border-radius: 14px;
        background: #f4faec;
        border: 1px solid #dcebd0;
    }

    .point-label {
        color: #718071;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .point-value {
        margin-top: 5px;
        color: #5b9f19;
        font-size: 22px;
        font-weight: 900;
    }

    .point-description {
        margin: 6px 0 0;
        color: #829080;
        font-size: 12px;
        line-height: 1.5;
    }

    .actions {
        display: flex;
        gap: 10px;
        margin-top: 24px;
    }

    .btn {
        flex: 1;
        border: 0;
        border-radius: 12px;
        padding: 13px 16px;
        font-family: inherit;
        font-size: 14px;
        font-weight: 800;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: .2s ease;
    }

    .btn-secondary {
        background: #f0f4ed;
        color: #536153;
    }

    .btn-secondary:hover {
        background: #e5ebe2;
    }

    .btn-primary {
        background: #65ad20;
        color: white;
        box-shadow: 0 8px 18px rgba(101, 173, 32, .18);
    }

    .btn-primary:hover {
        background: #579719;
        transform: translateY(-1px);
    }

    .btn-primary:disabled {
        opacity: .65;
        cursor: not-allowed;
        transform: none;
    }

    @media (max-width: 1000px) {

        .transaction-layout {
            grid-template-columns: 1fr;
        }

        .summary-card {
            position: static;
        }

    }

    @media (max-width: 640px) {

        .transaction-page {
            padding: 20px 16px;
        }

        .page-title {
            font-size: 28px;
        }

        .card-body,
        .card-header {
            padding: 20px;
        }

        .actions {
            flex-direction: column;
        }

    }
</style>


<div class="transaction-page">

    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="page-header">

        <div class="page-eyebrow">
            Kasir CHIAMATES
        </div>

        <h1 class="page-title">
            Input Transaksi
        </h1>

        <p class="page-description">
            Masukkan detail pembelian member untuk menghitung poin transaksi.
        </p>

    </div>


    <div class="transaction-layout">


        {{-- =====================================================
             LEFT
        ====================================================== --}}

        <div>


            {{-- =================================================
                 MEMBER
            ================================================== --}}

            <div class="card">

                <div class="card-header">

                    <h2 class="card-title">
                        Data Member
                    </h2>

                    <p class="card-description">
                        Member yang melakukan transaksi.
                    </p>

                </div>


                <div class="card-body">


                    <div class="member-box">

                        <div class="member-avatar" id="memberAvatarBox">
                            {{ isset($member) ? strtoupper(substr($member->user->name, 0, 1)) : 'M' }}
                        </div>

                        <div class="member-info" style="flex:1;">

                            <p class="member-name" id="selectedMemberName">
                                {{ isset($member) ? $member->user->name : 'Member CHIAMATES' }}
                            </p>

                            <p class="member-code" id="selectedMemberCode">
                                {{ isset($member) ? $member->member_code : 'CM-XXXXXXXX' }}
                            </p>

                            @if(isset($member))
                            <p style="margin:4px 0 0; font-size:12px; font-weight:800; color:#65ad20;">
                                Saldo Poin: <span id="memberPointsDisplay">{{ number_format($member->points) }}</span> Poin
                            </p>
                            @else
                            <p style="margin:4px 0 0; font-size:12px; font-weight:800; color:#65ad20;" id="memberPointsDisplayWrapper">
                                Saldo Poin: <span id="memberPointsDisplay">-</span>
                            </p>
                            @endif

                        </div>

                    </div>

                    {{-- Hidden: member DB ID dan poin (untuk sessionStorage) --}}
                    <input type="hidden" id="memberDbId" value="{{ $member?->id ?? '' }}">
                    <input type="hidden" id="memberPoints" value="{{ $member?->points ?? 0 }}">

                    @if(!isset($member))
                    <div class="form-group">

                        <label
                            for="memberId"
                            class="form-label"
                        >
                            ID Member / Kode Member / Nomor HP
                        </label>

                        <input
                            type="text"
                            id="memberId"
                            class="form-input"
                            placeholder="Masukkan ID member"
                            value="{{ request('member_id') ?? '' }}"
                            autocomplete="off"
                        >

                        <div
                            id="memberError"
                            class="field-error"
                        >
                            ID Member wajib diisi.
                        </div>

                    </div>
                    @else
                    <input type="hidden" id="memberId" value="{{ $member->id }}">
                    @endif


                </div>

            </div>


            {{-- =================================================
                 TRANSACTION
            ================================================== --}}

            <div
                class="card"
                style="margin-top: 24px;"
            >

                <div class="card-header">

                    <h2 class="card-title">
                        Detail Transaksi
                    </h2>

                    <p class="card-description">
                        Masukkan produk dan jumlah pembelian.
                    </p>

                </div>


                <div class="card-body">


                    {{-- NOMOR TRANSAKSI --}}

                    <div class="form-group">

                        <label
                            for="transactionType"
                            class="form-label"
                        >
                            Jenis Transaksi
                        </label>

                        <select id="transactionType" class="form-select">
                            <option value="walk_in">Walk In</option>
                            <option value="ojol">Ojek Online (GoFood/GrabFood/ShopeeFood)</option>
                        </select>

                    </div>


                    {{-- NOMOR TRANSAKSI --}}

                    <div class="form-group">

                        <label
                            for="transactionNumber"
                            class="form-label"
                        >
                            Nomor Transaksi
                        </label>

                        <input
                            type="text"
                            id="transactionNumber"
                            class="form-input"
                            value="TRX-{{ now()->format('Ymd-His') }}"
                            readonly
                        >

                    </div>


                    {{-- TANGGAL --}}

                    <div class="form-group">

                        <label
                            for="transactionDate"
                            class="form-label"
                        >
                            Tanggal Transaksi
                        </label>

                        <input
                            type="date"
                            id="transactionDate"
                            class="form-input"
                            value="{{ now()->format('Y-m-d') }}"
                        >

                    </div>


                    {{-- PRODUK --}}

                    <div class="form-group">

                        <label class="form-label">
                            Produk
                        </label>


                        <div class="product-table-wrapper">

                            <table class="product-table">

                                <thead>

                                    <tr>

                                        <th>
                                            Produk
                                        </th>

                                        <th>
                                            Harga
                                        </th>

                                        <th>
                                            Qty
                                        </th>

                                        <th>
                                            Subtotal
                                        </th>

                                        <th></th>

                                    </tr>

                                </thead>


                                <tbody id="productRows">

                                    <tr>

                                        <td>

                                            <input
                                                type="text"
                                                placeholder="Nama produk"
                                                class="product-name"
                                            >

                                        </td>


                                        <td>

                                            <input
                                                type="number"
                                                min="0"
                                                step="1"
                                                placeholder="0"
                                                class="product-price"
                                            >

                                        </td>


                                        <td>

                                            <input
                                                type="number"
                                                min="1"
                                                step="1"
                                                value="1"
                                                class="product-qty"
                                            >

                                        </td>


                                        <td>

                                            <input
                                                type="text"
                                                value="Rp 0"
                                                readonly
                                                class="product-subtotal"
                                            >

                                        </td>


                                        <td>

                                            <button
                                                type="button"
                                                class="btn-remove"
                                                onclick="removeRow(this)"
                                                title="Hapus produk"
                                            >
                                                ×
                                            </button>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>


                        <button
                            type="button"
                            class="btn-add"
                            onclick="addProductRow()"
                        >
                            + Tambah Produk
                        </button>

                    </div>


                    {{-- CATATAN --}}

                    <div class="form-group">

                        <label
                            for="transactionNote"
                            class="form-label"
                        >
                            Catatan
                        </label>

                        <textarea
                            id="transactionNote"
                            class="form-input"
                            rows="3"
                            placeholder="Catatan transaksi (opsional)"
                        ></textarea>

                    </div>


                </div>

            </div>

        </div>


        {{-- =====================================================
             RIGHT SUMMARY
        ====================================================== --}}

        <div class="card summary-card">

            <div class="card-header">

                <h2 class="card-title">
                    Ringkasan Transaksi
                </h2>

                <p class="card-description">
                    Periksa kembali transaksi sebelum dilanjutkan.
                </p>

            </div>


            <div class="card-body">


                <div class="summary-row">

                    <span>
                        Total Produk
                    </span>

                    <strong id="totalItems">
                        1 item
                    </strong>

                </div>


                <div class="summary-row">

                    <span>
                        Subtotal
                    </span>

                    <strong id="subtotal">
                        Rp 0
                    </strong>

                </div>


                <div class="summary-row">

                    <span>
                        Diskon
                    </span>

                    <strong>
                        Rp 0
                    </strong>

                </div>


                <div class="summary-total">

                    <div class="summary-row">

                        <span>
                            Total Transaksi
                        </span>

                        <strong id="grandTotal">
                            Rp 0
                        </strong>

                    </div>

                </div>


                {{-- POINT --}}

                <div class="point-box">

                    <div class="point-label">
                        Estimasi Poin
                    </div>

                    <div
                        class="point-value"
                        id="estimatedPoints"
                    >
                        Siap dihitung
                    </div>

                    <p class="point-description">
                        Perhitungan poin dilakukan pada halaman
                        Perhitungan Poin setelah transaksi dilanjutkan.
                    </p>

                </div>


                {{-- ACTIONS --}}

                <div class="actions">

                    <a
                        href="{{ route('kasir.dashboard') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>


                    <button
                         
                        type="button"
                        class="btn btn-primary"
                        id="continueButton"
                    >
                        Lanjutkan
                    </button>

                </div>


            </div>

        </div>

    </div>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | FORMAT RUPIAH
    |--------------------------------------------------------------------------
    */

    function formatRupiah(number) {

        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(number);

    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE TRANSACTION
    |--------------------------------------------------------------------------
    */

    function updateTransaction() {

        const rows =
            document.querySelectorAll(
                '#productRows tr'
            );


        let total = 0;

        let totalItems = 0;


        rows.forEach(function(row) {

            const price =
                parseFloat(
                    row.querySelector(
                        '.product-price'
                    )?.value
                ) || 0;


            const qty =
                parseInt(
                    row.querySelector(
                        '.product-qty'
                    )?.value
                ) || 0;


            const rowSubtotal =
                price * qty;


            total += rowSubtotal;

            totalItems += qty;


            const subtotalInput =
                row.querySelector(
                    '.product-subtotal'
                );


            if (subtotalInput) {

                subtotalInput.value =
                    formatRupiah(
                        rowSubtotal
                    );

            }

        });


        document.getElementById(
            'subtotal'
        ).textContent =
            formatRupiah(total);


        document.getElementById(
            'grandTotal'
        ).textContent =
            formatRupiah(total);


        document.getElementById(
            'totalItems'
        ).textContent =
            totalItems + ' item';

    }


    /*
    |--------------------------------------------------------------------------
    | ADD PRODUCT
    |--------------------------------------------------------------------------
    */

    function addProductRow() {

        const tbody =
            document.getElementById(
                'productRows'
            );


        const row =
            document.createElement('tr');


        row.innerHTML = `

            <td>

                <input
                    type="text"
                    placeholder="Nama produk"
                    class="product-name"
                >

            </td>


            <td>

                <input
                    type="number"
                    min="0"
                    step="1"
                    placeholder="0"
                    class="product-price"
                >

            </td>


            <td>

                <input
                    type="number"
                    min="1"
                    step="1"
                    value="1"
                    class="product-qty"
                >

            </td>


            <td>

                <input
                    type="text"
                    value="Rp 0"
                    readonly
                    class="product-subtotal"
                >

            </td>


            <td>

                <button
                    type="button"
                    class="btn-remove"
                    onclick="removeRow(this)"
                    title="Hapus produk"
                >
                    ×
                </button>

            </td>

        `;


        tbody.appendChild(row);


        attachCalculation(row);

        updateTransaction();

    }


    /*
    |--------------------------------------------------------------------------
    | REMOVE PRODUCT
    |--------------------------------------------------------------------------
    */

    function removeRow(button) {

        const rows =
            document.querySelectorAll(
                '#productRows tr'
            );


        if (rows.length <= 1) {

            alert(
                'Minimal harus ada satu produk.'
            );

            return;

        }


        const row =
            button.closest('tr');


        if (row) {

            row.remove();

        }


        updateTransaction();

    }


    /*
    |--------------------------------------------------------------------------
    | CALCULATION EVENTS
    |--------------------------------------------------------------------------
    */

    function attachCalculation(row) {

        row.querySelectorAll(
            '.product-price, .product-qty'
        ).forEach(function(input) {

            input.addEventListener(
                'input',
                updateTransaction
            );

        });

    }


    /*
    |--------------------------------------------------------------------------
    | INITIALIZE
    |--------------------------------------------------------------------------
    */
    const memberInputEl = document.getElementById('memberId');
    
    if (memberInputEl && memberInputEl.type !== 'hidden' && memberInputEl.value.trim() !== '') {
        fetchMemberDetails(memberInputEl.value.trim());
    }

    if (memberInputEl && memberInputEl.type !== 'hidden') {
        memberInputEl.addEventListener('change', function() {
            fetchMemberDetails(this.value.trim());
        });
    }

    function fetchMemberDetails(memberId) {
        if (!memberId) return;
        fetch(`/api/members/${memberId}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('selectedMemberName').textContent = data.member.name;
                    document.getElementById('selectedMemberCode').textContent = data.member.member_code;
                    memberInputEl.dataset.dbId = data.member.id;
                } else {
                    document.getElementById('selectedMemberName').textContent = 'Member Tidak Ditemukan';
                    document.getElementById('selectedMemberCode').textContent = '-';
                    delete memberInputEl.dataset.dbId;
                }
            })
            .catch(() => {
                document.getElementById('selectedMemberName').textContent = 'Gagal memuat API';
            });
    }

    // PASTIKAN SEMUA BARIS PRODUK AWAL TERPASANG KALKULASI
    document.querySelectorAll('#productRows tr').forEach(function(row) {
        attachCalculation(row);
    });

    updateTransaction();


    /*
    |--------------------------------------------------------------------------
    | CONTINUE TO POINT CALCULATION
    |--------------------------------------------------------------------------
    */

    const continueButton =
        document.getElementById(
            'continueButton'
        );


    continueButton.addEventListener(
        'click',
        function() {

            /*
            |--------------------------------------------------------------------------
            | VALIDASI MEMBER
            |--------------------------------------------------------------------------
            */

            const memberInput = document.getElementById('memberId');
            const memberId = memberInput ? memberInput.value.trim() : '';

            const dbId = document.getElementById('memberDbId')?.value || 
                         memberInput?.dataset?.dbId || 
                         memberId;

            const memberError = document.getElementById('memberError');


            if (!memberId) {
                if (memberInput) memberInput.classList.add('error');
                if (memberError) memberError.style.display = 'block';
                if (memberInput) memberInput.focus();
                return;
            }

            if (memberInput) memberInput.classList.remove('error');
            if (memberError) memberError.style.display = 'none';


            /*
            |--------------------------------------------------------------------------
            | AMBIL PRODUK
            |--------------------------------------------------------------------------
            */

            const rows =
                document.querySelectorAll(
                    '#productRows tr'
                );


            const products = [];

            let total = 0;


            rows.forEach(function(row) {

                const name =
                    row.querySelector(
                        '.product-name'
                    )?.value.trim();


                const price =
                    parseFloat(
                        row.querySelector(
                            '.product-price'
                        )?.value
                    ) || 0;


                const qty =
                    parseInt(
                        row.querySelector(
                            '.product-qty'
                        )?.value
                    ) || 0;


                if (
                    name &&
                    price > 0 &&
                    qty > 0
                ) {

                    const subtotal =
                        price * qty;


                    products.push({

                        name: name,

                        price: price,

                        qty: qty,

                        subtotal: subtotal

                    });


                    total += subtotal;

                }

            });


            /*
            |--------------------------------------------------------------------------
            | VALIDASI PRODUK
            |--------------------------------------------------------------------------
            */

            if (products.length === 0) {

                alert(
                    'Masukkan minimal satu produk dengan nama, harga (tidak boleh 0), dan jumlah yang valid.'
                );

                return;

            }


            if (total <= 0) {

                alert(
                    'Total transaksi harus lebih dari Rp 0.'
                );

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | DATA TRANSAKSI
            |--------------------------------------------------------------------------
            */

            const transactionData = {

                member_id: dbId,

                member_code: document.getElementById('selectedMemberCode').textContent,

                member_name: document.getElementById('selectedMemberName').textContent,

                member_points: parseInt(document.getElementById('memberPoints')?.value || '0'),

                transaction_number:
                    document.getElementById(
                        'transactionNumber'
                    ).value,

                transaction_type:
                    document.getElementById(
                        'transactionType'
                    ).value,

                transaction_date:
                    document.getElementById(
                        'transactionDate'
                    ).value,

                transaction_note:
                    document.getElementById(
                        'transactionNote'
                    ).value.trim(),

                products: products,

                subtotal: total,

                discount: 0,

                total: total

            };


            /*
            |--------------------------------------------------------------------------
            | SIMPAN SEMENTARA
            |--------------------------------------------------------------------------
            */

            sessionStorage.setItem(
                'chiamates_transaction',
                JSON.stringify(
                    transactionData
                )
            );


            /*
            |--------------------------------------------------------------------------
            | PINDAH KE PERHITUNGAN POIN
            |--------------------------------------------------------------------------
            */

            window.location.href =
                "{{ route('kasir.point.calculation') }}";

        }
    );

</script>

@endsection