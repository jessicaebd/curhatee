<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Psychologists extends Model
{
    use HasFactory;
    use Uuid;
    
    protected $casts = [
        'id' => 'string'
    ];
}
