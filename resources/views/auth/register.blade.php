@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 450px;">
        <h3 class="text-center mb-4">Registro de Usuario</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Usuario</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">Contraseña</label>
                <input type="password" id="clave" name="clave" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="clave_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" id="clave_confirmation" name="clave_confirmation" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Registrarse</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</div>
@endsection
