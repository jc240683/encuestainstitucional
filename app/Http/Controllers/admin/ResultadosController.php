<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Respuesta; /* se agrega */
use Illuminate\Http\Request;

class ResultadosController extends Controller
{
    //
    public function index(Request $request)
    {

        /*
        |--------------------------------------------------------------------------

        get y latest: obtiene y ordena una coleccion de registros(arreglo) del más reciente al más antiguo.

        |--------------------------------------------------------------------------
        */

        $respuestas = Respuesta::latest()->get();

        /*
        |--------------------------------------------------------------------------
        | Total de encuestas respondidas
        |--------------------------------------------------------------------------
        */

        $totalEncuestas = $respuestas->count();


        /*
        |--------------------------------------------------------------------------
        | Definir preguntas
        |--------------------------------------------------------------------------
        */

        $preguntas = [
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
        | Respuestas positivas por pregunta
        |--------------------------------------------------------------------------
        */

        $positivas = [

            'p1' => [
                'Excelente',
                'Buena'
            ],

            'p2' => [
                'Excelente',
                'Bueno'
            ],

            'p3' => [
                'Excelente',
                'Buena'
            ],

            'p4' => [
                'Muy satisfecho',
                'Satisfecho'
            ],

            'p5' => [
                'Sí'
            ],

            'p6' => [
                'Sí'
            ],

            'p7' => [
                'Definitivamente sí',
                'Probablemente sí'
            ],

            'p8' => [
                'Sí'
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | Contadores generales
        |--------------------------------------------------------------------------
        */

        $respuestasPositivas = 0;
        $respuestasNegativas = 0;
        $totalRespuestas = 0;


        /*
        |--------------------------------------------------------------------------
        | Contadores por pregunta
        |--------------------------------------------------------------------------
        */

        $resultadosPreguntas = [];


        foreach ($preguntas as $pregunta) {

            $positivasPregunta = 0;
            $negativasPregunta = 0;


            foreach ($respuestas as $respuesta) {

                $valor = $respuesta->$pregunta;


                // Verificar que exista una respuesta
                if ($valor !== null && $valor !== '') {

                    $totalRespuestas++;


                    /*
                    |--------------------------------------------------------------------------
                    | Determinar si es positiva o negativa
                    |--------------------------------------------------------------------------
                    */

                    if (in_array($valor, $positivas[$pregunta])) {

                        $respuestasPositivas++;
                        $positivasPregunta++;
                    } else {

                        $respuestasNegativas++;
                        $negativasPregunta++;
                    }
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Porcentaje de satisfacción de la pregunta
            |--------------------------------------------------------------------------
            */

            $totalPregunta =
                $positivasPregunta +
                $negativasPregunta;


            $porcentajePregunta = $totalPregunta > 0
                ? round(
                    ($positivasPregunta / $totalPregunta) * 100
                )
                : 0;


            /*
            |--------------------------------------------------------------------------
            | Guardar resultado de la pregunta
            |--------------------------------------------------------------------------
            */

            $resultadosPreguntas[$pregunta] = [
                'positivas' => $positivasPregunta,
                'negativas' => $negativasPregunta,
                'total' => $totalPregunta,
                'porcentaje' => $porcentajePregunta,
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | Porcentaje general de satisfacción
        |--------------------------------------------------------------------------
        */

        $satisfaccion = $totalRespuestas > 0
            ? round(
                ($respuestasPositivas / $totalRespuestas) * 100
            )
            : 0;


        /*
        |--------------------------------------------------------------------------
        | Evaluación general
        |--------------------------------------------------------------------------
        */

        if ($satisfaccion >= 90) {

            $evaluacionGeneral = 'Excelente';
        } elseif ($satisfaccion >= 80) {

            $evaluacionGeneral = 'Buena';
        } elseif ($satisfaccion >= 70) {

            $evaluacionGeneral = 'Regular';
        } else {

            $evaluacionGeneral = 'Deficiente';
        }


        /*
        |--------------------------------------------------------------------------
        | Nombres de las preguntas
        |--------------------------------------------------------------------------
        */

        $textosPreguntas = [

            'p1' => '¿Qué tan satisfecho estás con la calidad educativa?',

            'p2' => '¿Cómo calificas el desempeño de los docentes?',

            'p3' => '¿Cómo calificas las instalaciones?',

            'p4' => '¿Qué tan satisfecho estás con los laboratorios?',

            'p5' => '¿La atención administrativa es adecuada?',

            'p6' => '¿Te sientes seguro dentro de la institución?',

            'p7' => '¿Recomendarías estudiar en el CECyTE?',

            'p8' => '¿Las actividades extracurriculares son suficientes?',
        ];


        /*
        |--------------------------------------------------------------------------
        | Enviar información a la vista
        |--------------------------------------------------------------------------
        */

        return view('admin.resultados.index', compact(

            'respuestas',

            'totalEncuestas',

            'totalRespuestas',

            'respuestasPositivas',

            'respuestasNegativas',

            'satisfaccion',

            'evaluacionGeneral',

            'resultadosPreguntas',

            'textosPreguntas'

        ));
    }
}
