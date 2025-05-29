@extends('layouts.app')

@section('title', 'Panel de Usuario')

@section('content')
    <h1>Bienvenido Vendedor</h1>
    <a href="{{ route('logout') }}">Cerrar sesión</a>
@endsection
