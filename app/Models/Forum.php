<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuid;
use App\Models\ReplyForum;
use App\Models\LikedForum;
use App\Models\Psychologist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forum extends Model
{
    use HasFactory;
    use Uuid;

    protected $casts = [
        'id' => 'string'
    ];

    public function replyForum()
    {
        return $this->hasMany(ReplyForum::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function psychologist()
    {
        return $this->belongsTo(Psychologist::class, 'user_id');
    }

    public function likedForum()
    {
        return $this->hasMany(LikedForum::class);
    }
}
