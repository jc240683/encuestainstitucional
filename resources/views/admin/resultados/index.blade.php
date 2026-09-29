<x-app-layout> {{-- layout principal  --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Resultados de la encuesta
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card shadow-sm border-0">

            <div class="card-body p-4">

                {{-- Título --}}
                <h2 class="fw-bold mb-4" style="color: #198754;">
                    Resultados de las Encuestas
                </h2>


                {{-- ===================================================== --}}
                {{-- TARJETAS DE RESUMEN --}}
                {{-- ===================================================== --}}

                <div class="row g-3 mb-4">

                    {{-- Total de encuestas --}}
                    <div class="col-md-6 col-lg-3">

                        <div class="card border-0 shadow-sm text-center h-100">

                            <div class="card-body">

                                <small class="text-muted">
                                    Total Encuestas
                                </small>

                                <h3 class="fw-bold text-success mt-2">
                                    {{ $totalEncuestas }}
                                </h3>

                            </div>

                        </div>

                    </div>


                    {{-- Respuestas positivas --}}
                    <div class="col-md-6 col-lg-3">

                        <div class="card border-0 shadow-sm text-center h-100">

                            <div class="card-body">

                                <small class="text-muted">
                                    Respuestas Positivas
                                </small>

                                <h3 class="fw-bold text-primary mt-2">
                                    {{ $respuestasPositivas }}
                                </h3>

                            </div>

                        </div>

                    </div>


                    {{-- Respuestas negativas --}}
                    <div class="col-md-6 col-lg-3">

                        <div class="card border-0 shadow-sm text-center h-100">

                            <div class="card-body">

                                <small class="text-muted">
                                    Respuestas Negativas
                                </small>

                                <h3 class="fw-bold text-primary mt-2">
                                    {{ $respuestasNegativas }}
                                </h3>

                            </div>

                        </div>

                    </div>


                    {{-- Satisfacción --}}
                    <div class="col-md-6 col-lg-3">

                        <div class="card border-0 shadow-sm text-center h-100">

                            <div class="card-body">

                                <small class="text-muted">
                                    Satisfacción
                                </small>

                                <h3 class="fw-bold text-primary mt-2">
                                    {{ $satisfaccion }}%
                                </h3>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- EVALUACIÓN GENERAL --}}
                {{-- ===================================================== --}}

                <div class="row mb-4">

                    <div class="col-md-6 col-lg-3">

                        <div class="card border-0 shadow-sm text-center">

                            <div class="card-body">

                                <small class="text-muted">
                                    Evaluación General
                                </small>

                                <h3 class="fw-bold text-primary mt-2">
                                    {{ $evaluacionGeneral }}
                                </h3>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- BARRA DE SATISFACCIÓN --}}
                {{-- ===================================================== --}}

                <div class="card border mb-4">

                    <div class="card-body">

                        <h6 class="fw-bold mb-3">
                            Índice General de Satisfacción
                        </h6>

                        <div class="progress" style="height: 22px;">

                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $satisfaccion }}%;"
                                aria-valuenow="{{ $satisfaccion }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $satisfaccion }}%
                            </div>

                        </div>

                    </div>

                </div>



                {{-- ===================================================== --}}
                {{-- LISTA DE ENCUESTAS --}}
                {{-- ===================================================== --}}

                <div class="accordion" id="accordionEncuestas">

                   @forelse($respuestas as $respuesta)
                        <div class="accordion-item encuesta-item">

                            <h2 class="accordion-header">

                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#encuesta{{ $respuesta->id }}">

                                    <span class="me-2">
                                        Encuesta #{{ $respuesta->id }}
                                    </span>

                                    <span class="badge bg-warning text-dark">
                                        {{ $respuesta->created_at->format('Y-m-d H:i:s') }}
                                    </span>

                                </button>

                            </h2>


                            <div id="encuesta{{ $respuesta->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionEncuestas">

                                <div class="accordion-body">

                                    <h6 class="fw-bold mb-3">
                                        Respuestas de la encuesta
                                    </h6>


                                    <div class="table-responsive">

                                        <table class="table table-bordered table-sm">

                                            <thead class="table-light">

                                                <tr>
                                                    <th>Pregunta</th>
                                                    <th>Respuesta</th>
                                                </tr>

                                            </thead>

                                            <tbody>

                                                @for ($i = 1; $i <= 8; $i++)
                                                    <tr>

                                                        <td>
                                                            Pregunta {{ $i }}
                                                        </td>

                                                        <td>
                                                            {{ $respuesta->{'p' . $i} }}
                                                        </td>

                                                    </tr>
                                                @endfor

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="alert alert-info">
                            Todavía no existen encuestas registradas.
                        </div>
                    @endforelse

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
