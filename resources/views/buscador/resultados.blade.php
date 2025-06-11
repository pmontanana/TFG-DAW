<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-300">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultados de Búsqueda</title>
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

<div class="max-w-7xl mx-auto p-6 mt-10">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Resultados de Búsqueda</h2>
            <a href="{{ route('buscador.index') }}"
               class="text-blue-600 hover:underline">Nueva búsqueda</a>
        </div>

        @if($platos->isEmpty())
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="mt-4 text-gray-600">No se encontraron platos con los criterios seleccionados</p>
                <a href="{{ route('buscador.index') }}"
                   class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Modificar búsqueda
                </a>
            </div>
        @else
            <div class="mb-4 p-3 bg-gray-100 rounded-lg">
                <p class="text-sm text-gray-700">
                    Se encontraron <span class="font-semibold">{{ $platos->total() }}</span> platos
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($platos as $plato)
                    <x-cards>
                        <x-slot name="title">{{ $plato->nombre }}</x-slot>
                        <x-slot name="description">{{ $plato->descripcion }}</x-slot>
                        <x-slot name="image">{{ $plato->imagen }}</x-slot>
                        <x-slot name="precio">{{ $plato->precio }}</x-slot>
                    </x-cards>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $platos->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</div>

<x-footer/>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
