<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComputadoraController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Ruta protegida solo para Administrador
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth.role:Administrador'])->name('admin.dashboard');

// Ruta protegida solo para Vendedor
Route::get('/vendedor', function () {
    return view('vendedor.dashboard');
})->middleware(['auth.role:Vendedor'])->name('vendedor.dashboard');

// Rutas protegidas para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::resource('computadoras', ComputadoraController::class);
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');