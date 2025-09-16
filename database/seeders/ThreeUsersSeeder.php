<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Medicamento;
use App\Models\SaludRegistro;
use App\Models\Recordatorio;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ThreeUsersSeeder extends Seeder
{
    public function run(): void
    {
        // --- Limpiar tablas (opcional) ---
        // User::truncate();
        // Medicamento::truncate();
        // SaludRegistro::truncate();
        // Recordatorio::truncate();

        // --- USUARIO 1 ---
        $user1 = User::create([
            'name' => 'Dr. Smith',
            'email' => 'smith@example.com',
            'password' => Hash::make('password123'),
        ]);

        Medicamento::insert([
            [
                'user_id' => $user1->id,
                'nombre' => 'Amlodipino',
                'dosis' => '5 mg',
                'hora' => '08:00',
                'es_critico' => true,
                'ultima_toma' => Carbon::yesterday()->setTime(8, 0),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user1->id,
                'nombre' => 'Metformina',
                'dosis' => '850 mg',
                'hora' => '09:00',
                'es_critico' => false,
                'ultima_toma' => Carbon::today()->setTime(9, 0),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        SaludRegistro::insert([
            [
                'user_id' => $user1->id,
                'peso' => 75.2,
                'presion_sistolica' => 125,
                'presion_diastolica' => 80,
                'ritmo_cardiaco' => 72,
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'user_id' => $user1->id,
                'peso' => 75.0,
                'presion_sistolica' => 128,
                'presion_diastolica' => 82,
                'ritmo_cardiaco' => 75,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        Recordatorio::insert([
            [
                'user_id' => $user1->id,
                'tipo' => 'Cita Odontólogo',
                'descripcion' => 'Revisión anual con Dr. Pérez',
                'fecha_hora' => Carbon::now()->addDays(2)->setTime(10, 0),
                'minutos_antes_aviso' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // --- USUARIO 2 ---
        $user2 = User::create([
            'name' => 'Sra. Martínez',
            'email' => 'martinez@example.com',
            'password' => Hash::make('password123'),
        ]);

        Medicamento::insert([
            [
                'user_id' => $user2->id,
                'nombre' => 'Ibuprofeno',
                'dosis' => '400 mg',
                'hora' => '12:00',
                'es_critico' => false,
                'ultima_toma' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        SaludRegistro::create([
            'user_id' => $user2->id,
            'peso' => 68.5,
            'presion_sistolica' => 120,
            'presion_diastolica' => 78,
            'ritmo_cardiaco' => 70,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Recordatorio::create([
            'user_id' => $user2->id,
            'tipo' => 'Laboratorio',
            'descripcion' => 'Examen de sangre en Clínica Central',
            'fecha_hora' => Carbon::now()->addDays(5)->setTime(9, 0),
            'minutos_antes_aviso' => 60,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // --- USUARIO 3 ---
        $user3 = User::create([
            'name' => 'Sr. López',
            'email' => 'lopez@example.com',
            'password' => Hash::make('password123'),
        ]);

        Medicamento::create([
            'user_id' => $user3->id,
            'nombre' => 'Vitamina C',
            'dosis' => '500 mg',
            'hora' => '08:30',
            'es_critico' => false,
            'ultima_toma' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        SaludRegistro::create([
            'user_id' => $user3->id,
            'peso' => 80.0,
            'presion_sistolica' => 130,
            'presion_diastolica' => 85,
            'ritmo_cardiaco' => 78,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Recordatorio::create([
            'user_id' => $user3->id,
            'tipo' => 'Control Cardiológico',
            'descripcion' => 'Revisión con Dra. Gómez',
            'fecha_hora' => Carbon::now()->addDays(10)->setTime(15, 0),
            'minutos_antes_aviso' => 180,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info('¡3 usuarios creados con sus medicamentos, salud y recordatorios!');
    }
}
