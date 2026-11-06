<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
</head>
<body>
<main>
    <header class="encabezado">
        <div>
            <p class="subtitulo">Tu tienda</p>
            <h1>Catálogo de productos</h1>
        </div>
        <a class="boton" href="{{ route('productos.create') }}">+ Añadir producto</a>
    </header>

    @if (session('success'))
        <p class="aviso" role="status">{{ session('success') }}</p>
    @endif

    <section class="catalogo" aria-label="Listado de productos">
        @forelse ($productos as $producto)
            <article class="producto">
                <h2>{{ $producto->nombre }}</h2>
                <p class="detalle"><span>Precio</span><strong>{{ number_format($producto->precio, 2, ',', '.') }} €</strong></p>
                <p class="detalle"><span>Stock disponible</span><strong>{{ $producto->stock }}</strong></p>
                <div class="acciones">
                    <a class="accion" href="{{ route('productos.show', $producto) }}">Ver</a>
                    <a class="accion" href="{{ route('productos.edit', $producto) }}">Editar</a>
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="accion eliminar" type="submit">Eliminar</button>
                    </form>
                </div>
            </article>
        @empty
            <p class="vacio">No hay productos registrados.</p>
        @endforelse
    </section>
</main>
</body>
</html>