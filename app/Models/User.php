<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Diary;
use App\Models\Forum;
use App\Models\Review;
use App\Models\Chat;
use App\Models\ReplyForum;
use App\Models\LikedForum;
use App\Models\Transaction;
use App\Models\Subscription;
use App\Models\SubscriptionType;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'id' => 'string'
    ];

    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    public function diary()
    {
        return $this->hasMany(Diary::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }

    public function replyForum()
    {
        return $this->hasMany(ReplyForum::class);
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }

    public function chat()
    {
        return $this->hasMany(Chat::class);
    }

    public function likedForum()
    {
        return $this->hasMany(LikedForum::class);
    }

    public function likedReplyForum()
    {
        return $this->hasMany(LikedReplyForum::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
