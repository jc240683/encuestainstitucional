<?php

namespace App\Http\Controllers;
use App\Models\Encuesta; /* se agrega */
use App\Models\Respuesta;  /* se agrega */
use Illuminate\Http\Request;

class EncuestaController extends Controller
{

    /* Muestra la encuesta que este activa */
    public function index()
    {
        /* Consulta en la base de datos la encuesta activa */
        $encuesta = Encuesta::where('estado', true)->first();

        return view('index');
    }

    /* Funcion que Valida y Almacenar las respuestas de la encuesta en DB */
    public function store(Request $request)
    {
    /* validar los datos */
        $request->validate([
            'p1' => 'required|string',
            'p2' => 'required|string',
            'p3' => 'required|string',
            'p4' => 'required|string',
            'p5' => 'required|string',
            'p6' => 'required|string',
            'p7' => 'required|string',
            'p8' => 'required|string',
        ]);

        $encuesta = Encuesta::where('estado', true)->first();

        if (!$encuesta) {
            return back()->with('error', 'No hay una encuesta activa.');
        }
        /* guardar las respuestas */
        Respuesta::create([
            'encuesta_id' => $encuesta->id,
            'p1' => $request->p1,
            'p2' => $request->p2,
            'p3' => $request->p3,
            'p4' => $request->p4,
            'p5' => $request->p5,
            'p6' => $request->p6,
            'p7' => $request->p7,
            'p8' => $request->p8,
        ]);
        /* redirigir a la vista de agradecimiento */
        return redirect()->route('gracias');
    }

}
