<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compu ESPE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="{{ route('computadoras.index') }}">Compu ESPE</a>

            @auth
                <div class="text-white">
                    Bienvenido, {{ Auth::user()->nombre_usuario }} ({{ Auth::user()->rol }})
                    <form action="{{ route('logout') }}" method="POST" class="d-inline ms-2">
                        @csrf
                        <button class="btn btn-sm btn-outline-light">Cerrar sesión</button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
