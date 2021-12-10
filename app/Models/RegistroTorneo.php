<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroTorneo extends Model
{
    use HasFactory;

    protected $fillable = [
      'participante_id',
      'torneo_id'
    ];
}
