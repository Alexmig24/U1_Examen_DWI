@extends('layouts.app')
@section('content')
<h2>Listado de Computadoras</h2>
<form method="GET" action="{{ route('computadoras.index') }}" class="mb-3">
    <input type="text" name="codigo_tienda" placeholder="Buscar por ID" class="form-control w-25 d-inline">
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Almacenamiento</th><th>RAM</th><th>Tarjeta Gráfica</th><th>Precio</th><th>Procesador</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($computadoras as $compu)
        <tr>
            <form action="{{ route('computadoras.update', $compu->codigo_tienda) }}" method="POST">
                @csrf
                @method('PUT')
                <td>{{ $compu->codigo_tienda }}</td>
                <td><input type="number" name="almacenamiento" value="{{ $compu->almacenamiento }}" class="form-control"></td>
                <td><input type="number" name="ram" value="{{ $compu->ram }}" class="form-control"></td>
                <td><input type="text" name="tarjeta_grafica" value="{{ $compu->tarjeta_grafica }}" class="form-control"></td>
                <td><input type="text" name="precio" value="{{ $compu->precio }}" class="form-control"></td>
                <td><input type="text" name="procesador" value="{{ $compu->procesador }}" class="form-control"></td>
                <td><button type="submit" class="btn btn-success">Actualizar</button></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Buscar por ID</h3>
<input type="number" id="buscarId" placeholder="ID"> <button onclick="buscarComputadora()">Buscar</button>
<div id="resultado"></div>

<script>
function buscarComputadora() {
    const id = document.getElementById('buscarId').value;
    fetch(`/computadoras/${id}`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('resultado').innerHTML = `
                <p>Marca: ${data.marca}</p>
                <p>Modelo: ${data.modelo}</p>
                <p>Procesador: ${data.procesador}</p>
            `;
        });
}
</script>
@endsection