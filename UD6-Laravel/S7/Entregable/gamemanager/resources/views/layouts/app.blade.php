<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GameManager')</title>
    <style>
        :root { font-family: Arial, sans-serif; color: #202938; background: #f3f5f8; }
        body { margin: 0; }
        nav { background: #172554; color: white; padding: 1rem max(1rem, calc((100% - 1100px) / 2)); display: flex; gap: 1.5rem; }
        nav a { color: white; text-decoration: none; font-weight: 700; }
        main { max-width: 1100px; margin: 2rem auto; padding: 0 1rem; }
        h1, h2 { color: #172554; }
        .card { background: white; border: 1px solid #dce2ea; border-radius: 10px; padding: 1.25rem; box-shadow: 0 2px 6px #1725540d; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1rem; }
        .button { display: inline-block; border: 0; border-radius: 6px; background: #1d4ed8; color: white; padding: .6rem .9rem; text-decoration: none; cursor: pointer; font: inherit; }
        .button-secondary { background: #64748b; }
        .button-danger { background: #b91c1c; }
        .tag { display: inline-block; background: #e0e7ff; color: #1e3a8a; border-radius: 999px; padding: .2rem .6rem; margin: .15rem; text-decoration: none; font-size: .9rem; }
        .form-group { margin: 1rem 0; }
        .form-group label { display: block; font-weight: 700; margin-bottom: .35rem; }
        input, textarea, select { box-sizing: border-box; width: 100%; padding: .65rem; border: 1px solid #cbd5e1; border-radius: 5px; font: inherit; }
        input[type="checkbox"] { width: auto; }
        .checkbox-list label { display: inline-flex; align-items: center; gap: .4rem; margin: .25rem 1rem .25rem 0; }
        .checkbox-list input { width: auto; }
        .error { color: #b91c1c; font-size: .9rem; margin-top: .3rem; }
        .actions { display: flex; gap: .5rem; align-items: center; flex-wrap: wrap; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: .75rem; border-bottom: 1px solid #dce2ea; text-align: left; }
        th { background: #e8edf5; }
        .alert { padding: .8rem 1rem; border-radius: 6px; margin-bottom: 1rem; }
        .alert-success { background: #dcfce7; color: #166534; }
        .alert-error { background: #fee2e2; color: #991b1b; }
        .filters { display: grid; grid-template-columns: 2fr 1fr 1fr auto; gap: .5rem; margin: 1rem 0; }
        nav svg { width: 20px; height: 20px; }
        @media (max-width: 700px) { .filters { grid-template-columns: 1fr; } table { display: block; overflow-x: auto; } }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('videojuegos.index') }}">Videojuegos</a>
        <a href="{{ route('desarrolladoras.index') }}">Desarrolladoras</a>
    </nav>
    <main>
        @if (session('mensaje'))
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
