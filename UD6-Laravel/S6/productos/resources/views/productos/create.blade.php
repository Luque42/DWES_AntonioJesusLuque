<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo producto</title>
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
</head>
<body>
<main>
    <header class="encabezado">
        <div>
            <p class="subtitulo">Catálogo</p>
            <h1>Crear producto</h1>
        </div>
        <a class="accion" href="{{ route('productos.index') }}">Volver al listado</a>
    </header>

    @if ($errors->any())
        <div class="aviso error" role="alert">
            <strong>Revisa los datos introducidos:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="formulario" action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div class="campo">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" value="{{ old('nombre') }}">
            @error('nombre') <p class="error-campo" role="alert">{{ $message }}</p> @enderror
        </div>

        <div class="campo">
            <label for="precio">Precio</label>
            <input id="precio" name="precio" type="number" min="0" step="0.01"
                   value="{{ old('precio') }}">
            @error('precio') <p class="error-campo" role="alert">{{ $message }}</p> @enderror
        </div>

        <div class="campo">
            <label for="stock">Stock</label>
            <input id="stock" name="stock" type="number" min="0" step="1"
                   value="{{ old('stock', 0) }}">
            @error('stock') <p class="error-campo" role="alert">{{ $message }}</p> @enderror
        </div>

        <button class="boton" type="submit">Guardar producto</button>
    </form>
</main>
</body>
</html>