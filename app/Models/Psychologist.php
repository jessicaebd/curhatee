<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Podcast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Psychologist extends Model
{
    use HasFactory;
    use Uuid;

    protected $casts = [
        'id' => 'string'
    ];

    public function podcast()
    {
        return $this->hasMany(Podcast::class);
    }
}
