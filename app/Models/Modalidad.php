<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Modalidad extends Model
{
    use HasApiTokens, HasFactory,HasFactory;

    protected $fillable = [
        'id',
        'smodalidad'
    ];
}
