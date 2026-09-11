<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\PointHistory;
use App\Models\RedeemHistory;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $dateFrom = $request->input('date_from');
        $dateTo   = $request->input('date_to');

        // Query Transaksi
        $txQuery = Transaction::with(['member.user', 'kasir']);
        if ($dateFrom) {
            $txQuery->whereDate('created_at', '>=', $dateFrom);
        }
        if ($dateTo) {
            $txQuery->whereDate('created_at', '<=', $dateTo);
        }
        $transactions    = $txQuery->latest()->paginate(15, ['*'], 't_page')->withQueryString();
        $totalTransaksi = $txQuery->toBase()->count();
        $totalOmzet      = $txQuery->toBase()->sum('total_amount');
        $totalPoinDiberi = $txQuery->toBase()->sum('points_earned');

        // Query Member Baru
        $memQuery = Member::with('user');
        if ($dateFrom) {
            $memQuery->whereDate('created_at', '>=', $dateFrom);
        }
        if ($dateTo) {
            $memQuery->whereDate('created_at', '<=', $dateTo);
        }
        $members      = $memQuery->latest()->paginate(15, ['*'], 'm_page')->withQueryString();
        $totalMember = $memQuery->toBase()->count();

        // Query Point History
        $pointQuery = PointHistory::with('member.user');
        if ($dateFrom) {
            $pointQuery->whereDate('created_at', '>=', $dateFrom);
        }
        if ($dateTo) {
            $pointQuery->whereDate('created_at', '<=', $dateTo);
        }
        $pointHistories   = $pointQuery->latest()->paginate(15, ['*'], 'p_page')->withQueryString();
        $totalPoinEarned  = $pointQuery->where('type', 'earned')->toBase()->sum('points');
        $totalPoinRedeemed = $pointQuery->where('type', 'redeemed')->toBase()->sum('points');

        // Query Redeem History
        $rdmQuery = RedeemHistory::with(['member.user', 'reward']);
        if ($dateFrom) {
            $rdmQuery->whereDate('created_at', '>=', $dateFrom);
        }
        if ($dateTo) {
            $rdmQuery->whereDate('created_at', '<=', $dateTo);
        }
        $redeemHistories = $rdmQuery->latest()->paginate(15, ['*'], 'r_page')->withQueryString();
        $totalRedeem     = $rdmQuery->toBase()->count();

        return view('admin.reports.index', compact(
            'transactions',
            'totalTransaksi',
            'totalOmzet',
            'totalPoinDiberi',
            'members',
            'totalMember',
            'pointHistories',
            'totalPoinEarned',
            'totalPoinRedeemed',
            'redeemHistories',
            'totalRedeem',
            'dateFrom',
            'dateTo'
        ));
    }
}
