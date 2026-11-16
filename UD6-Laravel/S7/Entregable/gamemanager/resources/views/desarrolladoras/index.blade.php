@extends('layouts.app')

@section('title', 'Desarrolladoras | GameManager')

@section('content')
    <div class="actions" style="justify-content:space-between">
        <h1>Desarrolladoras</h1>
        <a class="button" href="{{ route('desarrolladoras.create') }}">Añadir desarrolladora</a>
    </div>
    <table>
        <thead>
            <tr><th>Nombre</th><th>País</th><th>Fundación</th><th>Videojuegos</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @forelse ($desarrolladoras as $desarrolladora)
                <tr>
                    <td>{{ $desarrolladora->nombre }}</td>
                    <td>{{ $desarrolladora->pais }}</td>
                    <td>{{ $desarrolladora->fundacion ?? '—' }}</td>
                    <td>{{ $desarrolladora->videojuegos_count }}</td>
                    <td>
                        <div class="actions">
                            <a class="button button-secondary" href="{{ route('desarrolladoras.edit', $desarrolladora) }}">Editar</a>
                            <form action="{{ route('desarrolladoras.destroy', $desarrolladora) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta desarrolladora?')">
                                @csrf
                                @method('DELETE')
                                <button class="button button-danger" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No hay desarrolladoras registradas.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
