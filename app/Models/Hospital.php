<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Psychologist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hospital extends Model
{
    use HasFactory;
    use Uuid;

    protected $casts = [
        'id' => 'string'
    ];

    public function psychologist()
    {
        return $this->hasMany(Psychologist::class);
    }
}
