<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-300">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @csrf

    <title>Cafeteria</title>
    <link rel="icon" href="{{ url('favicon.svg') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        </style>
    @endif
</head>
<body class="h-full flex flex-col" x-data>

<x-header/>

<x-carousel/>

<!-- Main content wrapper con flex-grow para ocupar todo el espacio disponible -->
<main class="flex-grow">
    @if(session('mensaje'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('mensaje') }}</span>
            </div>
        </div>
    @endif

    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="mx-4 sm:mx-8 lg:mx-16 bg-white rounded-lg shadow-md mt-8 mb-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 pt-6 mb-6">Platos más nuevos</h1>
        <div class="flex justify-center px-4 pb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($platos as $plato)
                    <x-cards :plato="$plato" />
                @endforeach
            </div>
        </div>
        <div class="flex justify-center pb-6">
            {{ $platos->links() }}
        </div>
    </div>
</main>

<x-footer/>

<x-cookies-modal/>

<x-modal-success
    title="Producto añadido"
    message="El producto se ha añadido correctamente al carrito" />

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script>
    window.addEventListener('add-to-cart', (event) => {
        console.log('Producto añadido:', event.detail);
        window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'success-modal' } }));
    });
</script>

</body>
</html>
