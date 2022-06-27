<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psychologists extends Model
{
    use HasFactory;
        
    protected $casts = [
        'id' => 'string'
    ];
}
