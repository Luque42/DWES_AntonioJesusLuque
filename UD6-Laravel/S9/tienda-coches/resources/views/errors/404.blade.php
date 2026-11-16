@extends('layouts.app')

@section('title', 'No encontrado')

@section('content')
    <div class="text-center py-5">
        <h1 class="display-4">404</h1>
        <p class="lead">El coche o la página que buscas no existe.</p>
        <a href="{{ route('cars.index') }}" class="btn btn-primary">Volver al catálogo</a>
    </div>
@endsection