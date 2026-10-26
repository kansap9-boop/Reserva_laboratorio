<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Laboratorio;
use App\Models\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    // Mostrar el panel con los laboratorios y reservas
    public function index()
    {
        $laboratorios = Laboratorio::all();
        
        $reservas = Reserva::where('user_id', auth()->id())
            ->where('estado', 'confirmada')
            ->orderBy('fecha', 'asc')
            ->orderBy('hora_inicio', 'asc')
            ->get();

        return view('dashboard', compact('laboratorios', 'reservas'));
    }

    // Guardar una nueva reserva asegurando que no haya cruces
    public function store(Request $request)
    {
        $request->validate([
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'fecha' => 'required|date|after_or_equal:today',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        return DB::transaction(function () use ($request) {
            $labId = $request->laboratorio_id;
            $fecha = $request->fecha;
            $inicio = $request->hora_inicio;
            $fin = $request->hora_fin;

            // Bloqueo pesimista para evitar superposiciones (Concurrencia)
            $conflicto = Reserva::where('laboratorio_id', $labId)
                ->where('fecha', $fecha)
                ->where('estado', 'confirmada')
                ->where(function ($query) use ($inicio, $fin) {
                    $query->where('hora_inicio', '<', $fin)
                          ->where('hora_fin', '>', $inicio);
                })
                ->lockForUpdate()
                ->exists();

            if ($conflicto) {
                return back()->withErrors(['error' => 'El laboratorio ya se encuentra reservado en ese rango horario. Elija otro horario.']);
            }

            $reserva = Reserva::create([
                'user_id' => auth()->id(),
                'laboratorio_id' => $labId,
                'fecha' => $fecha,
                'hora_inicio' => $inicio,
                'hora_fin' => $fin,
                'estado' => 'confirmada',
            ]);

            Auditoria::create([
                'user_id' => auth()->id(),
                'accion' => 'CREACION',
                'detalles' => "Reserva creada para el Lab ID {$labId} el {$fecha} de {$inicio} a {$fin}."
            ]);

            return back()->with('success', 'Reserva confirmada exitosamente.');
        });
    }

    // Cancelar una reserva existente
    public function destroy(Reserva $reserva)
    {
        if ($reserva->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403, 'No tienes permiso para cancelar esta reserva.');
        }

        $reserva->update(['estado' => 'cancelada']);

        Auditoria::create([
            'user_id' => auth()->id(),
            'accion' => 'CANCELACION',
            'detalles' => "Reserva ID {$reserva->id} cancelada."
        ]);

        return back()->with('success', 'Reserva cancelada exitosamente.');
    }
}