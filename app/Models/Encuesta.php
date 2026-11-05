<?php

namespace App\Models;

// Permite utilizar factories para generar datos de prueba
use Illuminate\Database\Eloquent\Factories\HasFactory; /* Se agrega */
// Permite definir una relación "pertenece a" (Uno a Muchos)
use Illuminate\Database\Eloquent\Relations\HasMany; /* Se agrega */

// Clase base de los modelos de Eloquent
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
   // Permite utilizar factories para generar datos de prueba
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | Campos que pueden asignarse masivamente
    |--------------------------------------------------------------------------
    |
    | Estos son los campos que Laravel permite llenar mediante métodos
    | como create() o update().
    |
    | Ejemplo:
    |
    | Encuesta::create([
    |     'anio' => 2026,
    |     'estado' => true,
    | ]);
    |
    */
    protected $fillable = [
        'anio',       // Año al que corresponde la encuesta
        'estado',     // Indica si la encuesta está activa o inactiva
    ];

    /*
    |--------------------------------------------------------------------------
    | Conversión de tipos de datos
    |--------------------------------------------------------------------------
    |
    | Le indicamos a Laravel qué tipo de dato debe utilizar para
    | determinados campos o atributos del modelo.
    |
    */
    protected $casts = [
        'anio' => 'integer',     // Convierte el año a un número entero
        'estado' => 'boolean',   // Convierte el estado a true o false
    ];

    /*
    |--------------------------------------------------------------------------
    | Relación con el modelo Respuesta
    |--------------------------------------------------------------------------
    |
    | Una encuesta puede tener muchas respuestas.
    |
    | Esta es una relación "uno a muchos" (1:N).
    |
    | Ejemplo:
    |
    | Una encuesta
    |      ↓
    |  ┌───┴───────────────┐
    |  ↓       ↓       ↓   ↓
    | Resp.1  Resp.2  Resp.3 Resp.4
    |
    */
    public function respuestas(): HasMany
    {
        // Obtiene todas las respuestas relacionadas con esta encuesta
        return $this->hasMany(Respuesta::class);
    }

}
