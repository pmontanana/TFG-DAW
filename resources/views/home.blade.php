<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-300">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cafeteria</title>
    <link rel="icon" href="{{ url('favicon.svg') }}">

    <!-- Fonts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
            /* Tailwind CSS styles here */
        </style>
    @endif
</head>
<body class="h-full">

<x-header/>

<x-carousel/>

<div class="flex justify-center pt-15 pb-25">
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
</div>

<x-footer/>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
