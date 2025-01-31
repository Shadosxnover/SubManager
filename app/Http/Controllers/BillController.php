<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Bill;
use Carbon\Carbon;

class BillController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $bills = Bill::whereHas('subscription', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->with('subscription')
        ->orderBy('next_payment_date')
        ->get()
        ->map(function($bill) {
            $bill->days_until_due = Carbon::parse($bill->next_payment_date)->diffInDays(now());
            return $bill;
        });

        return view('bills', compact('bills'));
    }

    public function updateStatus(Request $request, $id)
    {
        $bill = Bill::findOrFail($id);
        
        // Verify ownership
        if ($bill->subscription->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'status' => 'required|in:paid,due_soon,overdue'
        ]);

        $bill->payment_status = $request->status;
        
        if ($request->status === 'paid') {
            // Calculate next payment date based on billing cycle
            $nextPaymentDate = Carbon::parse($bill->next_payment_date);
            $bill->next_payment_date = $bill->subscription->billing_cycle === 'monthly' 
                ? $nextPaymentDate->addMonth() 
                : $nextPaymentDate->addYear();
        }
        
        $bill->save();

        return response()->json(['success' => true]);
    }
}
