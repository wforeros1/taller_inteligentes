<?php

namespace App\Http\Controllers;

use App\Models\Recordatorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordatorioController extends Controller
{
    /**
     * Muestra una lista de los recordatorios del usuario.
     */
    public function index()
    {
        $recordatorios = Auth::user()->recordatorios()->orderBy('fecha_hora', 'asc')->get();
        return view('recordatorios.index', compact('recordatorios'));
    }

    /**
     * Muestra el formulario para crear un nuevo recordatorio.
     */
    public function create()
    {
        return view('recordatorios.create');
    }

    /**
     * Almacena un nuevo recordatorio en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_hora' => 'required|date',
        ]);

        Auth::user()->recordatorios()->create($validated);
        return redirect()->route('recordatorios.index')->with('status', 'Recordatorio creado con éxito.');
    }

    /**
     * Muestra el formulario para editar un recordatorio específico.
     */
    public function edit(Recordatorio $recordatorio)
    {
        abort_if($recordatorio->user_id !== Auth::id(), 403, 'Acción no autorizada.');
        return view('recordatorios.edit', compact('recordatorio'));
    }

    /**
     * Actualiza un recordatorio específico en la base de datos.
     */
    public function update(Request $request, Recordatorio $recordatorio)
    {
        abort_if($recordatorio->user_id !== Auth::id(), 403, 'Acción no autorizada.');

        $validated = $request->validate([
            'tipo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_hora' => 'required|date',
        ]);
        
        $recordatorio->update($validated);
        return redirect()->route('recordatorios.index')->with('status', 'Recordatorio actualizado con éxito.');
    }

    /**
     * Elimina un recordatorio específico de la base de datos.
     */
    public function destroy(Recordatorio $recordatorio)
    {
        abort_if($recordatorio->user_id !== Auth::id(), 403, 'Acción no autorizada.');
        
        $recordatorio->delete();
        return redirect()->route('recordatorios.index')->with('status', 'Recordatorio eliminado con éxito.');
    }
}