<?php

namespace App\Models;

// Permite utilizar factories para generar usuarios de prueba
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Modelo base que permite utilizar el sistema de autenticación de Laravel
use Illuminate\Foundation\Auth\User as Authenticatable;

// Permite enviar notificaciones a los usuarios
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /*
    |--------------------------------------------------------------------------
    | Traits
    |--------------------------------------------------------------------------
    |
    | HasFactory:
    | Permite crear usuarios de prueba mediante factories.
    |
    | Notifiable:
    | Permite enviar notificaciones al usuario.
    |
    */
    use HasFactory, Notifiable;


    /*
    |--------------------------------------------------------------------------
    | Campos que pueden asignarse masivamente
    |--------------------------------------------------------------------------
    |
    | Estos campos pueden ser asignados utilizando métodos como
    | create() o update().
    |
    */
    protected $fillable = [

        // Nombre del usuario
        'name',

        // Correo electrónico utilizado para iniciar sesión
        'email',

        // Contraseña del usuario
        'password',
    ];


    /*
    |--------------------------------------------------------------------------
    | Campos ocultos
    |--------------------------------------------------------------------------
    |
    | Estos atributos no se mostrarán cuando el modelo se convierta
    | en un arreglo o en JSON.
    |
    | Esto ayuda a proteger información sensible.
    |
    */
    protected $hidden = [

        // Oculta la contraseña del usuario
        'password',

        // Oculta el token utilizado para "Recordarme"
        'remember_token',
    ];


    /*
    |--------------------------------------------------------------------------
    | Conversión de tipos de datos
    |--------------------------------------------------------------------------
    |
    | Define cómo Laravel debe convertir algunos campos o atributos del modelo.
    |
    */
    protected function casts(): array
    {
        return [

            // Convierte la fecha de verificación del correo
            // en un objeto de tipo fecha/hora (Carbon)
            'email_verified_at' => 'datetime',

            // Indica a Laravel que la contraseña debe almacenarse
            // utilizando un hash seguro.
            'password' => 'hashed',
        ];
    }
}
