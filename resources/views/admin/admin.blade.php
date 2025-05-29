@extends('layouts.app')

@section('title', 'Panel de Administrador')

@section('content')
    <h1>Panel del Administrador</h1>
    <a href="{{ route('logout') }}">Cerrar sesión</a>
@endsection
