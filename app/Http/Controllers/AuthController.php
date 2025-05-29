<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required',
            'clave' => 'required',
        ]);

        $usuario = Usuario::where('nombre_usuario', $request->nombre_usuario)->first();

        if ($usuario && Hash::check($request->clave, $usuario->clave)) {
            Auth::login($usuario);
            return redirect()->route('computadoras.index');
        }

        return back()->with('error', 'Credenciales incorrectas');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|unique:usuarios',
            'clave' => 'required|min:6|confirmed',
        ]);

        Usuario::create([
            'nombre_usuario' => $request->nombre_usuario,
            'clave' => Hash::make($request->clave),
            'rol' => 'Vendedor',
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
    }
}
