@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Mensajes -->
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('computadoras.index') }}" class="mb-4">
        <div class="input-group">
            <input type="number" name="id" class="form-control" placeholder="Buscar computadora por ID..." required>
            <button class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <!-- Formulario si hay búsqueda -->
    @if($computadora)
    <div class="card mt-5 mb-5">
        <div class="card-header bg-info text-white">Editar Computadora (ID: {{ $computadora->codigo_tienda }})</div>
        <div class="card-body">
            <form action="{{ route('computadoras.update', $computadora->codigo_tienda) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Campos -->
                <div class="row mb-3">
                    <div class="col">
                        <label>Almacenamiento (GB)</label>
                        <input type="number" name="almacenamiento" value="{{ $computadora->almacenamiento }}" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>RAM (GB)</label>
                        <input type="number" name="ram" value="{{ $computadora->ram }}" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Tarjeta Gráfica</label>
                    <input type="text" name="tarjeta_grafica" value="{{ $computadora->tarjeta_grafica }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Precio</label>
                    <input type="number" step="0.01" name="precio" value="{{ $computadora->precio }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Procesador</label>
                    <input type="text" name="procesador" value="{{ $computadora->procesador }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control">{{ $computadora->descripcion }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Imagen actual:</label><br>
                    @if($computadora->imagen)
                        <img src="{{ asset('storage/' . $computadora->imagen) }}" width="200" class="img-thumbnail">
                    @else
                        <p>No hay imagen</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label>Subir nueva imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
            @if(Auth::user()->rol === 'Administrador')
            <form action="{{ route('computadoras.destroy', $computadora->codigo_tienda) }}" method="POST" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta computadora?')">
                    Eliminar
                </button>
            </form>
            @endif
        </div>
    </div>
    @endif

    <!-- Tarjetas de todas las computadoras -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($computadoras as $item)
        <div class="col">
            <div class="card h-100 shadow-sm">
                @if($item->imagen)
                    <img src="{{ asset('storage/' . $item->imagen) }}" class="card-img-top" alt="Imagen" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item->procesador }}</h5>
                    <p class="card-text">
                        <strong>Almacenamiento:</strong> {{ $item->almacenamiento }} GB<br>
                        <strong>RAM:</strong> {{ $item->ram }} GB<br>
                        <strong>GPU:</strong> {{ $item->tarjeta_grafica }}<br>
                        <strong>Precio:</strong> ${{ $item->precio }}<br>
                        <strong>Descripción:</strong> {{ $item->descripcion }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>


</div>
@endsection
