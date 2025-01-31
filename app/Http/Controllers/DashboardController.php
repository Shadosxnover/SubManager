<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $now = Carbon::now();
        $weekEnd = $now->copy()->endOfWeek();
        $monthStart = $now->copy()->startOfMonth();

        // Active Subscriptions
        $activeSubscriptions = Subscription::where('user_id', $userId)
            ->where('service_status', 'active')
            ->get();
        $activeCount = $activeSubscriptions->count();
        $activeTotal = $activeSubscriptions->sum('price');

        // Due This Week
        $dueThisWeek = Subscription::where('user_id', $userId)
            ->where('service_status', 'active')
            ->whereBetween('next_payment_date', [$now, $weekEnd])
            ->get();
        $dueThisWeekCount = $dueThisWeek->count();
        $dueThisWeekTotal = $dueThisWeek->sum('price');

        // Paid This Month
        $paidThisMonth = Subscription::where('user_id', $userId)
            ->where('service_status', 'active')
            ->where('next_payment_date', '>=', $monthStart)
            ->where('next_payment_date', '<=', $now)
            ->get();
        $paidThisMonthCount = $paidThisMonth->count();
        $paidThisMonthTotal = $paidThisMonth->sum('price');

        // Paused Subscriptions
        $pausedSubscriptions = Subscription::where('user_id', $userId)
            ->where('service_status', 'paused')
            ->get();
        $pausedCount = $pausedSubscriptions->count();
        $pausedTotal = $pausedSubscriptions->sum('price');

        return view('client-space', compact(
            'activeCount',
            'activeTotal',
            'dueThisWeekCount',
            'dueThisWeekTotal',
            'paidThisMonthCount',
            'paidThisMonthTotal',
            'pausedCount',
            'pausedTotal'
        ));
    }
}
