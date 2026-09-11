@extends('member.layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CHIAMATES - Daftar Reward</title>

    <style>

        :root {
            --green: #78B82A;
            --green-dark: #5C941D;
            --green-light: #F2F8E8;

            --orange: #F28C00;

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

            background: var(--green-light);
        }


        .nav-link.active {
            color: var(--green-dark);

            background: var(--green-light);
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
            color: #E53935;

            background: #FFF2F1;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            width: 100%;

            max-width: 1180px;

            margin: 0 auto;

            padding:
                38px 25px 90px; /* Padding bottom diubah agar tidak tertutup sticky bar */
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {
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
            color: var(--muted);

            font-size: 14px;

            line-height: 1.6;
        }


        /* =====================================================
           POINTS BAR
        ===================================================== */

        .points-card {
            margin-bottom: 25px;

            padding:
                20px 24px;

            border:
                1px solid var(--border);

            border-radius: 16px;

            background: var(--white);

            box-shadow:
                0 10px 30px
                rgba(61, 91, 38, 0.07);

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;
        }


        .points-label {
            color: var(--muted);

            font-size: 11px;

            font-weight: 600;

            margin-bottom: 5px;
        }


        .points-value {
            color: var(--green-dark);

            font-size: 25px;

            font-weight: 800;
        }


        .points-unit {
            color: var(--muted);

            font-size: 12px;

            margin-left: 4px;
        }


        .history-link {
            color: var(--green-dark);

            background: var(--green-light);

            border:
                1px solid var(--border);

            padding:
                10px 15px;

            border-radius: 9px;

            font-size: 11px;

            font-weight: 700;

            white-space: nowrap;
        }


        .history-link:hover {
            background: #E9F4DA;
        }


        /* =====================================================
           REWARD GRID
        ===================================================== */

        .reward-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 20px;
        }


        .reward-card {
            background: var(--white);

            border:
                1px solid var(--border);

            border-radius: 17px;

            overflow: hidden;

            box-shadow:
                0 12px 35px
                rgba(61, 91, 38, 0.08);

            transition:
                transform 0.2s,
                box-shadow 0.2s;
        }


        .reward-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 16px 40px
                rgba(61, 91, 38, 0.12);
        }


        /* =====================================================
           REWARD IMAGE
        ===================================================== */

        .reward-image {
            width: 100%;

            height: 175px;

            background:
                linear-gradient(
                    135deg,
                    #F2F8E8,
                    #E7F1D9
                );

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--green-dark);

            font-size: 42px;

            font-weight: 800;

            overflow: hidden;
        }


        .reward-image img {
            width: 100%;

            height: 100%;

            object-fit: cover;
        }


        /* =====================================================
           REWARD CONTENT
        ===================================================== */

        .reward-content {
            padding: 20px;
        }


        .reward-title {
            font-size: 16px;

            font-weight: 800;

            line-height: 1.4;

            margin-bottom: 7px;
        }


        .reward-description {
            min-height: 38px;

            color: var(--muted);

            font-size: 11px;

            line-height: 1.6;

            margin-bottom: 15px;
        }


        .reward-bottom {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;
        }


        .reward-points {
            color: var(--green-dark);

            font-size: 13px;

            font-weight: 800;

            white-space: nowrap;
        }


        .reward-points span {
            color: var(--muted);

            font-size: 10px;

            font-weight: 600;
        }

        /* =====================================================
           CART & CHECKOUT SYSTEM (NEW REVISIONS)
        ===================================================== */
        .reward-bottom-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px dashed var(--border);
        }
        .custom-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 700;
            color: var(--green-dark);
            user-select: none;
        }
        .custom-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--green);
        }
        .qty-input {
            width: 65px;
            padding: 8px 10px;
            border: 1px solid var(--border);
            border-radius: 8px;
            text-align: center;
            font-weight: 800;
            font-size: 13px;
            color: var(--text);
            outline: none;
        }
        .qty-input:focus { border-color: var(--green); }
        .qty-input:disabled { background: var(--bg); cursor: not-allowed; }
        
        .checkout-sticky-bar {
            position: fixed;
            bottom: 0;
            left: var(--sidebar-width);
            right: 0;
            background: var(--white);
            padding: 16px 28px;
            border-top: 1px solid var(--border);
            box-shadow: 0 -10px 30px rgba(0,0,0,0.03);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 90;
            transition: left 0.25s ease;
        }
        .member-app.sidebar-collapsed .checkout-sticky-bar { left: var(--sidebar-collapsed); }
        
        .btn-checkout {
            padding: 12px 24px;
            background: var(--green);
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-weight: 800;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-checkout:hover:not(:disabled) { background: var(--green-dark); transform: translateY(-2px); }
        .btn-checkout:disabled { background: #dce5d7; color: #a0a79a; cursor: not-allowed; }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty {
            grid-column: 1 / -1;

            padding:
                65px 25px;

            text-align: center;

            background: var(--white);

            border:
                1px solid var(--border);

            border-radius: 17px;
        }


        .empty-icon {
            width: 62px;

            height: 62px;

            margin:
                0 auto 15px;

            border-radius: 50%;

            background: var(--green-light);

            color: var(--green-dark);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 24px;

            font-weight: 800;
        }


        .empty-title {
            font-size: 16px;

            font-weight: 800;

            margin-bottom: 7px;
        }


        .empty-description {
            max-width: 400px;

            margin: 0 auto;

            color: var(--muted);

            font-size: 12px;

            line-height: 1.6;
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

            background: var(--white);

            font-size: 11px;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 900px) {

            .reward-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


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

            .checkout-sticky-bar { left: 0; }

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
                height: 72px;
                object-fit: contain;
                object-position: center;
            }


            .nav-link,
            .logout-button {
                padding:
                    8px 9px;

                font-size: 11px;
            }


            .main {
                padding:
                    27px 16px 85px; /* Sesuaikan untuk sticky bar di mobile */
            }


            .page-title {
                font-size: 27px;
            }


            .page-description {
                font-size: 13px;
            }


            .points-card {
                padding:
                    18px;

                align-items: flex-start;

                flex-direction: column;
            }


            .history-link {
                width: 100%;

                text-align: center;
            }


            .reward-grid {
                grid-template-columns: 1fr;

                gap: 15px;
            }


            .reward-image {
                height: 190px;
            }


            .reward-content {
                padding: 18px;
            }

            .checkout-sticky-bar { padding: 15px; }
            .checkout-sticky-bar .total-label { font-size: 10px; }
            .checkout-sticky-bar .total-points { font-size: 18px; }

        }

    </style>

