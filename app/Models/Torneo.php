<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $fillable = [
      'nombre',
      'nombreJuego',
      'fechaInicio',
      'fecahFin',
      'estado',
      'puntuacionVictoria',
      'puntuacionDerrota',
      'puntuacionEmpate',
      'creador_id',
        'modalidad'
    ];
}
