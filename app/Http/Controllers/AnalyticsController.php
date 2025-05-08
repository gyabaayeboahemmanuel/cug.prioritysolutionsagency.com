<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Fetch Google referral data
        $referrals = DB::table('google_referrals')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $labels = $referrals->pluck('date');
        $counts = $referrals->pluck('count');

        return view('admin.analytics.analytics', compact('labels', 'counts'));
    }
}
