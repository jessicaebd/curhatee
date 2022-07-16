<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Article;
use App\Models\Podcast;
use App\Models\Hospital;
use App\Models\Transaction;
use App\Models\Chat;
use App\Models\Schedule;
use App\Models\Forum;
use App\Models\LikedForum;
use App\Models\ReplyForum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Psychologist extends Authenticatable
{
    use HasFactory;
    use Uuid;

    protected $casts = [
        'id' => 'string'
    ];

    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    public function podcast()
    {
        return $this->hasMany(Podcast::class);
    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function chat()
    {
        return $this->hasMany(Chat::class);
    }

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }

    public function replyForum()
    {
        return $this->hasMany(ReplyForum::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }

    public function likedForum()
    {
        return $this->hasMany(LikedForum::class);
    }

    public function likedReplyForum()
    {
        return $this->hasMany(LikedReplyForum::class);
    }
}
