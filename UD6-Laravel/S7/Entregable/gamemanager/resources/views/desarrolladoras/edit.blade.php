@extends('layouts.app')

@section('title', 'Editar desarrolladora | GameManager')

@section('content')
    <h1>Editar desarrolladora</h1>
    <section class="card">
        @include('desarrolladoras._form', ['action' => route('desarrolladoras.update', $desarrolladora), 'method' => 'PUT'])
    </section>
@endsection
