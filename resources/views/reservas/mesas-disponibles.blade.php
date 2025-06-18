<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-300">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mesas Disponibles</title>
    <link rel="icon" href="{{ url('favicon.svg') }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="h-full">

<x-header/>

<div class="max-w-4xl mx-auto p-6 mt-10">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Mesas Disponibles</h2>
        <p class="text-gray-600 mb-6">
            Fecha: {{ $request->fecha }} |
            Comensales: {{ $request->comensales }}
        </p>

        @if($mesasLibres->isEmpty())
            <div class="p-4 bg-yellow-100 text-yellow-700 rounded-lg">
                <p>No hay mesas disponibles para los criterios seleccionados.</p>
                <a href="{{ route('reservas.index') }}" class="underline">Intentar con otros criterios</a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($mesasLibres as $mesa)
                    <div class="border rounded-lg p-4 hover:shadow-lg transition-shadow"
                         x-data="{ showForm: false }">
                        <h3 class="text-lg font-semibold mb-2">Mesa {{ $mesa->numero }}</h3>
                        <p class="text-gray-600 mb-4">Capacidad: {{ $mesa->capacidad }} personas</p>

                        <button @click="showForm = !showForm"
                                class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Reservar esta mesa
                        </button>

                        <div x-show="showForm" x-transition class="mt-4">
                            <form action="{{ route('reservas.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="mesa_id" value="{{ $mesa->id }}">
                                <input type="hidden" name="turno_id" value="{{ $request->turno_id }}">
                                <input type="hidden" name="fecha" value="{{ $request->fecha }}">
                                <input type="hidden" name="comensales" value="{{ $request->comensales }}">

                                <div class="mb-3">
                                    <label class="block text-sm font-medium text-gray-700">Observaciones (opcional)</label>
                                    <textarea name="observaciones" rows="2"
                                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                              placeholder="Alergias, celebraciones, etc."></textarea>
                                </div>

                                <button type="submit"
                                        class="w-full px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                    Confirmar Reserva
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('reservas.index') }}"
               class="text-blue-600 hover:underline">← Volver a buscar</a>
        </div>
    </div>
</div>

<x-footer/>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
