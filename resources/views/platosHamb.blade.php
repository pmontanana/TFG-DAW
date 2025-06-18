<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-300">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hamburguesas</title>
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
        </style>
    @endif
</head>
<body class="h-full" x-data>

<x-header/>

<div class="bg-white rounded-lg shadow-md mt-10 mx-auto max-w-7xl p-6">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Nuestras Hamburguesas</h1>

    <div class="flex justify-center pt-15 pb-25">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($platos as $plato)
                <x-cards :plato="$plato" />
            @endforeach
        </div>
    </div>
</div>

<x-footer/>

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
