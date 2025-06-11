<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-300">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscar Platos</title>
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

<div class="max-w-6xl mx-auto p-6 mt-10">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Buscar Platos</h2>

        <form action="{{ route('buscador.buscar') }}" method="GET"
              x-data="{ showAdvanced: false }">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">Tipo de Plato</label>
                    <select name="tipo" id="tipo"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Todos los tipos</option>
                        <option value="pizza">Pizza</option>
                        <option value="pasta">Pasta</option>
                        <option value="hamburguesa">Hamburguesa</option>
                    </select>
                </div>

                <div>
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
                    <select name="categoria_id" id="categoria_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Todas las categorías</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">&nbsp;</label>
                    <button type="button"
                            @click="showAdvanced = !showAdvanced"
                            class="w-full px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        <span x-text="showAdvanced ? 'Ocultar filtros avanzados' : 'Mostrar filtros avanzados'"></span>
                    </button>
                </div>
            </div>

            <div x-show="showAdvanced" x-transition class="border-t pt-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alérgenos</label>
                        <div class="space-y-2 max-h-40 overflow-y-auto border rounded-md p-3">
                            @foreach($alergenos as $alergeno)
                                <label class="flex items-center">
                                    <input type="checkbox"
                                           name="alergenos[]"
                                           value="{{ $alergeno->id }}"
                                           class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span class="ml-2 text-sm">{{ $alergeno->nombre }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Rango de Precio</label>
                        <div class="flex items-center space-x-2">
                            <input type="number"
                                   name="precio_min"
                                   placeholder="Min"
                                   step="0.01"
                                   min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <span class="text-gray-500">-</span>
                            <input type="number"
                                   name="precio_max"
                                   placeholder="Max"
                                   step="0.01"
                                   min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Buscar
                </button>
            </div>
        </form>
    </div>
</div>

<x-footer/>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
