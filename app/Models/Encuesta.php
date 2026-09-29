<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; /* Se agrega */
use Illuminate\Database\Eloquent\Relations\HasMany; /* Se agrega */

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    //
     use HasFactory;

     protected $fillable = [
        'anio',
        'estado',
    ];

    protected $casts = [
        'anio' => 'integer',
        'estado' => 'boolean',
    ];

    public function respuestas(): HasMany
    {
        return $this->hasMany(Respuesta::class);
    }
}
