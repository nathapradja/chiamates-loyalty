@extends('kasir.layouts.app')

@section('title', 'Scan Member Kasir')

@section('content')

<style>
    .scan-page {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }

    .scan-header {
        margin-bottom: 24px;
    }

    .scan-header h1 {
        margin: 0 0 6px;
        color: #18351c;
        font-size: 28px;
        font-weight: 850;
    }

    .scan-header p {
        margin: 0;
        color: #718071;
        font-size: 13px;
        line-height: 1.6;
    }

    .scan-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.15fr) minmax(320px, 0.85fr);
        gap: 24px;
        align-items: start;
    }

    .scan-card {
        background: #fff;
        border: 1px solid #e1eadb;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(52, 91, 31, .06);
        overflow: hidden;
    }

    .scan-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #e7eee3;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .scan-card-header h2 {
        margin: 0 0 4px;
        color: #18351c;
        font-size: 17px;
        font-weight: 800;
    }

    .scan-card-header p {
        margin: 0;
        color: #7b887b;
        font-size: 12px;
    }

    .scan-card-body {
        padding: 24px;
    }

    /* Camera Viewport - Dimodifikasi sedikit untuk menampung input scanner */
    .camera-container {
        position: relative;
        width: 100%;
        background: #f4f9ed; /* Ubah dari hitam ke hijau muda agar lebih terang */
        border: 2px dashed #65ad20;
        border-radius: 16px;
        overflow: hidden;
        min-height: 320px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .camera-controls {
        margin-top: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .btn-camera {
        padding: 9px 16px;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.2s ease;
        border: 1px solid #dce3d5;
        background: #ffffff;
        color: #3b5034;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-camera:hover {
        background: #f4f8ed;
        border-color: #78B82A;
    }

    .scan-badge-active {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 10px;
        border-radius: 20px;
        background: #ecfdf5;
        color: #059669;
        font-size: 11px;
        font-weight: 800;
    }

    .scan-badge-pulse {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #10b981;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(0.95); opacity: 0.8; }
        50% { transform: scale(1.3); opacity: 0.4; }
        100% { transform: scale(0.95); opacity: 0.8; }
    }

    /* Result Card */
    .result-empty {
        text-align: center;
        padding: 40px 20px;
        color: #74806e;
    }

    .result-empty-icon {
        width: 68px;
        height: 68px;
        margin: 0 auto 14px;
        border-radius: 18px;
        background: #f0f6e9;
        color: #65ad20;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .member-info-box {
        display: none;
    }

    .member-info-box.active {
        display: block;
    }

    .member-profile-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 16px;
        background: #f4f9ed;
        border-radius: 14px;
        border: 1px solid #dcebd0;
        margin-bottom: 18px;
    }

    .member-avatar-lg {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: #65ad20;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: 900;
        flex-shrink: 0;
    }

    .member-detail-rows {
        margin-bottom: 20px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #eef2eb;
        font-size: 12px;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-row .label {
        color: #74806e;
    }

    .detail-row .value {
        font-weight: 800;
        color: #1e311f;
    }

    .btn-continue-tx {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 13px;
        border-radius: 12px;
        background: linear-gradient(135deg, #65ad20, #549615);
        color: #ffffff;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
        box-shadow: 0 6px 18px rgba(84, 150, 21, 0.25);
        transition: 0.2s ease;
        border: none;
        cursor: pointer;
    }

    .btn-continue-tx:hover {
        background: #4a8710;
        transform: translateY(-1px);
    }

    .alert-error-scan {
        display: none;
        margin-top: 14px;
        padding: 12px 16px;
        border-radius: 10px;
        background: #fff3f2;
        border: 1px solid #f9cecb;
        color: #b91c1c;
        font-size: 12px;
        line-height: 1.5;
    }

    .alert-error-scan.show {
        display: block;
    }

    @media (max-width: 850px) {
        .scan-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="scan-page">

    <div class="scan-header">
        <h1>Scan QR Member</h1>
        <p>Arahkan alat scanner barcode/QR ke kartu member customer untuk memulai transaksi.</p>
    </div>

    <div class="scan-grid">

        {{-- LEFT: PHYSICAL SCANNER --}}
        <div class="scan-card">
            <div class="scan-card-header">
                <div>
                    <h2>Alat Scanner Kasir</h2>
                    <p>Gunakan alat scanner fisik yang terhubung ke perangkat</p>
                </div>
                <div class="scan-badge-active" id="cameraStatusBadge">
                    <span class="scan-badge-pulse"></span>
                    <span id="cameraStatusText">Siap Menerima Scan</span>
                </div>
            </div>

            <div class="scan-card-body">
                {{-- Container yang ukurannya persis sama dengan kamera sebelumnya --}}
                <div class="camera-container" id="cameraWrapper">
                    
                    <div style="font-size: 45px; margin-bottom: 15px;">🔫</div>
                    <h3 style="color: #18351c; font-size: 16px; margin-bottom: 5px; font-weight: 800;">Menunggu Hasil Scan...</h3>
                    <p style="color: #7b887b; font-size: 12px; margin-bottom: 20px;">Tembakkan scanner ke QR Pelanggan</p>

                    {{-- Kotak input ini yang menangkap data dari alat --}}
                    <input 
                        type="text" 
                        id="scannerInput" 
                        autofocus 
                        autocomplete="off"
                        placeholder="Klik di sini sebelum nge-scan" 
                        style="width: 100%; max-width: 250px; padding: 12px; text-align: center; border: 2px solid #65ad20; border-radius: 10px; font-size: 14px; font-weight: bold; color: #18351c; outline: none;"
                    >
                </div>

                <div class="camera-controls">
                    <button type="button" class="btn-camera" onclick="document.getElementById('scannerInput').focus()">
                        Fokuskan Ulang Kotak Scanner
                    </button>
                </div>

                <div class="alert-error-scan" id="scanErrorMessage"></div>
            </div>
        </div>

        {{-- RIGHT: RESULT CARD (TIDAK ADA YANG DIUBAH) --}}
        <div class="scan-card">
            <div class="scan-card-header">
                <div>
                    <h2>Hasil Identifikasi Member</h2>
                    <p>Informasi member yang berhasil di-scan</p>
                </div>
            </div>

            <div class="scan-card-body">

                {{-- Empty state when not scanned yet --}}
                <div class="result-empty" id="resultEmpty">
                    <div class="result-empty-icon">
                        ✓
                    </div>
                    <h3 style="font-size:15px; font-weight:800; color:#253421; margin-bottom:6px;">Belum Ada Member Terdeteksi</h3>
                    <p style="font-size:12px; line-height:1.6; margin:0;">
                        Gunakan alat scanner untuk membaca QR Code member pada HP pelanggan. Sistem akan otomatis mendeteksi dan memvalidasi member.
                    </p>
                </div>

                {{-- Member Info Card (Shown after scan) --}}
                <div class="member-info-box" id="memberInfoBox">
                    <div class="member-profile-header">
                        <div class="member-avatar-lg" id="resAvatar">
                            M
                        </div>
                        <div>
                            <div style="font-size:16px; font-weight:900; color:#18351c;" id="resName">
                                Nama Member
                            </div>
                            <div style="font-size:12px; font-weight:800; color:#65ad20;" id="resCode">
                                CM-XXXXXX
                            </div>
                        </div>
                    </div>

                    <div class="member-detail-rows">
                        <div class="detail-row">
                            <span class="label">ID Member</span>
                            <span class="value" id="resMemberCode">-</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Nomor Telepon</span>
                            <span class="value" id="resPhone">-</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Saldo Poin Saat Ini</span>
                            <span class="value" style="color:#65ad20; font-size:15px;" id="resPoints">0 Poin</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Status Member</span>
                            <span class="value" style="color:#059669;">● Aktif</span>
                        </div>
                    </div>

                    {{-- OPSI REDEEM / TRANSAKSI --}}
                    <div style="margin-bottom: 16px; padding: 14px; background: #fff; border: 1px solid #dcebd0; border-radius: 12px;">
                        <label style="font-size:11px; font-weight:800; color:#18351c; display:block; margin-bottom:8px;">Pilih Opsi Transaksi / Redeem (Opsional):</label>
                        <select id="selectRedeemOption" onchange="toggleRedeemInput()" style="width:100%; height:40px; padding:0 10px; border-radius:8px; border:1px solid #d8e4d4; font-size:12px; outline:none;">
                            <option value="none">-- Opsi 1: Transaksi Normal (Pengurangan Poin di Transaksi) --</option>
                            <option value="resi_code">Opsi 2: Input No Resi Redeem Checkout Customer</option>
                            <option value="resi_scan">Opsi 3: Scan Barcode / QR Resi Redeem Customer</option>
                        </select>

                        <div id="boxResiCode" style="display:none; margin-top:10px;">
                            <input type="text" id="inputResiCode" placeholder="Masukkan Kode Resi (contoh: RDM-20260831-XXXXX)" style="width:100%; height:38px; padding:0 10px; border:1px solid #d8e4d4; border-radius:8px; font-size:12px; box-sizing:border-box;">
                            <button type="button" onclick="verifyResiCode()" style="margin-top:6px; width:100%; padding:8px; background:#65ad20; color:#fff; border:none; border-radius:8px; font-size:12px; font-weight:800; cursor:pointer;">Verifikasi Resi</button>
                        </div>

                        <div id="boxResiScan" style="display:none; margin-top:10px;">
                            <p style="font-size:11px; color:#74806e; margin-bottom:6px;">Scan QR Kode Resi yang tertera di layar HP customer.</p>
                            <button type="button" onclick="openScannerForResi()" style="width:100%; padding:8px; background:#579719; color:#fff; border:none; border-radius:8px; font-size:12px; font-weight:800; cursor:pointer;">Scan QR Resi Sekarang</button>
                        </div>
                    </div>

                    <a href="#" id="btnProceedTx" class="btn-continue-tx">
                        <span>Lanjutkan ke Input Transaksi</span>
                        <span>→</span>
                    </a>
                </div>

            </div>
        </div>

    </div>

</div>

<script>
    const scannerInput = document.getElementById('scannerInput');
    const statusText = document.getElementById('cameraStatusText');

    // Menjaga agar input scanner selalu aktif kecuali saat kasir ngetik nomor resi
    document.addEventListener('click', function(e) {
        if (e.target.tagName !== 'INPUT' && e.target.tagName !== 'SELECT' && e.target.tagName !== 'BUTTON' && e.target.tagName !== 'A') {
            scannerInput.focus();
        }
    });

    // Menangkap tembakan alat scanner
    scannerInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            let qrData = scannerInput.value.trim();
            
            if (qrData !== "") {
                scannerInput.disabled = true;
                statusText.textContent = 'Memvalidasi Member...';
                hideError();
                
                // Panggil API pencarian member
                fetch("{{ route('kasir.member.find') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({ qr_token: qrData })
                })
                .then(res => res.json())
                .then(data => {
                    scannerInput.disabled = false;
                    scannerInput.value = '';
                    scannerInput.focus();

                    if (data.success && data.member) {
                        displayMemberResult(data.member, data.redirect_url);
                    } else {
                        showError(data.message || "Member tidak ditemukan atau QR tidak valid.");
                        statusText.textContent = 'Siap Menerima Scan';
                    }
                })
                .catch(err => {
                    console.error(err);
                    scannerInput.disabled = false;
                    scannerInput.value = '';
                    scannerInput.focus();
                    showError("Terjadi kesalahan saat memvalidasi QR Member.");
                    statusText.textContent = 'Siap Menerima Scan';
                });
            }
        }
    });

    // FUNGSI LAMA: TIDAK ADA YANG DIUBAH
    function displayMemberResult(member, redirectUrl) {
        hideError();
        document.getElementById('resultEmpty').style.display = 'none';
        document.getElementById('memberInfoBox').classList.add('active');

        document.getElementById('resAvatar').textContent = (member.name || 'M').charAt(0).toUpperCase();
        document.getElementById('resName').textContent = member.name;
        document.getElementById('resCode').textContent = member.member_code;
        document.getElementById('resMemberCode').textContent = member.member_code;
        document.getElementById('resPhone').textContent = member.phone || '-';
        document.getElementById('resPoints').textContent = new Intl.NumberFormat('id-ID').format(member.points) + ' Poin';
        
        const btnProceed = document.getElementById('btnProceedTx');
        btnProceed.href = redirectUrl;

        window.activeMemberId = member.id;

        statusText.textContent = '✓ Member Teridentifikasi';
    }

    function toggleRedeemInput() {
        const val = document.getElementById('selectRedeemOption').value;
        document.getElementById('boxResiCode').style.display = val === 'resi_code' ? 'block' : 'none';
        document.getElementById('boxResiScan').style.display = val === 'resi_scan' ? 'block' : 'none';
    }

    function verifyResiCode(codeToVerify) {
        const code = codeToVerify || document.getElementById('inputResiCode').value.trim();
        if (!code) {
            alert('Masukkan kode resi terlebih dahulu.');
            return;
        }

        fetch(`/kasir/api/verify-resi/${code}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert(`Resi Valid! Reward: ${data.reward_name} (${data.points_used} Poin).`);
                    const btnProceed = document.getElementById('btnProceedTx');
                    btnProceed.href = btnProceed.href + `&redeem_code=${data.redeem_code}&discount=${data.points_used}`;
                    document.getElementById('selectRedeemOption').disabled = true;
                } else {
                    alert(data.message || 'Kode resi tidak valid.');
                }
            })
            .catch(err => {
                alert('Gagal memverifikasi resi.');
            });
    }

    function openScannerForResi() {
        const inputResi = document.getElementById('inputResiCode');
        document.getElementById('selectRedeemOption').value = 'resi_code';
        toggleRedeemInput();
        inputResi.focus();
        inputResi.placeholder = "Arahkan & Tembak QR Resi di sini...";
    }

    function showError(msg) {
        const errBox = document.getElementById('scanErrorMessage');
        errBox.textContent = msg;
        errBox.classList.add('show');
    }

    function hideError() {
        const errBox = document.getElementById('scanErrorMessage');
        errBox.textContent = '';
        errBox.classList.remove('show');
    }
</script>

@endsection