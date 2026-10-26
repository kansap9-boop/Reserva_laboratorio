<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    public function index()
    {
        $laboratorios = Laboratorio::orderBy('codigo', 'asc')->get();
        return view('laboratorios', compact('laboratorios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:10|unique:laboratorios,codigo',
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1'
        ]);

        Laboratorio::create($request->only(['codigo', 'nombre', 'capacidad']));

        return back()->with('success', 'Laboratorio registrado exitosamente.');
    }

    public function destroy(Laboratorio $laboratorio)
    {
        $laboratorio->delete();
        return back()->with('success', 'Laboratorio eliminado del sistema.');
    }
}