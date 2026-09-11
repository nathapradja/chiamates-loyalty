<?php

use App\Http\Controllers\Kasir\MemberScanController;
use App\Http\Controllers\Member\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CHIAMATES - Web Routes
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('member.landing');
})->name('home');


/*
|--------------------------------------------------------------------------
| LANDING PAGE MEMBER
|--------------------------------------------------------------------------
|
| Halaman ini bisa diakses tanpa login.
|
*/

Route::get('/member-landing', function () {
    return view('member.landing');
})->name('member.landing');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
|
| Setelah login, user diarahkan sesuai role:
|
| admin  → /admin
| kasir  → /kasir
| member → /member
|
*/

Route::get('/dashboard', function () {

    $role = auth()->user()->role;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'kasir' => redirect()->route('kasir.dashboard'),
        'member' => redirect()->route('member.dashboard'),
        default => abort(403),
    };

})->middleware('auth')->name('dashboard');


/*
|--------------------------------------------------------------------------
| MEMBER
|--------------------------------------------------------------------------
*/

Route::get('/member/menunggu-persetujuan', function () {
    // Jika member ternyata sudah aktif, langsung usir ke dashboard
    if (auth()->user()->member && auth()->user()->member->status === 'active') {
        return redirect()->route('member.dashboard');
    }
    
    return view('member.waiting-approval');
})->middleware(['auth', 'role:member'])->name('member.waiting');

Route::middleware([
    'auth',
    'role:member',
    \App\Http\Middleware\CheckMemberActive::class,
])
->prefix('member')
->name('member.')
->group(function () {

    Route::get('/', function () {
        $member = auth()->user()->member;
        if ($member && empty($member->qr_token)) {
            $member->update([
                'qr_token' => \Illuminate\Support\Str::random(32),
                'qr_expires_at' => now()->addMinutes(5),
            ]);
        }
        return view('member.dashboard');
    })->name('dashboard');

    Route::get('/card', function () {
        return view('member.card');
    })->name('card');

    Route::get('/qr-code', function () {
        $member = auth()->user()->member;
        if ($member) {
            if (empty($member->qr_token) || empty($member->qr_expires_at) || $member->qr_expires_at->isPast()) {
                $member->update([
                    'qr_token' => \Illuminate\Support\Str::random(32),
                    'qr_expires_at' => now()->addMinutes(5),
                ]);
            }
            $member->refresh();
        }
        return view('member.qr-code');
    })->name('qr-code');

    Route::get('/profile', [
        ProfileController::class,
        'show',
    ])->name('profile');

    Route::get('/profile/edit', [
        ProfileController::class,
        'edit',
    ])->name('profile.edit');

    Route::put('/profile', [
        ProfileController::class,
        'update',
    ])->name('profile.update');

    Route::get('/points-history', function () {
        $member = auth()->user()->member;
        $pointHistories = $member 
            ? \App\Models\PointHistory::where('member_id', $member->id)->latest()->paginate(15) 
            : collect();
        return view('member.points-history', compact('pointHistories'));
    })->name('points.history');

    Route::get('/rewards', [\App\Http\Controllers\Member\RewardController::class, 'index'])->name('rewards');
    Route::get('/reward/{reward}', [\App\Http\Controllers\Member\RewardController::class, 'show'])->name('reward.detail');
    Route::get('/rewards/{reward}/confirm', [\App\Http\Controllers\Member\RewardController::class, 'confirm'])->name('reward.confirm');
    Route::post('/rewards/reward/checkout', [\App\Http\Controllers\Member\RewardController::class, 'checkout'])->name('reward.checkout');
    Route::get('/rewards/receipt/{code}', [\App\Http\Controllers\Member\RewardController::class, 'receipt'])->name('reward.receipt');
    Route::get('/redeem-history', [\App\Http\Controllers\Member\RewardController::class, 'history'])->name('redeem.history');

    Route::post('/generate-qr', [\App\Http\Controllers\Api\MemberController::class, 'generateQr'])->name('generate.qr');
    Route::get('/api/members/{id}', [\App\Http\Controllers\Api\MemberController::class, 'show']);

});

/*
|--------------------------------------------------------------------------
| LOGIN KASIR
|--------------------------------------------------------------------------
|
| Halaman login kasir bisa diakses sebelum login.
|
*/

Route::middleware('guest')->group(function () {

    Route::get('/kasir/login', function () {
        return view('kasir.login');
    })->name('kasir.login');

});


