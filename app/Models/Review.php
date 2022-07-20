<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuid;
use App\Models\Psychologist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    use Uuid;

    protected $casts = [
        'id' => 'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function psychologist()
    {
        return $this->belongsTo(Psychologist::class, 'psychologist_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
