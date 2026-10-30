@extends('layouts.app')

@section('titulo', 'Listado de artículos')

@section('estilos')
    @parent
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection

@section('contenido')
    <h1>Todos los artículos</h1>
    <x-alert
        tipo="exito"
        mensaje="El artículo se ha guardado correctamente."
    />

    <x-alert tipo="error">
        No se pudo procesar la solicitud.
    </x-alert>

    

    @forelse ($posts as $post)
        
        
<x-tarjeta
    :titulo="$post->titulo"
    :resumen="$post->resumen"
    :url="route('posts.show', ['id' => $post->id])"
/>

    @empty
        <p>No hay artículos publicados todavía.</p>
    @endforelse
@endsection

@section('scripts')
    @parent
    <script>
        console.log('La vista del listado está preparada.');
    </script>
@endsection