
<x-app-layout> {{-- layout principal  --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Administración de encuestas
        </h2>
    </x-slot>

    <div class="py-4">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">
                        Encuestas institucionales
                    </h5>

                    <a href="{{ route('admin.encuestas.create') }}" class="btn btn-primary">
                        Nueva encuesta
                    </a>

                    {{--     <a class="nav-link" href="{{ route('admin.resultados.index') }}">
                            <i class="bi bi-bar-chart"></i>
                            Resultados
                        </a> --}}


                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Año</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($encuestas as $encuesta)
                                    <tr>

                                        <td>
                                            {{ $encuesta->id }}
                                        </td>

                                        <td>
                                            {{ $encuesta->anio }}
                                        </td>

                                        <td>

                                            @if ($encuesta->estado)
                                                <span class="badge bg-success">
                                                    Activa
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    Cerrada
                                                </span>
                                            @endif

                                        </td>

                                        <td>

                                            <a href="{{ route('admin.encuestas.show', $encuesta) }}"
                                                class="btn btn-sm btn-info">
                                                Ver
                                            </a>

                                            <a href="{{ route('admin.encuestas.edit', $encuesta) }}"
                                                class="btn btn-sm btn-warning">
                                                Editar
                                            </a>

                                            @if (!$encuesta->estado)
                                                <form action="{{ route('admin.encuestas.activar', $encuesta) }}"
                                                    method="POST" class="d-inline">

                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        Activar
                                                    </button>

                                                </form>
                                            @else
                                                <form action="{{ route('admin.encuestas.desactivar', $encuesta) }}"
                                                    method="POST" class="d-inline">

                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit" class="btn btn-sm btn-secondary">
                                                        Cerrar
                                                    </button>

                                                </form>
                                            @endif

                                            <form action="{{ route('admin.encuestas.destroy', $encuesta) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('¿Deseas eliminar esta encuesta?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Eliminar
                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="text-center">
                                            No existen encuestas registradas.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
