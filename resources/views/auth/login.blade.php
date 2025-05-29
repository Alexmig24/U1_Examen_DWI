@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4">Iniciar Sesión</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Usuario</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">Contraseña</label>
                <input type="password" id="clave" name="clave" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate aquí</a>
        </div>
    </div>
</div>
@endsection
