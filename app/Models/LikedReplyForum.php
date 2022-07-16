<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuid;
use App\Models\Psychologist;
use App\Models\RelyForum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedReplyForum extends Model
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

    public function replyForum()
    {
        return $this->belongsTo(ReplyForum::class, 'psychologist_id');
    }
}
