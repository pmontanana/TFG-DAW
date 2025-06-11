<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Reservas</title>
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

<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-white text-xl font-bold">Panel Admin</h1>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                            <a href="{{ route('platos.create') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Platos</a>
                            <a href="{{ route('admin.reservas') }}" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium">Reservas</a>
                            <a href="/" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Ver Sitio</a>
                        </div>
                    </div>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Gestión de Reservas</h1>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Fecha</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Turno</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Mesa</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Cliente</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Comensales</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Estado</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($reservas as $reserva)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $reserva->fecha->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $reserva->turno->nombre }} ({{ substr($reserva->turno->hora_inicio, 0, 5) }})
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                Mesa {{ $reserva->mesa->numero }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $reserva->user->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $reserva->comensales }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if($reserva->fecha >= now()->toDateString())
                                    <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                            Activa
                                        </span>
                                @else
                                    <span class="inline-flex rounded-full bg-gray-100 px-2 text-xs font-semibold leading-5 text-gray-800">
                                            Pasada
                                        </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-4">
                    {{ $reservas->links() }}
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>
