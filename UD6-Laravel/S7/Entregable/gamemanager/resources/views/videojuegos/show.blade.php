@extends('layouts.app')

@section('title', $videojuego->titulo.' | GameManager')

@section('content')
    <article class="card">
        <div class="actions" style="justify-content:space-between">
            <h1>{{ $videojuego->titulo }}</h1>
            <div class="actions">
                <a class="button button-secondary" href="{{ route('videojuegos.edit', $videojuego) }}">Editar</a>
                <a class="button button-secondary" href="{{ route('videojuegos.index') }}">Volver</a>
            </div>
        </div>
        <p>{{ $videojuego->descripcion }}</p>
        <p><strong>Año:</strong> {{ $videojuego->anio }} · <strong>Precio:</strong> {{ number_format((float) $videojuego->precio, 2, ',', '.') }} €</p>
        <p><strong>Publicado:</strong> {{ $videojuego->publicado ? 'Sí' : 'No' }}</p>
        <p><strong>Desarrolladora:</strong> {{ $videojuego->desarrolladora->nombre }} ({{ $videojuego->desarrolladora->pais }})</p>
        <h2>Ficha técnica</h2>
        <p><strong>Plataforma:</strong> {{ $videojuego->fichaTecnica->plataforma }}</p>
        <p><strong>Motor gráfico:</strong> {{ $videojuego->fichaTecnica->motor_grafico }}</p>
        <p><strong>Edad recomendada:</strong> {{ $videojuego->fichaTecnica->edad_recomendada }}+</p>
        <p><strong>Espacio:</strong> {{ $videojuego->fichaTecnica->espacio_gb }} GB</p>
        <p><strong>Modo:</strong> {{ $videojuego->fichaTecnica->modo_juego }}</p>
        <h2>Géneros</h2>
        @foreach ($videojuego->generos as $genero)
            <a class="tag" href="{{ route('generos.show', $genero) }}">{{ $genero->nombre }}</a>
        @endforeach
    </article>
@endsection
