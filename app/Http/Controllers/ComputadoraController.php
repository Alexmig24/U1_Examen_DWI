<?php

namespace App\Http\Controllers;
use App\Models\Computadora;
use Illuminate\Http\Request;

class ComputadoraController extends Controller
{
    public function index(Request $request)
    {
        $computadora = null;
        $computadoras = Computadora::all();

        if ($request->has('id')) {
            $computadora = Computadora::find($request->id);
            if (!$computadora) {
                return redirect()->route('computadoras.index')->with('error', 'No se encontró la computadora con ese ID.');
            }
        }

        return view('computadoras.index', compact('computadora', 'computadoras'));
    }

    public function show($id)
    {
        $computadora = Computadora::find($id);
        $computadoras = Computadora::all();  // Añadir para evitar error en la vista

        return view('computadoras.index', compact('computadora', 'computadoras'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'almacenamiento' => 'required|integer|min:1',
            'ram' => 'required|integer|min:1',
            'tarjeta_grafica' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'procesador' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $compu = Computadora::findOrFail($id);

        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($compu->imagen && \Storage::exists('public/' . $compu->imagen)) {
                \Storage::delete('public/' . $compu->imagen);
            }

            $imagen = $request->file('imagen')->store('computadoras', 'public');
            $compu->imagen = $imagen;
        }

        $compu->fill($request->except('imagen'))->save();

        return redirect()->route('computadoras.index')->with('success', 'Computadora actualizada correctamente.');
    }

    public function destroy($id)
    {
        Computadora::destroy($id);
        return redirect()->route('computadoras.index')->with('success', 'Computadora eliminada.');
    }

    public function create()
    {
        return view('computadoras.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'almacenamiento' => 'required|integer|min:1',
            'ram' => 'required|integer|min:1',
            'tarjeta_grafica' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0.01',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'procesador' => 'required|string|max:100',
        ]);

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('computadoras', 'public');
        }

        Computadora::create($validated);

        return redirect()->route('computadoras.index')->with('success', 'Computadora registrada exitosamente.');
    }

}
