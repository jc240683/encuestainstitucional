<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nueva encuesta
        </h2>
    </x-slot>

    <div class="py-4">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="card">

                <div class="card-header">
                    Crear encuesta institucional
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.encuestas.store') }}"
                          method="POST">

                        @csrf

                        <div class="mb-3">

                            <label for="anio" class="form-label">
                                Año de la encuesta
                            </label>

                            <input
                                type="number"
                                name="anio"
                                id="anio"
                                class="form-control @error('anio') is-invalid @enderror"
                                value="{{ old('anio') }}"
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
                                Crear encuesta
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
