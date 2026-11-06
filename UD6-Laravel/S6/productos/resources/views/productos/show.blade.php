<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $producto->nombre }} · Detalle del producto</title>
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
</head>
<body>
<main>
    <header class="encabezado">
        <div>
            <p class="subtitulo">Detalle del producto</p>
            <h1>{{ $producto->nombre }}</h1>
        </div>
        <a class="accion" href="{{ route('productos.index') }}">Volver al listado</a>
    </header>

    <section class="producto ficha" aria-label="Información del producto">
        <p class="detalle"><span>Precio</span><strong>{{ number_format($producto->precio, 2, ',', '.') }} €</strong></p>
        <p class="detalle"><span>Stock disponible</span><strong>{{ $producto->stock }}</strong></p>
        <div class="acciones">
            <a class="boton" href="{{ route('productos.edit', $producto) }}">Editar producto</a>
        </div>
    </section>
</main>
</body>
</html>