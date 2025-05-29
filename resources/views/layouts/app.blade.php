<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    @auth
        <p class="text-end">Bienvenido, {{ auth()->user()->nombre_usuario }} | Rol: {{ auth()->user()->rol }}</p>
    @endauth
    @yield('content')
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MiSistema</a>
        <div class="d-flex ms-auto">
            <span class="navbar-text text-light me-3">
                Bienvenido, {{ Auth::user()->name }}
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm">Salir</button>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-light pt-3" style="min-height: 100vh;">
            <ul class="nav flex-column">
                @if(Auth::user()->role == 'admin')
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Gestión de Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Reportes</a></li>
                @elseif(Auth::user()->role == 'user')
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Mi Panel</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Mis Datos</a></li>
                @endif
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="col-md-10 p-4">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>