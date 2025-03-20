<!doctype html>
<html lang="es" class="h-full bg-gray-200">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cafeteria</title>
    <link rel="icon" href="{{ url('favicon.svg') }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet"/>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style></style>
    @endif
</head>
<body class="h-full">
<x-header/>

<div class="flex flex-col justify-center px-4 sm:px-6 lg:px-8 bg-white rounded-lg shadow-md mt-10 mx-auto max-w-md">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-6 text-center text-2xl font-bold tracking-tight text-gray-900">Registra tu cuenta</h2>
    </div>

    <div class="mt-8 mb-40 sm:mb-20 sm:mx-auto sm:w-full sm:max-w-sm">
        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-900">Nombre</label>
                <div class="mt-2">
                    <input type="text" name="name" id="name" autocomplete="name" required
                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600 sm:text-sm"
                           value="{{ old('name') }}">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-900">Correo</label>
                <div class="mt-2">
                    <input type="email" name="email" id="email" autocomplete="email" required
                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600 sm:text-sm"
                           value="{{ old('email') }}">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-900">Contraseña</label>
                <div class="mt-2">
                    <input type="password" name="password" id="password" autocomplete="new-password" required
                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                </div>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Confirmar Contraseña</label>
                <div class="mt-2">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           autocomplete="new-password" required
                           class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                </div>
            </div>

            <div>
                <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Registrar
                </button>
            </div>
        </form>
    </div>
</div>

<x-footer/>

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
