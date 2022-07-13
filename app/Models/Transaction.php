<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuid;
use App\Models\Review;
use App\Models\PaymentType;
use App\Models\TransactionType;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    use Uuid;

    protected $casts = [
        'id' => 'string'
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id');
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class, 'payment_type_id');
    }
}
