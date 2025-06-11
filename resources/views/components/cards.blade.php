@props(['plato' => null, 'title' => '', 'description' => '', 'image' => '', 'precio' => '', 'id' => null, 'forsale' => true])

<div class="w-80 h-112 bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 dark:bg-gray-800 dark:border-gray-700 flex flex-col">
    <a href="#">
        <img class="w-full h-56 object-cover rounded-t-lg" src="{{ $plato ? $plato->imagen : $image }}" alt="{{ $plato ? $plato->nombre : $title }}" />
    </a>
    <div class="p-6 flex-grow flex flex-col">
        <div class="flex-grow">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $plato ? $plato->nombre : $title }}
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">
                {{ $plato ? $plato->descripcion : $description }}
            </p>

            @if($plato && $plato->alergenos->count() > 0)
                <div class="mb-3">
                    <p class="text-sm text-gray-600 dark:text-gray-300 font-semibold">Alérgenos:</p>
                    <div class="flex flex-wrap gap-1 mt-1">
                        @foreach($plato->alergenos as $alergeno)
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full">
                                {{ $alergeno->nombre }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="flex items-center justify-between mb-4">
                <p class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $plato ? number_format($plato->precio, 2) : $precio }}€
                </p>

                @if(($plato && $plato->forsale) || $forsale)
                    <span class="inline-flex items-center px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                        Para llevar
                    </span>
                @endif
            </div>
        </div>

        <div class="flex items-center justify-between">
            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                Más información
                <svg class="rtl:rotate-180 w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>

            @auth
                @if(($plato && $plato->forsale) || $forsale)
                    <button type="button"
                            x-data
                            @click="$dispatch('add-to-cart', {
                                id: {{ $plato ? $plato->id : ($id ?? 0) }},
                                name: '{{ $plato ? $plato->nombre : $title }}',
                                price: {{ $plato ? $plato->precio : str_replace(',', '.', $precio) }}
                            })"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </button>
                @endif
            @endauth
        </div>
    </div>
</div>
