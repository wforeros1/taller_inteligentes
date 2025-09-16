<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = Auth::user()->medicamentos()->latest()->get();
        return view('medicamentos.index', compact('medicamentos'));
    }

    public function create()
    {
        return view('medicamentos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'dosis' => 'nullable|string|max:100',
            'hora' => 'required|date_format:H:i',
        ]);

        Auth::user()->medicamentos()->create($validated);
        return redirect()->route('medicamentos.index')->with('status', 'Medicamento agregado con éxito.');
    }

    public function edit(Medicamento $medicamento)
    {
        // Abortar si el usuario no es el dueño del medicamento
        abort_if($medicamento->user_id !== Auth::id(), 403);
        return view('medicamentos.edit', compact('medicamento'));
    }

    public function update(Request $request, Medicamento $medicamento)
    {
        abort_if($medicamento->user_id !== Auth::id(), 403);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'dosis' => 'nullable|string|max:100',
            'hora' => 'required|date_format:H:i',
        ]);

        $medicamento->update($validated);
        return redirect()->route('medicamentos.index')->with('status', 'Medicamento actualizado con éxito.');
    }

    public function destroy(Medicamento $medicamento)
    {
        abort_if($medicamento->user_id !== Auth::id(), 403);

        $medicamento->delete();
        return redirect()->route('medicamentos.index')->with('status', 'Medicamento eliminado con éxito.');
    }

    public function marcarComoTomado(Medicamento $medicamento)
    {
        abort_if($medicamento->user_id !== Auth::id(), 403);

        $medicamento->update(['ultima_toma' => now()]);

        return redirect()->route('dashboard')->with('status', $medicamento->nombre . ' marcado como tomado.');
    }
}
