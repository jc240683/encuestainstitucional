<?php

namespace App\Models;

// Permite utilizar factories para generar datos de prueba
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Permite definir una relación "pertenece a" (muchos a uno)
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Clase base de los modelos de Eloquent
use Illuminate\Database\Eloquent\Model;


class Respuesta extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Factory
    |--------------------------------------------------------------------------
    |
    | Permite utilizar una Factory para generar respuestas de prueba
    | automáticamente durante el desarrollo.
    |
    */
    use HasFactory;


    /*
    |--------------------------------------------------------------------------
    | Campos que pueden asignarse masivamente
    |--------------------------------------------------------------------------
    |
    | Estos campos pueden ser asignados utilizando métodos como
    | create() o update().
    |
    | Ejemplo:
    |
    | Respuesta::create([
    |     'encuesta_id' => 1,
    |     'p1' => 5,
    |     'p2' => 4,
    |     'p3' => 5,
    | ]);
    |
    */
    protected $fillable = [

        // ID de la encuesta a la que pertenece esta respuesta
        'encuesta_id',

        // Respuestas correspondientes a las preguntas de la encuesta
        'p1',
        'p2',
        'p3',
        'p4',
        'p5',
        'p6',
        'p7',
        'p8',
    ];


    /*
    |--------------------------------------------------------------------------
    | Relación con el modelo Encuesta
    |--------------------------------------------------------------------------
    |
    | Una respuesta pertenece a una encuesta.
    |
    | Esta relación es del tipo "muchos a uno" (N:1).
    |
    | Ejemplo:
    |
    | Respuesta 1 ──┐
    | Respuesta 2 ──┤
    | Respuesta 3 ──┼──> Encuesta 1
    | Respuesta 4 ──┘
    |
    */
    public function encuesta(): BelongsTo
    {
        // Devuelve la encuesta a la que pertenece esta respuesta
        return $this->belongsTo(Encuesta::class);
    }
}
