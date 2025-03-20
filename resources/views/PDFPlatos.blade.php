<div class="flex-grow ml-15 mr-15 bg-white rounded-lg shadow-md mt-15 m-25">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Platos mas nuevos  </h1>
    <div class="flex justify-center pt-15 pb-25">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($platos->take(6) as $plato)
                <h2>{{ $plato->nombre }}</h2>
                <p>{{ $plato->descripcion }}</p>
                <h3>{{ $plato->precio }}</h3>
            @endforeach
        </div>
    </div>
</div>
