@extends('layouts.app')

@section('title', 'Nueva desarrolladora | GameManager')

@section('content')
    <h1>Nueva desarrolladora</h1>
    <section class="card">
        @include('desarrolladoras._form', ['action' => route('desarrolladoras.store')])
    </section>
@endsection
