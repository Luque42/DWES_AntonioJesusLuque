{{--
    Componente: tarjeta
    Uso: <x-tarjeta :titulo="..." :resumen="..." :url="..." />
    Variables que recibe:
      - $titulo  : título del artículo
      - $resumen : texto breve del artículo
      - $url     : enlace a la página del artículo
--}}
<article class="tarjeta">
    {{-- Título --}}
    <h2>{{ $titulo }}</h2>

    {{-- Resumen --}}
    <p>{{ $resumen }}</p>

    {{-- Enlace para leer el artículo completo --}}
    <a href="{{ $url }}">Leer el artículo</a>
</article>