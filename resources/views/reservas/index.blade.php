    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-300">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservar Mesa</title>
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

<div class="flex items-center justify-center flex-col">
    <div class="bg-white p-4 sm:p-8 rounded-lg mb-4 mt-16 shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6">Reservar Mesa</h2>

        @guest
            <div class="mb-4 p-4 bg-yellow-100 text-yellow-700 rounded-lg">
                <p>Debes <a href="/login" class="underline font-semibold">iniciar sesión</a> para hacer una reserva.</p>
            </div>
        @else
            <form action="{{ route('reservas.checkMesas') }}" method="POST"
                  x-data="{ fecha: '', turno: '', comensales: 1 }"
                  x-on:submit="localStorage.setItem('formData', JSON.stringify({fecha, turno, comensales}))">
                @csrf
                <div class="mb-4">
                    <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                    <input type="date" id="fecha" name="fecha" x-model="fecha"
                           min="{{ date('Y-m-d') }}"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm"
                           required>
                    @error('fecha')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="turno_id" class="block text-sm font-medium text-gray-700">Turno</label>
                    <select id="turno_id" name="turno_id" x-model="turno"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm"
                            required>
                        <option value="">Selecciona un turno</option>
                        @foreach($turnos as $turno)
                            <option value="{{ $turno->id }}">
                                {{ $turno->nombre }} ({{ substr($turno->hora_inicio, 0, 5) }} - {{ substr($turno->hora_fin, 0, 5) }})
                            </option>
                        @endforeach
                    </select>
                    @error('turno_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="comensales" class="block text-sm font-medium text-gray-700">Número de Comensales</label>
                    <input type="number" id="comensales" name="comensales" x-model="comensales"
                           min="1" max="10"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm"
                           required>
                    @error('comensales')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                            class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 cursor-pointer">
                        Buscar Mesas Disponibles
                    </button>
                </div>
            </form>
        @endguest
    </div>
</div>

<x-footer/>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
