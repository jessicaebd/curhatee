<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Article;
use App\Models\Podcast;
use App\Models\Hospital;
use App\Models\Transaction;
use App\Models\Schedule;
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

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }
}
