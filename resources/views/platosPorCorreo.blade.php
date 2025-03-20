<div>
    <h1>Platos mas nuevos</h1>
    @foreach($platos->take(6) as $plato)
        <div>
            <h2>{{ $plato->nombre }}</h2>
            <p>{{ $plato->descripcion }}</p>
            <h3>{{ $plato->precio }}</h3>
        </div>
    @endforeach
    <h4>Saludos!</h4>
</div>
