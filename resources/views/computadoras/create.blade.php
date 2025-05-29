@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if(Auth::user()->rol !== 'Administrador')
        <div class="alert alert-danger">No tienes permiso para acceder a esta sección.</div>
        @php exit; @endphp
    @endif
    <h2>Registrar Nueva Computadora</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Errores encontrados:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('computadoras.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col">
                <label>Almacenamiento (GB)</label>
                <input type="number" name="almacenamiento" class="form-control" required>
            </div>
            <div class="col">
                <label>RAM (GB)</label>
                <input type="number" name="ram" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Tarjeta Gráfica</label>
            <input type="text" name="tarjeta_grafica" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Precio ($)</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Procesador</label>
            <input type="text" name="procesador" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Imagen</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('computadoras.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
