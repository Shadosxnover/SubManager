<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_name',
        'subscription_tier',
        'price',
        'next_payment_date',
        'billing_cycle',
        'service_status',
        'website_status',
    ];
    public function getServiceIcon()
{
    $icons = [
        'netflix' => 'tv',
        'spotify' => 'music',
        'amazon prime' => 'shopping-cart',
        'disney+' => 'film',
        'hulu' => 'video',
        'apple music' => 'apple',
        'youtube premium' => 'youtube',
        // Add more mappings as needed
    ];

    $serviceName = strtolower($this->service_name);
    
    foreach ($icons as $service => $icon) {
        if (strpos($serviceName, $service) !== false) {
            return $icon;
        }
    }

    return 'globe'; // default icon
}
}
