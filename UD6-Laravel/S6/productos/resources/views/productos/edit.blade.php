<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar producto</title>
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
</head>
<body>
<main>
    <header class="encabezado">
        <div>
            <p class="subtitulo">Producto #{{ $producto->id }}</p>
            <h1>Editar producto</h1>
        </div>
        <a class="accion" href="{{ route('productos.index') }}">Volver al listado</a>
    </header>

    @if ($errors->any())
        <ul class="aviso error" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form class="formulario" method="POST" action="{{ route('productos.update', $producto) }}">
        @csrf
        @method('PUT')

        <div class="campo">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre"
                   value="{{ old('nombre', $producto->nombre) }}">
            @error('nombre') <p class="error-campo" role="alert">{{ $message }}</p> @enderror
        </div>

        <div class="campo">
            <label for="precio">Precio</label>
            <input id="precio" name="precio" type="number" step="0.01"
                   value="{{ old('precio', $producto->precio) }}">
            @error('precio') <p class="error-campo" role="alert">{{ $message }}</p> @enderror
        </div>

        <div class="campo">
            <label for="stock">Stock</label>
            <input id="stock" name="stock" type="number" step="1"
                   value="{{ old('stock', $producto->stock) }}">
            @error('stock') <p class="error-campo" role="alert">{{ $message }}</p> @enderror
        </div>

        <button class="boton" type="submit">Actualizar producto</button>
    </form>
</main>
</body>
</html>