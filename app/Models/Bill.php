<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'next_payment_date',
        'payment_status'
    ];

    protected $casts = [
        'next_payment_date' => 'date'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
