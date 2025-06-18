<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-300">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reserva Confirmada</title>
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

<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full mx-4">
        <div class="text-center mb-6">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900">¡Reserva Confirmada!</h2>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <h3 class="font-semibold text-gray-700 mb-2">Detalles de tu reserva:</h3>
            <dl class="space-y-1 text-sm">
                <div class="flex justify-between">
                    <dt class="text-gray-600">Fecha:</dt>
                    <dd class="font-medium">{{ $reserva->fecha->format('d/m/Y') }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-600">Turno:</dt>
                    <dd class="font-medium">{{ $reserva->turno->nombre }} ({{ substr($reserva->turno->hora_inicio, 0, 5) }})</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-600">Mesa:</dt>
                    <dd class="font-medium">Mesa {{ $reserva->mesa->numero }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-600">Comensales:</dt>
                    <dd class="font-medium">{{ $reserva->comensales }} personas</dd>
                </div>
                @if($reserva->observaciones)
                    <div class="pt-2 border-t">
                        <dt class="text-gray-600 mb-1">Observaciones:</dt>
                        <dd class="text-gray-700">{{ $reserva->observaciones }}</dd>
                    </div>
                @endif
            </dl>
        </div>

        <div class="space-y-3">
            <a href="{{ route('reservas.misReservas') }}"
               class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Ver mis reservas
            </a>
            <a href="/"
               class="block w-full text-center px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                Volver al inicio
            </a>
        </div>
    </div>
</div>

<x-footer/>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
