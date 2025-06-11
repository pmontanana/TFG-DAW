<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Plato</title>
    <link rel="icon" href="{{ url('favicon.svg') }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gray-100">

<x-header/>

<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Editar Plato</h1>
        <form action="{{ route('platos.destroy', $plato) }}" method="POST"
              onsubmit="return confirm('¿Estás seguro de que quieres eliminar este plato?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Eliminar Plato
            </button>
        </form>
    </div>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('platos.update', $plato) }}" method="POST"
          x-data="{
              nombre: '{{ $plato->nombre }}',
              precio: '{{ $plato->precio }}',
              validations: {
                  nombre: { valid: true, message: '' },
                  precio: { valid: true, message: '' }
              }
          }">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
            <input type="text"
                   id="nombre"
                   name="nombre"
                   x-model="nombre"
                   @blur="
                       if(nombre.length < 3) {
                           validations.nombre = { valid: false, message: 'El nombre debe tener al menos 3 caracteres' }
                       } else {
                           validations.nombre = { valid: true, message: '' }
                       }
                   "
                   :class="validations.nombre.valid === false ? 'border-red-500' : (validations.nombre.valid === true ? 'border-green-500' : '')"
                   value="{{ old('nombre', $plato->nombre) }}"
                   required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            <p x-show="validations.nombre.valid === false"
               x-text="validations.nombre.message"
               class="mt-1 text-sm text-red-600"></p>
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
            <textarea id="descripcion"
                      name="descripcion"
                      required
                      class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('descripcion', $plato->descripcion) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen URL:</label>
            <input type="text"
                   id="imagen"
                   name="imagen"
                   value="{{ old('imagen', $plato->imagen) }}"
                   required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="precio" class="block text-sm font-medium text-gray-700">Precio:</label>
            <input type="number"
                   id="precio"
                   name="precio"
                   x-model="precio"
                   @blur="
                       if(precio <= 0) {
                           validations.precio = { valid: false, message: 'El precio debe ser mayor que 0' }
                       } else {
                           validations.precio = { valid: true, message: '' }
                       }
                   "
                   :class="validations.precio.valid === false ? 'border-red-500' : (validations.precio.valid === true ? 'border-green-500' : '')"
                   step="0.01"
                   value="{{ old('precio', $plato->precio) }}"
                   required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            <p x-show="validations.precio.valid === false"
               x-text="validations.precio.message"
               class="mt-1 text-sm text-red-600"></p>
        </div>

        <div class="mb-4">
            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de Plato:</label>
            <select id="tipo"
                    name="tipo"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                <option value="pizza" {{ $plato->tipo == 'pizza' ? 'selected' : '' }}>Pizza</option>
                <option value="pasta" {{ $plato->tipo == 'pasta' ? 'selected' : '' }}>Pasta</option>
                <option value="hamburguesa" {{ $plato->tipo == 'hamburguesa' ? 'selected' : '' }}>Hamburguesa</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría:</label>
            <select id="categoria_id"
                    name="categoria_id"
                    required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $plato->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="flex items-center">
                <input type="checkbox"
                       name="forsale"
                       value="1"
                       {{ $plato->forsale ? 'checked' : '' }}
                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <span class="ml-2 text-sm text-gray-700">Disponible para llevar</span>
            </label>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Alérgenos:</label>
            <div class="space-y-2 max-h-40 overflow-y-auto border rounded-md p-3">
                @foreach($alergenos as $alergeno)
                    <label class="flex items-center">
                        <input type="checkbox"
                               name="alergenos[]"
                               value="{{ $alergeno->id }}"
                               {{ $plato->alergenos->contains($alergeno->id) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm">{{ $alergeno->nombre }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex space-x-3">
            <button type="submit"
                    class="flex-1 px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Actualizar Plato
            </button>
            <a href="{{ route('platos.index') }}"
               class="flex-1 px-4 py-2 bg-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 text-center">
                Cancelar
            </a>
        </div>
    </form>
</div>

<x-footer/>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
