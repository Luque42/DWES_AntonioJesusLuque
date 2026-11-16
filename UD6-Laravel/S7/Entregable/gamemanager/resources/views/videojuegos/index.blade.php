@extends('layouts.app')

@section('title', 'Videojuegos | GameManager')

@section('content')
    <div class="actions" style="justify-content:space-between">
        <h1>Catálogo de videojuegos</h1>
        <a class="button" href="{{ route('videojuegos.create') }}">Añadir videojuego</a>
    </div>
    <form class="filters" action="{{ route('videojuegos.index') }}" method="GET">
        <input type="search" name="buscar" placeholder="Buscar por título" value="{{ request('buscar') }}">
        <select name="genero_id">
            <option value="">Todos los géneros</option>
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}" @selected(request('genero_id') == $genero->id)>{{ $genero->nombre }}</option>
            @endforeach
        </select>
        <select name="desarrolladora_id">
            <option value="">Todas las desarrolladoras</option>
            @foreach ($desarrolladoras as $desarrolladora)
                <option value="{{ $desarrolladora->id }}" @selected(request('desarrolladora_id') == $desarrolladora->id)>{{ $desarrolladora->nombre }}</option>
            @endforeach
        </select>
        <button class="button" type="submit">Filtrar</button>
    </form>
    <div class="grid">
        @forelse ($videojuegos as $videojuego)
            <article class="card">
                <h2>{{ $videojuego->titulo }}</h2>
                <p>{{ \Illuminate\Support\Str::limit($videojuego->descripcion, 180) }}</p>
                <p>{{ $videojuego->desarrolladora->nombre }} · {{ $videojuego->anio }}</p>
                <p>{{ number_format((float) $videojuego->precio, 2, ',', '.') }} €</p>
                <div>
                    @foreach ($videojuego->generos as $genero)
                        <a class="tag" href="{{ route('generos.show', $genero) }}">{{ $genero->nombre }}</a>
                    @endforeach
                </div>
                <div class="actions" style="margin-top:1rem">
                    <a class="button" href="{{ route('videojuegos.show', $videojuego) }}">Ver</a>
                    <a class="button button-secondary" href="{{ route('videojuegos.edit', $videojuego) }}">Editar</a>
                    <form action="{{ route('videojuegos.destroy', $videojuego) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este videojuego?')">
                        @csrf
                        @method('DELETE')
                        <button class="button button-danger" type="submit">Eliminar</button>
                    </form>
                </div>
            </article>
        @empty
            <p>No hay videojuegos que coincidan con la búsqueda.</p>
        @endforelse
    </div>
    <div style="margin-top:1.5rem">{{ $videojuegos->links() }}</div>
@endsection
