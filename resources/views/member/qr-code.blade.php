@extends('member.layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CHIAMATES - QR Member</title>

    <style>

        :root {
            --green: #78B82A;
            --green-dark: #5C941D;
            --green-light: #F2F8E8;

            --orange: #F28C00;
            --red: #E53935;

            --text: #26351D;
            --muted: #747C6E;

            --white: #FFFFFF;
            --bg: #F7FAF4;

            --border: #E3EBD9;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            min-height: 100vh;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            color: var(--text);

            background: var(--bg);
        }


        a {
            text-decoration: none;
            color: inherit;
        }


        button {
            font-family: inherit;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .header {
            width: 100%;

            height: 74px;

            background: var(--white);

            border-bottom:
                1px solid var(--border);

            position: sticky;

            top: 0;

            z-index: 100;
        }


        .header-inner {
            width: 100%;

            max-width: 1180px;

            height: 100%;

            margin: 0 auto;

            padding: 0 25px;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .logo img {
            width: 145px;

            height: auto;

            display: block;
        }


        .logo-text {
            color: var(--green);

            font-size: 25px;

            font-weight: 800;
        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        .nav {
            display: flex;

            align-items: center;

            gap: 8px;
        }


        .nav-link {
            padding:
                9px 13px;

            border-radius: 8px;

            color: var(--muted);

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s;
        }


        .nav-link:hover {
            color: var(--green-dark);

            background:
                var(--green-light);
        }


        .nav-link.active {
            color: var(--green-dark);

            background:
                var(--green-light);
        }


        .logout-form {
            margin: 0;
        }


        .logout-button {
            border: 0;

            background: transparent;

            cursor: pointer;

            padding:
                9px 13px;

            border-radius: 8px;

            color: var(--muted);

            font-size: 13px;

            font-weight: 600;
        }


        .logout-button:hover {
            color: var(--red);

            background:
                #FFF2F1;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            width: 100%;

            max-width: 1180px;

            margin: 0 auto;

            padding:
                38px 25px 60px;
        }


        .page-header {
            text-align: center;

            margin-bottom: 25px;
        }


        .page-label {
            color: var(--green-dark);

            font-size: 12px;

            font-weight: 700;

            margin-bottom: 7px;

            text-transform: uppercase;

            letter-spacing: 0.5px;
        }


        .page-title {
            font-size: 30px;

            line-height: 1.2;

            margin-bottom: 8px;
        }


        .page-description {
            max-width: 560px;

            margin: 0 auto;

            color: var(--muted);

            font-size: 14px;

            line-height: 1.6;
        }


        /* =====================================================
           QR CARD
        ===================================================== */

        .qr-wrapper {
            width: 100%;

            display: flex;

            justify-content: center;

            margin-bottom: 25px;
        }


        .qr-card {
            width: 100%;

            max-width: 450px;

            padding:
                30px 28px;

            background:
                var(--white);

            border:
                1px solid var(--border);

            border-radius: 22px;

            box-shadow:
                0 18px 50px
                rgba(61, 91, 38, 0.10);

            text-align: center;
        }


        .qr-card-title {
            font-size: 18px;

            margin-bottom: 5px;
        }


        .qr-card-subtitle {
            color: var(--muted);

            font-size: 12px;

            line-height: 1.5;

            margin-bottom: 22px;
        }


        /* =====================================================
           QR PLACEHOLDER
        ===================================================== */

        .qr-box {
            width: 245px;

            height: 245px;

            margin:
                0 auto 22px;

            padding: 15px;

            border:
                2px solid var(--green);

            border-radius: 15px;

            background:
                var(--white);

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .qr-placeholder {
            width: 100%;

            height: 100%;

            border-radius: 8px;

            background:
                var(--green-light);

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            gap: 10px;

            color: var(--green-dark);
        }


        .qr-symbol {
            width: 105px;

            height: 105px;

            border:
                8px solid var(--green-dark);

            position: relative;

            background: var(--white);
        }


        .qr-symbol::before {
            content: "";

            position: absolute;

            width: 28px;

            height: 28px;

            left: 9px;

            top: 9px;

            border:
                7px solid var(--green-dark);
        }


        .qr-symbol::after {
            content: "";

            position: absolute;

            width: 22px;

            height: 22px;

            right: 9px;

            bottom: 9px;

            border:
                6px solid var(--green-dark);
        }


        .qr-placeholder-text {
            font-size: 11px;

            font-weight: 700;

            letter-spacing: 0.5px;
        }


        /* =====================================================
           MEMBER INFO
        ===================================================== */

        .member-name {
            font-size: 19px;

            font-weight: 800;

            margin-bottom: 5px;

            word-break: break-word;
        }


        .member-code {
            color: var(--muted);

            font-size: 12px;

            margin-bottom: 20px;
        }


        /* =====================================================
           TIMER
        ===================================================== */

        .timer-box {
            padding:
                13px 15px;

            border-radius: 10px;

            background:
                var(--green-light);

            margin-bottom: 18px;
        }


        .timer-label {
            color: var(--muted);

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: 0.7px;

            margin-bottom: 4px;
        }


        .timer {
            color: var(--green-dark);

            font-size: 20px;

            font-weight: 800;
        }


        .timer-note {
            color: var(--muted);

            font-size: 10px;

            margin-top: 4px;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .button {
            display: inline-block;

            width: 100%;

            padding:
                12px 18px;

            border: 0;

            border-radius: 9px;

            cursor: pointer;

            color: var(--white);

            background:
                var(--green);

            font-size: 13px;

            font-weight: 700;

            transition: 0.2s;
        }


        .button:hover {
            background:
                var(--green-dark);
        }


        .button-secondary {
            margin-top: 10px;

            color: var(--green-dark);

            background:
                var(--white);

            border:
                1px solid var(--border);
        }


        .button-secondary:hover {
            background:
                var(--green-light);
        }


        /* =====================================================
           INFORMATION
        ===================================================== */

        .information {
            width: 100%;

            max-width: 450px;

            margin: 0 auto;

            padding:
                20px 22px;

            border:
                1px solid var(--border);

            border-radius: 14px;

            background:
                var(--white);
        }


        .information h2 {
            font-size: 15px;

            margin-bottom: 8px;
        }


        .information p {
            color: var(--muted);

            font-size: 11px;

            line-height: 1.7;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            padding:
                22px 20px;

            text-align: center;

            border-top:
                1px solid var(--border);

            color: var(--muted);

            background:
                var(--white);

            font-size: 11px;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 800px) {

            .header {
                height: auto;
            }


            .header-inner {
                min-height: 70px;

                flex-wrap: wrap;

                gap: 10px;

                padding-top: 12px;

                padding-bottom: 12px;
            }


            .nav {
                width: 100%;

                overflow-x: auto;
            }

        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 560px) {

            .header-inner {
                padding:
                    14px 17px;
            }


            .logo img {
                width: 125px;
            }


            .nav-link,
            .logout-button {
                padding:
                    8px 9px;

                font-size: 11px;
            }


            .main {
                padding:
                    27px 16px 45px;
            }


            .page-title {
                font-size: 27px;
            }


            .page-description {
                font-size: 13px;
            }


            .qr-card {
                padding:
                    25px 19px;

                border-radius: 18px;
            }


            .qr-box {
                width: 215px;

                height: 215px;

                padding: 13px;
            }


            .qr-symbol {
                width: 90px;

                height: 90px;
            }

        }


        @media (max-width: 360px) {

            .qr-box {
                width: 190px;

                height: 190px;
            }


            .qr-symbol {
                width: 78px;

                height: 78px;
            }

        }

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>


<body>


{{-- =========================================================
     HEADER
========================================================= --}}




{{-- =========================================================
     MAIN
========================================================= --}}

<main class="main">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <section class="page-header">

        <div class="page-label">
            MEMBER CHIAMATES
        </div>


        <h1 class="page-title">
            QR Code Member
        </h1>


        <p class="page-description">

            Tunjukkan QR Code ini kepada kasir
            saat melakukan transaksi.

        </p>

    </section>



    {{-- =====================================================
         QR CARD
    ====================================================== --}}

    <section class="qr-wrapper">

        <div class="qr-card">


            <h2 class="qr-card-title">
                QR Member Kamu
            </h2>


            <p class="qr-card-subtitle">

                Gunakan QR Code ini untuk
                identifikasi member di kasir.

            </p>



            {{-- =================================================
                 QR AREA
            ================================================== --}}

            <div class="qr-box" style="display: flex; align-items: center; justify-content: center; padding: 20px; background: white;">
                {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate(optional(auth()->user()->member)->qr_token ?? optional(auth()->user()->member)->member_code ?? 'NO-TOKEN') !!}
            </div>



            {{-- =================================================
                 MEMBER
            ================================================== --}}

            <div class="member-name">

                {{ auth()->user()->name }}

            </div>


            <div class="member-code">

                ID Member:

                <strong>

                    {{ optional(auth()->user()->member)->member_code ?? '-' }}

                </strong>

            </div>



            {{-- =================================================
                 TIMER
            ================================================== --}}

            <div class="timer-box">

                <div class="timer-label">
                    Masa Berlaku QR
                </div>


                <div
                    class="timer"
                    id="timer"
                >
                    05:00
                </div>


                <div class="timer-note">
                    QR akan diperbarui setelah masa berlaku berakhir.
                </div>

            </div>



            {{-- =================================================
                 REFRESH & DOWNLOAD
            ================================================== --}}

            <button
                type="button"
                class="button"
                id="refreshQr"
            >
                Perbarui QR
            </button>




            <a
                href="{{ route('member.card') }}"
                class="button button-secondary"
                style="display: block;"
            >
                Kembali ke Kartu Member
            </a>


        </div>

    </section>



    {{-- =====================================================
         INFORMATION
    ====================================================== --}}

    <section class="information">

        <h2>
            Cara Menggunakan QR Member
        </h2>


        <p>

            Tunjukkan QR Code kepada kasir
            saat melakukan transaksi.
            QR Code digunakan untuk mengenali
            akun member dan memproses transaksi
            sesuai sistem CHIAMATES.

        </p>

    </section>


</main>






<script>

    /*
    |--------------------------------------------------------------------------
    | TIMER QR 
    |--------------------------------------------------------------------------
    */

    // Mencegat angka dari Laravel dan langsung memaksanya menjadi Integer murni (membuang desimal)
    let rawSeconds = "{{ optional(auth()->user()->member)->qr_expires_at ? max(0, now()->diffInSeconds(optional(auth()->user()->member)->qr_expires_at, false)) : 300 }}";
    let remainingSeconds = parseInt(rawSeconds, 10);
    
    // Jaga-jaga kalau hasilnya NaN
    if (isNaN(remainingSeconds)) {
        remainingSeconds = 0;
    }

    const timerElement = document.getElementById('timer');
    const refreshButton = document.getElementById('refreshQr');

    function updateTimer() {
        
        // Karena remainingSeconds sudah PASTI integer murni, pembagiannya aman
        const minutes = Math.floor(remainingSeconds / 60);
        const seconds = Math.floor(remainingSeconds % 60);

        timerElement.textContent = String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');

        if (remainingSeconds > 0) {
            remainingSeconds--;
        } else {
            timerElement.textContent = '00:00';

            const qrBox = document.querySelector('.qr-box');
            if (qrBox && !document.getElementById('qr-expired-overlay')) {
                qrBox.style.position = 'relative';
                
                const overlay = document.createElement('div');
                overlay.id = 'qr-expired-overlay';
                overlay.style.position = 'absolute';
                overlay.style.inset = '0';
                overlay.style.background = 'rgba(255,255,255,0.9)';
                overlay.style.display = 'flex';
                overlay.style.alignItems = 'center';
                overlay.style.justifyContent = 'center';
                overlay.style.color = '#E53935';
                overlay.style.fontWeight = 'bold';
                overlay.style.fontSize = '14px';
                overlay.style.zIndex = '10';
                overlay.style.borderRadius = '20px';
                overlay.innerHTML = 'QR KADALUARSA<br><span style="font-size:10px; color:#747C6E;">Silakan Perbarui</span>';
                overlay.style.textAlign = 'center';
                
                const svg = qrBox.querySelector('svg');
                if (svg) {
                    svg.style.filter = 'blur(4px)';
                }
                
                qrBox.appendChild(overlay);
            }
        }
    }


    setInterval(updateTimer, 1000);


    refreshButton.addEventListener('click', function () {
        refreshButton.disabled = true;
        refreshButton.textContent = 'Memperbarui...';

        fetch('{{ route('member.generate.qr') }}', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => res.json())
        .then(data => {
             window.location.reload();
        })
        .catch(err => {
            refreshButton.disabled = false;
            refreshButton.textContent = 'Perbarui QR';
            alert('Gagal memperbarui QR Code.');
        });
    });


    updateTimer();

    /*
    |--------------------------------------------------------------------------
    | DOWNLOAD QR
    |--------------------------------------------------------------------------
    */
    const downloadButton = document.getElementById('downloadQr');

    if (downloadButton) {
        downloadButton.addEventListener('click', function() {
            const originalText = downloadButton.textContent;
            downloadButton.textContent = 'Menyimpan...';
            downloadButton.disabled = true;

            const qrElement = document.querySelector('.qr-box');

            html2canvas(qrElement, {
                backgroundColor: '#ffffff',
                scale: 3 
            }).then(canvas => {
                let link = document.createElement('a');
                link.download = 'QR_Member_{{ optional(auth()->user()->member)->member_code ?? 'CHIAMATES' }}.png';
                link.href = canvas.toDataURL("image/png");
                
                link.click();

                downloadButton.textContent = originalText;
                downloadButton.disabled = false;
            }).catch(error => {
                console.error("Gagal menyimpan gambar:", error);
                downloadButton.textContent = 'Gagal, coba lagi';
                setTimeout(() => {
                    downloadButton.textContent = originalText;
                    downloadButton.disabled = false;
                }, 2000);
            });
        });
    }

</script>


</body>

</html>

@endsection