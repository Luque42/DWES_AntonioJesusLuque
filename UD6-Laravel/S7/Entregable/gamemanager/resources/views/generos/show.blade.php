@extends('layouts.app')

@section('title', $genero->nombre.' | GameManager')

@section('content')
    <h1>Videojuegos de {{ $genero->nombre }}</h1>
    <section class="card">
        <table>
            <thead>
                <tr><th>Título</th><th>Desarrolladora</th><th>Año</th><th>Precio</th></tr>
            </thead>
            <tbody>
                @forelse ($genero->videojuegos as $videojuego)
                    <tr>
                        <td><a href="{{ route('videojuegos.show', $videojuego) }}">{{ $videojuego->titulo }}</a></td>
                        <td>{{ $videojuego->desarrolladora->nombre }}</td>
                        <td>{{ $videojuego->anio }}</td>
                        <td>{{ number_format((float) $videojuego->precio, 2, ',', '.') }} €</td>
                    </tr>
                @empty
                    <tr><td colspan="4">No hay videojuegos asociados a este género.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection
