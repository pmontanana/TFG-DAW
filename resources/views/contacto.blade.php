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

    <x-header />

    <div class="flex items-center justify-center flex-col ">
        <div class="bg-white p-4 sm:p-8 rounded-lg mb-4 mt-16 shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6">Contacto</h2>
            <form action="{{ url('/contacto') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm"
                        required maxlength="50">
                </div>
                <div class="mb-4">
                    <label for="correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm"
                        required maxlength="100">
                </div>
                <div class="mb-4">
                    <label for="mensaje" class="block text-sm font-medium text-gray-700">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="4"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm resize-none"
                        required minlength="10" maxlength="500"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 cursor-pointer">Enviar</button>
                </div>
            </form>
        </div>
        @if (Session::has('mensaje'))
            <div class="flex items-center p-3 mb-32 text-sm text-green-800 bg-green-50 rounded-lg w-full max-w-md">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span>{{ Session::get('mensaje') }}</span>
            </div>
        @else
            <span class="mb-32"></span>
        @endif
    </div>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>
