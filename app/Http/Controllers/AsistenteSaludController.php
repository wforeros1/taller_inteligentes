<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamento;
use App\Models\SaludRegistro;

class AsistenteSaludController extends Controller
{
    // Muestra la vista principal (el dashboard)
    public function index()
    {
        return view('dashboard');
    }

    // Almacena un nuevo medicamento para el usuario actual
    public function storeMedicamento(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'dosis' => 'nullable|string|max:100',
            'hora' => 'required|date_format:H:i',
        ]);

        $request->user()->medicamentos()->create($validated);

        return back()->with('status', '¡Medicamento guardado y recordatorio activado!');
    }

    // Almacena un nuevo registro de salud para el usuario actual
    public function storeSalud(Request $request)
    {
        $validated = $request->validate([
            'peso' => 'nullable|numeric',
            'presion_sistolica' => 'nullable|integer',
            'presion_diastolica' => 'nullable|integer',
            'ritmo_cardiaco' => 'nullable|integer',
        ]);

        $request->user()->saludRegistros()->create($validated);

        // Lógica de monitoreo
        $alerta = '';
        if ($request->presion_sistolica > 140 || $request->presion_diastolica > 90) {
            $alerta .= '¡Atención! La presión arterial parece alta. ';
        }
        if ($request->ritmo_cardiaco > 100) {
            $alerta .= '¡Atención! El ritmo cardíaco está elevado. ';
        }

        return back()->with('status', 'Datos de salud guardados. ' . $alerta);
    }
}