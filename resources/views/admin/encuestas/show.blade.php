<x-app-layout>

    <x-slot name="header">
        <h2 class="h4 mb-0">
            Información de la encuesta
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            Encuesta institucional
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="row mb-3">

                            <div class="col-md-4 fw-bold">
                                ID:
                            </div>

                            <div class="col-md-8">
                                {{ $encuesta->id }}
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4 fw-bold">
                                Año:
                            </div>

                            <div class="col-md-8">
                                {{ $encuesta->anio }}
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4 fw-bold">
                                Estado:
                            </div>

                            <div class="col-md-8">

                                @if ($encuesta->estado)
                                    <span class="badge bg-success">
                                        Activa
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        Cerrada
                                    </span>
                                @endif

                            </div>

                        </div>

                        <div class="row mb-4">

                            <div class="col-md-4 fw-bold">
                                Creada:
                            </div>

                            <div class="col-md-8">
                                {{ $encuesta->created_at->format('d/m/Y H:i') }}
                            </div>

                        </div>

                        <div class="d-flex justify-content-end">

                            <a href="{{ route('admin.encuestas.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Regresar
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
