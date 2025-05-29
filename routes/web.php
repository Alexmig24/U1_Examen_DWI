<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputadoraController;
use App\Http\Controllers\AuthController;

Route::get('/', [ComputadoraController::class, 'index'])->name('computadoras.index');

Route::get('/computadoras/{id}', [ComputadoraController::class, 'show'])->name('computadoras.show');
Route::put('/computadoras/{id}', [ComputadoraController::class, 'update'])->name('computadoras.update');
Route::delete('/computadoras/{id}', [ComputadoraController::class, 'destroy'])->name('computadoras.destroy');
Route::get('/computadoras/create', [ComputadoraController::class, 'create'])->name('computadoras.create');
Route::post('/computadoras', [ComputadoraController::class, 'store'])->name('computadoras.store');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });