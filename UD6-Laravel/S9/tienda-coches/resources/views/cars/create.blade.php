@extends('layouts.app')

@section('title', 'Nuevo coche')

@section('content')
    <h1 class="h3 mb-3">Nuevo coche</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('cars.store') }}" method="POST">
                @csrf
                @include('cars._form', ['submitText' => 'Guardar coche'])
            </form>
        </div>
    </div>
@endsection