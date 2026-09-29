<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar encuesta
        </h2>
    </x-slot>

    <div class="py-4">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="card">

                <div class="card-header">
                    Editar encuesta {{ $encuesta->anio }}
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.encuestas.update', $encuesta) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label for="anio" class="form-label">
                                Año
                            </label>

                            <input
                                type="number"
                                name="anio"
                                id="anio"
                                class="form-control @error('anio') is-invalid @enderror"
                                value="{{ old('anio', $encuesta->anio) }}"
                                min="2020"
                                max="2100"
                                required
                            >

                            @error('anio')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit"
                                    class="btn btn-primary">
                                Guardar cambios
                            </button>

                            <a href="{{ route('admin.encuestas.index') }}"
                               class="btn btn-secondary">
                                Cancelar
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
