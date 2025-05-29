<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComputadoraController extends Controller
{
    public function index(Request $request) {
        $query = Computadora::query();

        if ($request->has('codigo_tienda')) {
            $query->where('codigo_tienda', $request->codigo_tienda);
        }

        $computadoras = $query->get();
        return view('computadoras.index', compact('computadoras'));
    }

    public function show($id) {
        $comp = Computadora::findOrFail($id);
        return response()->json($comp);
    }

    public function update(Request $request, $id) {
        $compu = Computadora::findOrFail($id);
        $compu->update($request->all());
        return redirect()->back()->with('success', 'Actualizado correctamente');
    }

    public function grafica() {
        $data = Computadora::select('marca', DB::raw('count(*) as total'))
            ->groupBy('marca')->get();
        return view('computadoras.grafica', compact('data'));
    }
}
