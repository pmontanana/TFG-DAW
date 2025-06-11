<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-gray-300">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platos</title>

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
<body class="bg-gray-100 flex flex-col min-h-screen" x-data>

<x-header/>

<main class="flex-grow mb-25">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <button name="correo" class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600" type="button">
            <a href="/platos/correo">Enviar platos por correo</a>
        </button>

        @foreach(['hamburguesa', 'pizza', 'pasta'] as $tipo)
            <div class="bg-white rounded-lg shadow-md mt-10 p-6">
                <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">{{ ucfirst($tipo) }}s</h1>
                <div class="flex justify-center">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($$tipo as $plato)
                            <x-cards :plato="$plato" />
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>

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
