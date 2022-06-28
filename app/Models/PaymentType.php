<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuid;
use App\Models\Transaction;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentType extends Model
{
    use HasFactory;
    use Uuid;

    protected $casts = [
        'id' => 'string'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
