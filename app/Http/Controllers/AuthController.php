<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $usuario = DB::table('usuarios')
            ->where('nombre_usuario', $request->nombre_usuario)
            ->where('clave', $request->clave)
            ->first();

        if ($usuario) {
            Session::put('usuario', (array) $usuario);

            if ($usuario->rol === 'Administrador') {
                return redirect('/admin');
            } else {
                return redirect('/vendedor');
            }
        }

        return redirect()->back()->with('error', 'Credenciales incorrectas.');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
