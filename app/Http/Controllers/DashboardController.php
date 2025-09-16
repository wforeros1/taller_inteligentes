<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import the User model
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $now = Carbon::now();

        // 1. Obtener medicamentos pendientes para HOY
        $medicamentosPendientes = $user->medicamentos()
            ->where(function ($query) use ($now) {
                // La última toma fue antes de hoy o nunca se ha tomado
                $query->where('ultima_toma', '<', $now->startOfDay())
                    ->orWhereNull('ultima_toma');
            })
            ->orderBy('hora', 'asc')
            ->get();

        // 2. Obtener próximas citas y recordatorios
        $citasProximas = $user->recordatorios()
            ->where('fecha_hora', '>=', $now)
            ->orderBy('fecha_hora', 'asc')
            ->take(5) // Mostramos solo las 5 más cercanas
            ->get();

        return view('dashboard', [
            'medicamentosPendientes' => $medicamentosPendientes,
            'citasProximas' => $citasProximas,
        ]);
    }
}
