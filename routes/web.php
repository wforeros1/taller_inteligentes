<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\SaludController;
use App\Http\Controllers\RecordatorioController;
use App\Http\Controllers\DashboardController;

// --- Ruta Pública de Bienvenida ---
Route::get('/', function () {
    return view('welcome');
});

// --- Rutas Protegidas (Solo para usuarios logueados) ---
Route::middleware('auth')->group(function () {
    // Dashboard (Panel Principal)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rutas de Recursos para cada sección CRUD
    Route::resource('medicamentos', MedicamentoController::class);
    Route::resource('salud', SaludController::class);
    Route::resource('recordatorios', RecordatorioController::class);
    Route::post('/medicamentos/{medicamento}/tomado', [App\Http\Controllers\MedicamentoController::class, 'marcarComoTomado'])->name('medicamentos.tomado');

    // Rutas de Perfil de Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Incluye las rutas de autenticación de Breeze (login, register, etc.)
require __DIR__.'/auth.php';