/*
|--------------------------------------------------------------------------
| KASIR
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:kasir',
])
->prefix('kasir')
->name('kasir.')
->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Kasir
    |--------------------------------------------------------------------------
    */

    Route::get('/', function () {
        return view('kasir.dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profil Kasir
    |--------------------------------------------------------------------------
    */

    Route::get('/profil', function () {
        return view('kasir.profile');
    })->name('profile');


    /*
    |--------------------------------------------------------------------------
    | Registrasi Member
    |--------------------------------------------------------------------------
    */

    Route::get('/registrasi-member', function () {
        return view('kasir.member-register');
    })->name('member.register');


    Route::post('/registrasi-member', [\App\Http\Controllers\Kasir\MemberRegisterController::class, 'store'])->name('member.store');

    /*
    |--------------------------------------------------------------------------
    | Approval Member Pending
    |--------------------------------------------------------------------------
    */
    
    Route::get('/pending-members', function () {
        $pendingMembers = \App\Models\Member::with('user')->where('status', 'pending')->latest()->paginate(15);
        return view('kasir.pending-members', compact('pendingMembers'));
    })->name('pending.members');

    Route::post('/approve-member/{member}', function (\App\Models\Member $member) {
        $member->update(['status' => 'active']);
        return back()->with('success', 'Member berhasil disetujui!');
    })->name('approve.member');

    /*
    |--------------------------------------------------------------------------
    | Input Transaksi
    |--------------------------------------------------------------------------
    */

    Route::get('/transaksi/input', function (\Illuminate\Http\Request $request) {
        $member = null;
        if ($request->has('member_id')) {
            $member = \App\Models\Member::with('user')->find($request->member_id);
        }
        return view('kasir.transaction-input', compact('member'));
    })->name('transaction.input');

    Route::get('/api/verify-resi/{code}', [\App\Http\Controllers\Kasir\TransactionController::class, 'verifyResi'])->name('verify.resi');

    /*
    |--------------------------------------------------------------------------
    | PERHITUNGAN POIN
    |--------------------------------------------------------------------------
    */

    Route::get('/perhitungan-poin', function () {
        return view('kasir.point-calculation');
    })->name('point.calculation');

    /*
    |--------------------------------------------------------------------------
    | konfirmasi transaksi
    |--------------------------------------------------------------------------
    */

    Route::get('/konfirmasi-transaksi', function () {
        return view('kasir.transaction-confirmation');
    })->name('transaction.confirmation');

    /*
    |--------------------------------------------------------------------------
    | transaksi berhasil
    |--------------------------------------------------------------------------
    */

    Route::post('/transaksi/store', [\App\Http\Controllers\Kasir\TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/transaksi/berhasil', function () {
        return view('kasir.transaction-success');
    })->name('transaction.success');

    /*
    |--------------------------------------------------------------------------
    | RIWAYAT TRANSAKSI
    |--------------------------------------------------------------------------
    */

    Route::get('/transaksi/riwayat', function () {
        return view('kasir.transaction-history');
    })->name('transaction.history');

    /*
    |--------------------------------------------------------------------------
    | Data Member
    |--------------------------------------------------------------------------
    */

    Route::get('/members', function () {
        $members = \App\Models\Member::with('user')
            ->latest()
            ->paginate(15);
        return view('kasir.members', compact('members'));
    })->name('members');

    /*
    |--------------------------------------------------------------------------
    | detail member
    |--------------------------------------------------------------------------
    */

    Route::get('/members/{member}', function (\App\Models\Member $member) {
        $member->load('user');
        return view('kasir.member-detail', compact('member'));
    })->name('member.detail');


    /*
    |--------------------------------------------------------------------------
    | Halaman Scan Member
    |--------------------------------------------------------------------------
    */

    Route::get('/scan-member', [
        MemberScanController::class,
        'index',
    ])->name('member.scan');


    /*
    |--------------------------------------------------------------------------
    | Cari Member berdasarkan QR
    |--------------------------------------------------------------------------
    */

    Route::post('/scan-member', [
        MemberScanController::class,
        'find',
    ])->name('member.find');

});

/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/admin/login', function () {
        return view('admin.login');
    })->name('admin.login');

});


Route::middleware([
    'auth',
    'role:admin',
])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Data Member (Admin) - SUDAH DIREVISI
        |--------------------------------------------------------------------------
        */

        Route::get('/members', function (\Illuminate\Http\Request $request) {
            
            $query = \App\Models\Member::with('user')->latest();

            // Fitur Pencarian
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('member_code', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->orWhereHas('user', function($uq) use ($search) {
                          $uq->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
                      });
                });
            }

            $members = $query->paginate(15)->withQueryString();
            
            // Hitung data untuk kartu statistik di atas tabel
            $totalMember = \App\Models\Member::count();
            $activeMember = \App\Models\Member::where('status', 'active')->count();
            $totalPoints = \App\Models\Member::sum('points');

            return view('admin.members', compact('members', 'totalMember', 'activeMember', 'totalPoints'));

        })->name('members');


        Route::get('/members/{member}', function (\App\Models\Member $member) {

            $member->load([
                'user',
            ]);

            return view(
                'admin.member-detail',
                compact('member')
            );

        })->name('member.detail');


        /*
        |--------------------------------------------------------------------------
        | Data Transaksi
        |--------------------------------------------------------------------------
        */

        Route::get('/transactions', function () {
            return view('admin.transactions');
        })->name('transactions');


        /*
        |--------------------------------------------------------------------------
        | Detail Transaksi
        |--------------------------------------------------------------------------
        */

        Route::get('/transactions/{transaction}', function ($transaction) {
            return view(
                'admin.transaction-detail',
                compact('transaction')
            );
        })->name('transaction.detail');


        /*
        |--------------------------------------------------------------------------
        | RIWAYAT POIN
        |--------------------------------------------------------------------------
        */

        Route::get('/points/history', function () {
            return view('admin.points-history');
        })->name('points.history');

        Route::resource('rewards', \App\Http\Controllers\Admin\RewardController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::get('/reports', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
        Route::get('/redeems', function () {
            $redeemHistories = \App\Models\RedeemHistory::with(['member.user', 'reward', 'kasir'])->latest()->paginate(15);
            return view('admin.redeems.index', compact('redeemHistories'));
        })->name('redeems.index');

    });

/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
|
| Login
| Register
| Logout
| Forgot Password
| Reset Password
| Email Verification
|
*/

require __DIR__ . '/auth.php';