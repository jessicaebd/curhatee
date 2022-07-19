<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuid;
use App\Models\Forum;
use App\Models\ReplyForum;
use App\Models\LikedReplyForum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReplyForum extends Model
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

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }

    public function likedReplyForum()
    {
        return $this->hasMany(LikedReplyForum::class);
    }
}
