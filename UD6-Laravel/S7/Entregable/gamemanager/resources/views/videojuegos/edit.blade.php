@extends('layouts.app')

@section('title', 'Editar videojuego | GameManager')

@section('content')
    <h1>Editar videojuego</h1>
    <section class="card">
        @include('videojuegos._form', ['action' => route('videojuegos.update', $videojuego), 'method' => 'PUT'])
    </section>
@endsection
