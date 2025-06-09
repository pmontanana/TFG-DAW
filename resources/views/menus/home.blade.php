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

<div class="flex-grow ml-15 mr-15 bg-white rounded-lg shadow-md mt-15 m-25">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Listado de Menús</h1>
    @auth
        <div class="flex justify-end mb-4 mr-8">
            <a href="{{ route('menus.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded-md shadow">
                Crear Menú
            </a>
        </div>
    @endauth
    <div class="flex justify-center pt-15 pb-25">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($menus as $menu)
                <div class="p-4 border rounded-lg shadow">
                    <h2 class="text-xl font-semibold mb-2">{{ $menu->nombre }}</h2>
                    <ul class="list-disc pl-5">
                        @foreach($menu->platos as $plato)
                            <li>{{ $plato->nombre }} ({{ $plato->tipo }})</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex justify-center mt-4">
        {{ $menus->links() }}
    </div>
</div>
<br>

<x-footer/>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
