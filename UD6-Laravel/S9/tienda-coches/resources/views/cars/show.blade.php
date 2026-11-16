@extends('layouts.app')

@section('title', $car->brand->name . ' ' . $car->model)

@section('content')
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">{{ $car->brand->name }} {{ $car->model }}</h1>
            <span class="badge text-bg-dark">{{ ucfirst($car->status) }}</span>
        </div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Marca (1:N)</dt>
                <dd class="col-sm-9">
                    <a href="{{ route('cars.index', ['brand_id' => $car->brand_id]) }}">
                        {{ $car->brand->name }}
                    </a>
                    @if ($car->brand->country)
                        <span class="text-muted">({{ $car->brand->country }})</span>
                    @endif
                </dd>

                <dt class="col-sm-3">Precio</dt>
                <dd class="col-sm-9">{{ number_format($car->price, 2, ',', '.') }} €</dd>

                <dt class="col-sm-3">Año</dt>
                <dd class="col-sm-9">{{ $car->year }}</dd>

                <dt class="col-sm-3">Kilómetros</dt>
                <dd class="col-sm-9">{{ number_format($car->mileage, 0, ',', '.') }} km</dd>

                <dt class="col-sm-3">Combustible</dt>
                <dd class="col-sm-9">{{ ucfirst($car->fuel) }}</dd>

                <dt class="col-sm-3">Descripción</dt>
                <dd class="col-sm-9">{{ $car->description ?: 'Sin descripción.' }}</dd>

                <dt class="col-sm-3">Extras (N:M)</dt>
                <dd class="col-sm-9">
                    @forelse ($car->features as $feature)
                        <span class="badge text-bg-info">{{ $feature->name }}</span>
                    @empty
                        <span class="text-muted">Sin extras asociados.</span>
                    @endforelse
                </dd>
            </dl>
        </div>
        <div class="card-footer d-flex gap-2">
            <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary">← Volver</a>
            <a href="{{ route('cars.edit', $car) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('cars.destroy', $car) }}" method="POST"
                  onsubmit="return confirm('¿Eliminar este coche?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
@endsection