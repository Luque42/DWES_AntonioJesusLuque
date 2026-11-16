<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Catálogo') · AutoTienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('cars.index') }}">🚗 AutoTienda</a>
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('cars.index') ? 'active' : '' }}"
                   href="{{ route('cars.index') }}">Catálogo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('cars.create') ? 'active' : '' }}"
                   href="{{ route('cars.create') }}">Nuevo coche</a>
            </li>
        </ul>
    </div>
</nav>

<main class="container pb-5">
    @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    @yield('content')
</main>

</body>
</html>