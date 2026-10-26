<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\Http\Request;
use Illuminate\View\View;
class AuditoriaController extends Controller
{
    public function index()
    {
        // Traemos todo el historial ordenado desde el más reciente
        $auditorias = Auditoria::with('user')->latest()->get();
        
        return view('auditoria', compact('auditorias'));
    }
}