<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de estación</title>
</head>
<body>

    <h1>{{ $estacion->nombre }}</h1>

    <p><strong>ID:</strong> {{ $estacion->id }}</p>
    <p><strong>Código:</strong> {{ $estacion->codigo }}</p>
    <p>
        <strong>Estado:</strong>
        {{ $estacion->activa ? 'Activa' : 'Inactiva' }}
    </p>

    <h2>Vehículos de la estación</h2>

    <p>Total: {{ $estacion->vehiculos->count() }}</p>

    <table border="1" cellpadding="8">
        <tr>
            <th>Modelo</th>
            <th>Tipo</th>
            <th>Disponible</th>
            <th>Autonomía (km)</th>
        </tr>

        @forelse ($estacion->vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo->modelo }}</td>
                <td>{{ $vehiculo->tipo }}</td>
                <td>{{ $vehiculo->disponible ? 'Sí' : 'No' }}</td>
                <td>{{ $vehiculo->autonomia_km ?? 'Sin indicar' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay vehículos registrados.</td>
            </tr>
        @endforelse
    </table>

    <p>
        <a href="{{ route('estaciones.index') }}">
            Volver al listado
        </a>
    </p>

</body>
</html>