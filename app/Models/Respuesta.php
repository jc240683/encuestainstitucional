<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; /* Se agrega */
use Illuminate\Database\Eloquent\Relations\BelongsTo; /* Se agrega */
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    //
     use HasFactory;

    protected $fillable = [
        'encuesta_id',
        'p1',
        'p2',
        'p3',
        'p4',
        'p5',
        'p6',
        'p7',
        'p8',
    ];

    public function encuesta(): BelongsTo
    {
        return $this->belongsTo(Encuesta::class);
    }
}
