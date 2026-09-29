<?php

use App\Http\Controllers\Admin\EncuestaController as AdminEncuestaController; /* se agrega */
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncuestaController; /* se agrega */
use App\Http\Controllers\Admin\ResultadosController; /* se agrega */

/* Rutas para el formulario */

Route::get('/', [EncuestaController::class, 'index'])
    ->name('index');

/* ruta para guardar la encuesta */
Route::post('/encuesta', [EncuestaController::class, 'store'])
    ->name('encuesta.store');

/* ruta para ver la página de agradecimiento */
Route::view('/gracias', 'gracias')
    ->name('gracias');



/* Panel administrativo de las encuestas */

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

/* ruta para gestionar encuestas */
    Route::resource('encuestas', AdminEncuestaController::class);

/* ruta para activar encuesta */
    Route::patch(
        'encuestas/{encuesta}/activar',
        [AdminEncuestaController::class, 'activar']
    )->name('encuestas.activar');

/* ruta para desactivar encuesta */
    Route::patch(
        'encuestas/{encuesta}/desactivar',
        [AdminEncuestaController::class, 'desactivar']
    )->name('encuestas.desactivar');

    /* ruta para ver resultados de todas las encuestas */
Route::get('/resultados', [ResultadosController::class, 'index'])
    ->name('resultados.index');

});




/* laravel breeze */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
