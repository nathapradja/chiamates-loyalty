<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menunggu Persetujuan - CHIAMATES</title>
    <style>
        :root {
            --green: #78B82A;
            --green-dark: #5C941D;
            --text: #26351D;
            --muted: #747C6E;
            --white: #FFFFFF;
            --bg: #F7FAF4;
            --border: #E3EBD9;
            --danger: #E53935;
        }
        
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }
        
        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .waiting-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 40px 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        }
        
        .waiting-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: #FFF8E1;
            color: #F57F17;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }
        
        .waiting-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 12px;
        }
        
        .waiting-desc {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.6;
            margin-bottom: 25px;
        }
        
        .btn-refresh {
            display: block;
            text-decoration: none;
            width: 100%;
            padding: 12px;
            background: var(--green);
            color: var(--white);
            border: none;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s;
            margin-bottom: 15px;
        }
        
        .btn-refresh:hover {
            background: var(--green-dark);
        }
        
        .btn-logout {
            background: transparent;
            border: none;
            color: var(--danger);
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="waiting-card">
        <div class="waiting-icon">⏳</div>
        <div class="waiting-title">Menunggu Persetujuan</div>
        <div class="waiting-desc">
            Akun Anda telah berhasil didaftarkan, namun saat ini sedang <b>ditinjau</b>.<br><br>
            Silakan lapor atau tunjukkan layar ini kepada <b>Kasir CHIAMATES</b> untuk mengaktifkan akun Anda.
        </div>
        
        <a href="{{ route('member.dashboard') }}" class="btn-refresh">
            Cek Status & Masuk Dashboard
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">
                Keluar (Logout)
            </button>
        </form>
    </div>

</body>
</html>