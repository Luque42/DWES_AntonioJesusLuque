@extends('layouts.app')

@section('title', 'Nuevo videojuego | GameManager')

@section('content')
    <h1>Nuevo videojuego</h1>
    <section class="card">
        @include('videojuegos._form', ['action' => route('videojuegos.store')])
    </section>
@endsection
