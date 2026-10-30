{{--
    Componente: alert
    Uso: <x-alert tipo="exito" mensaje="Texto" />
    Variables que recibe:
      - $tipo    : 'exito', 'error' u otro (información)
      - $mensaje : texto de la alerta
      - $slot    : contenido escrito entre las etiquetas
--}}
<div class="alert alert-{{ $tipo }}" role="status">
    {{-- Etiqueta en negrita según el tipo de alerta --}}
    <strong>
        @if ($tipo === 'error')
            Error:
        @elseif ($tipo === 'exito')
            Correcto:
        @else
            Información:
        @endif
    </strong>

    {{-- Mensaje recibido como atributo --}}
    {{ $mensaje }}

    {{-- Mensaje recibido entre las etiquetas <x-alert>...</x-alert> --}}
    {{ $slot }}
</div>