</head>


<body>


{{-- =========================================================
     HEADER
========================================================= --}}




{{-- =========================================================
     MAIN
========================================================= --}}

<main class="main">


    {{-- PAGE HEADER --}}

    <section class="page-header">

        <div class="page-label">
            MEMBER CHIAMATES
        </div>


        <h1 class="page-title">
            Daftar Reward
        </h1>


        <p class="page-description">

            Tukarkan poin kamu dengan berbagai
            reward menarik dari CHIAMATES.

        </p>

    </section>

    {{-- Error Session --}}
    @if(session('error'))
        <div style="background: #FFF3F3; color: var(--danger); padding: 14px; border-radius: 12px; margin-bottom: 25px; font-size: 13px; font-weight: 700; border: 1px solid #ffcdd2;">
            {{ session('error') }}
        </div>
    @endif

    {{-- =====================================================
         POINTS
    ====================================================== --}}

    <section class="points-card">


        <div>

            <div class="points-label">
                POIN KAMU
            </div>


            <div class="points-value">

                {{ number_format(optional(auth()->user()->member)->points ?? 0, 0, ',', '.') }}

                <span class="points-unit">
                    Poin
                </span>

            </div>

        </div>


        <a
            href="{{ route('member.points.history') }}"
            class="history-link"
        >
            Lihat Riwayat Poin
        </a>


    </section>



    {{-- =====================================================
         REWARD GRID & FORM CART
    ====================================================== --}}

    @php
        $rewards = $rewards ?? collect();
    @endphp

    <form action="{{ route('member.reward.checkout') }}" method="POST" id="checkoutForm">
        @csrf

        <section class="reward-grid">


            @if ($rewards->count() > 0)


                @foreach ($rewards as $reward)

                    <article class="reward-card">


                        <div class="reward-image">

                            @if (!empty($reward->image))

                                <img
                                    src="{{ asset('storage/' . $reward->image) }}"
                                    alt="{{ $reward->name }}"
                                >

                            @else

                                R

                            @endif

                        </div>


                        <div class="reward-content">


                            <h2 class="reward-title">

                                {{ $reward->name }}

                            </h2>


                            <p class="reward-description">

                                {{ $reward->description ?? 'Reward menarik untuk member CHIAMATES.' }}

                            </p>


                            <div class="reward-bottom">


                                <div class="reward-points" data-price="{{ $reward->points_required ?? 0 }}">

                                    {{ number_format($reward->points_required ?? 0, 0, ',', '.') }}

                                    <span>
                                        Poin
                                    </span>

                                </div>

                                <div style="font-size: 11px; color: var(--muted); font-weight: 700;">
                                    Stok: {{ $reward->stock ?? 0 }}
                                </div>


                            </div>

                            <!-- Fitur Checkbox dan Quantity untuk Keranjang -->
                            <div class="reward-bottom-actions">
                                <label class="custom-checkbox">
                                    <input type="checkbox" name="selected_rewards[]" value="{{ $reward->id }}" class="reward-cb" onchange="calculateTotal()" {{ ($reward->stock ?? 0) <= 0 ? 'disabled' : '' }}>
                                    Pilih Reward
                                </label>
                                
                                <input type="number" name="quantities[{{ $reward->id }}]" value="1" min="1" max="{{ $reward->stock ?? 0 }}" class="qty-input" onchange="calculateTotal()" {{ ($reward->stock ?? 0) <= 0 ? 'disabled' : '' }}>
                            </div>

                        </div>


                    </article>

                @endforeach


            @else


                <div class="empty">


                    <div class="empty-icon">
                        R
                    </div>


                    <div class="empty-title">
                        Reward Belum Tersedia
                    </div>


                    <p class="empty-description">

                        Saat ini belum ada reward yang
                        tersedia. Reward yang tersedia
                        nantinya akan muncul di halaman ini.

                    </p>


                </div>


            @endif


        </section>

        <!-- STICKY CHECKOUT BAR -->
        @if ($rewards->count() > 0)
        <div class="checkout-sticky-bar" id="checkoutBar">
            <div>
                <div class="total-label" style="font-size: 11px; color: var(--muted); font-weight: 700; margin-bottom: 4px;">TOTAL POIN DIBUTUHKAN</div>
                <div class="total-points" style="font-size: 22px; font-weight: 800; color: var(--green-dark);" id="totalPointsDisplay">0 Poin</div>
            </div>
            <button type="submit" class="btn-checkout" id="btnCheckout" disabled>Konfirmasi Checkout</button>
        </div>
        @endif

    </form>


</main>





<script>
    function calculateTotal() {
        let total = 0;
        let anyChecked = false;
        const checkboxes = document.querySelectorAll('.reward-cb');

        checkboxes.forEach(cb => {
            if (cb.checked) {
                anyChecked = true;
                const card = cb.closest('.reward-card');
                const price = parseInt(card.querySelector('.reward-points').dataset.price) || 0;
                const qty = parseInt(card.querySelector('.qty-input').value) || 0;
                
                const finalQty = qty > 0 ? qty : 1; 
                total += (price * finalQty);
            }
        });

        document.getElementById('totalPointsDisplay').innerText = total.toLocaleString('id-ID') + ' Poin';
        document.getElementById('btnCheckout').disabled = !anyChecked;
    }
</script>

</body>

</html>

@endsection