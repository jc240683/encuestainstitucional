<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Información de la encuesta
        </h2>
    </x-slot>

    <div class="py-4">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="card">

                <div class="card-header">
                    Encuesta institucional
                </div>

                <div class="card-body">

                    <p>
                        <strong>ID:</strong>
                        {{ $encuesta->id }}
                    </p>

                    <p>
                        <strong>Año:</strong>
                        {{ $encuesta->anio }}
                    </p>

                    <p>
                        <strong>Estado:</strong>

                        @if ($encuesta->estado)

                            <span class="badge bg-success">
                                Activa
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                Cerrada
                            </span>

                        @endif

                    </p>

                    <p>
                        <strong>Creada:</strong>
                        {{ $encuesta->created_at->format('d/m/Y H:i') }}
                    </p>

                    <a href="{{ route('admin.encuestas.index') }}"
                       class="btn btn-secondary">
                        Regresar
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
