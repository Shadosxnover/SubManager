<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $subscriptions = Subscription::where('user_id', $userId)->get();

        // Calculate totals
        $totalSubscriptions = $subscriptions->count();
        $totalPrice = $subscriptions->sum('price');

        return view('subscriptions', compact('subscriptions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:100',
            'subscription_tier' => 'required|string|max:50',
            'price' => 'required|numeric',
            'next_payment_date' => 'required|date',
            'billing_cycle' => 'required|in:monthly,annually',
            'service_status' => 'required|in:active,paused,expired',
        ]);

        Subscription::create([
            'user_id' => auth()->id(),
            'service_name' => $request->service_name,
            'subscription_tier' => $request->subscription_tier,
            'price' => $request->price,
            'next_payment_date' => $request->next_payment_date,
            'billing_cycle' => $request->billing_cycle,
            'service_status' => $request->service_status,
            'website_status' => 'active', // assuming default status for new subscriptions
        ]);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription added successfully!');
    }
    public function edit($id)
    {
        $subscription = Subscription::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return response()->json($subscription); // Returning JSON for modal population
    }

    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'service_name' => 'required|string|max:100',
            'subscription_tier' => 'required|string|max:50',
            'price' => 'required|numeric',
            'next_payment_date' => 'required|date',
            'billing_cycle' => 'required|in:monthly,annually',
            'service_status' => 'required|in:active,paused,expired',
        ]);

        $subscription->update([
            'service_name' => $request->service_name,
            'subscription_tier' => $request->subscription_tier,
            'price' => $request->price,
            'next_payment_date' => $request->next_payment_date,
            'billing_cycle' => $request->billing_cycle,
            'service_status' => $request->service_status,
        ]);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription updated successfully!');
    }

    public function destroy(Subscription $subscription)
    {
        // Check if the subscription belongs to the authenticated user
        if ($subscription->user_id !== auth()->id()) {
            abort(403);
        }

        $subscription->delete();
        return redirect()->route('subscriptions.index')->with('success', 'Subscription deleted successfully!');
    }
}
