<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-300">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @csrf
    <title>Cafeteria</title>
    <link rel="icon" href="{{ url('favicon.svg') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
        </style>
    @endif
</head>
<body class="h-full">

<x-header/>

<div class="flex justify-center mt-10">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Crear Menú</h1>
        <form method="POST" action="{{ route('menus.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nombre del menú:</label>
                <input type="text" name="nombre" required class="w-full rounded-md border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Platos:</label>
                <select name="platos[]" multiple required class="w-full rounded-md border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach($platos as $plato)
                        <option value="{{ $plato->id }}">{{ $plato->nombre }} ({{ $plato->tipo }})</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-1">Mantén pulsada la tecla Ctrl (Windows) o Cmd (Mac) para seleccionar varios platos.</p>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-md shadow">Guardar</button>
            </div>
        </form>
    </div>
</div>
<br>

<x-footer/>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
