@extends('layouts.app')

@section('title', 'Editar coche')

@section('content')
    <h1 class="h3 mb-3">Editar {{ $car->brand->name }} {{ $car->model }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('cars.update', $car) }}" method="POST">
                @csrf
                @method('PUT')
                @include('cars._form', ['submitText' => 'Actualizar coche'])
            </form>
        </div>
    </div>
@endsection