<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Nueva encuesta
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            Crear encuesta institucional
                        </h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.encuestas.store') }}" method="POST">

                            @csrf

                            {{-- Campo año --}}
                            <div class="mb-3">

                                <label for="anio" class="form-label fw-bold">
                                    Año de la encuesta
                                </label>

                                <input type="number" name="anio" id="anio"
                                    class="form-control @error('anio') is-invalid @enderror" value="{{ old('anio') }}"
                                    min="2020" max="2100" placeholder="Ejemplo: 2026" required>

                                {{-- Mensaje de error --}}
                                @error('anio')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- Botones --}}
                            <div class="d-flex justify-content-end gap-2">

                                <a href="{{ route('admin.encuestas.index') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    Crear encuesta
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
