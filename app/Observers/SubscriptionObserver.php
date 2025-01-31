<?php

namespace App\Observers;

use App\Models\Subscription;
use App\Models\Bill;

class SubscriptionObserver
{
    public function created(Subscription $subscription)
    {
        Bill::create([
            'subscription_id' => $subscription->id,
            'next_payment_date' => $subscription->next_payment_date,
            'payment_status' => 'due_soon'
        ]);
    }
}
