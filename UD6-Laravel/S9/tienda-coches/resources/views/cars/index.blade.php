@extends('layouts.app')

@section('title', 'Catálogo de coches')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Catálogo de coches</h1>
        <a href="{{ route('cars.create') }}" class="btn btn-primary">+ Nuevo coche</a>
    </div>

    <form method="GET" action="{{ route('cars.index') }}" class="row g-2 mb-4">
        <div class="col-md-5">
            <input type="text" name="q" class="form-control"
                   placeholder="Buscar por modelo..." value="{{ request('q') }}">
        </div>
        <div class="col-md-4">
            <select name="brand_id" class="form-select">
                <option value="">Todas las marcas</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @selected(request('brand_id') == $brand->id)>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button class="btn btn-dark" type="submit">Filtrar</button>
            <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary">Limpiar</a>
        </div>
    </form>

    <div class="table-responsive bg-white rounded shadow-sm">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Combustible</th>
                    <th class="text-end">Precio</th>
                    <th>Estado</th>
                    <th>Extras</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cars as $car)
                    <tr>
                        <td>{{ $car->brand->name }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ ucfirst($car->fuel) }}</td>
                        <td class="text-end">{{ number_format($car->price, 2, ',', '.') }} €</td>
                        <td>
                            @php
                                $badge = match ($car->status) {
                                    'disponible' => 'success',
                                    'reservado'  => 'warning',
                                    default      => 'secondary',
                                };
                            @endphp
                            <span class="badge text-bg-{{ $badge }}">{{ ucfirst($car->status) }}</span>
                        </td>
                        <td>{{ $car->features->count() }}</td>
                        <td class="text-end">
                            <a href="{{ route('cars.show', $car) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                            <a href="{{ route('cars.edit', $car) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                            <form action="{{ route('cars.destroy', $car) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Eliminar {{ $car->brand->name }} {{ $car->model }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">No hay coches que mostrar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $cars->links() }}
    </div>
@endsection