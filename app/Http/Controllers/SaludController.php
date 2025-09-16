<?php

namespace App\Http\Controllers;

use App\Models\SaludRegistro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaludController extends Controller
{
    /**
     * Muestra una lista de los registros de salud del usuario.
     */
    public function index()
    {
        $registros = Auth::user()->saludRegistros()->latest()->get();
        return view('salud.index', compact('registros'));
    }

    /**
     * Muestra el formulario para crear un nuevo registro de salud.
     */
    public function create()
    {
        return view('salud.create');
    }

    /**
     * Almacena un nuevo registro de salud en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'peso' => 'nullable|numeric|min:0',
            'presion_sistolica' => 'nullable|integer|min:0',
            'presion_diastolica' => 'nullable|integer|min:0',
            'ritmo_cardiaco' => 'nullable|integer|min:0',
        ]);

        Auth::user()->saludRegistros()->create($validated);
        return redirect()->route('salud.index')->with('status', 'Registro de salud agregado con éxito.');
    }

    /**
     * Muestra el formulario para editar un registro de salud específico.
     */
    public function edit(SaludRegistro $salud)
    {
        abort_if($salud->user_id !== Auth::id(), 403, 'Acción no autorizada.');
        return view('salud.edit', compact('salud'));
    }

    /**
     * Actualiza un registro de salud específico en la base de datos.
     */
    public function update(Request $request, SaludRegistro $salud)
    {
        abort_if($salud->user_id !== Auth::id(), 403, 'Acción no autorizada.');

        $validated = $request->validate([
            'peso' => 'nullable|numeric|min:0',
            'presion_sistolica' => 'nullable|integer|min:0',
            'presion_diastolica' => 'nullable|integer|min:0',
            'ritmo_cardiaco' => 'nullable|integer|min:0',
        ]);

        $salud->update($validated);
        return redirect()->route('salud.index')->with('status', 'Registro de salud actualizado con éxito.');
    }

    /**
     * Elimina un registro de salud específico de la base de datos.
     */
    public function destroy(SaludRegistro $salud)
    {
        abort_if($salud->user_id !== Auth::id(), 403, 'Acción no autorizada.');
        
        $salud->delete();
        return redirect()->route('salud.index')->with('status', 'Registro de salud eliminado con éxito.');
    }
}