<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\PaymentType;
use App\Models\SubscriptionType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;
    use Uuid;

    protected $casts = [
        'id' => 'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentType()
    {
        return $this->hasOne(PaymentType::class);
    }

    public function subscriptionType()
    {
        return $this->hasOne(SubscriptionType::class);
    }
}
