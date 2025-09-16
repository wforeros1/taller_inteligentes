<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('medicamentos', function (Blueprint $table) {
            // Para saber si un medicamento es crítico
            $table->boolean('es_critico')->default(false)->after('hora');
            // Para marcar cuándo se tomó por última vez
            $table->timestamp('ultima_toma')->nullable()->after('es_critico');
        });

        Schema::table('recordatorios', function (Blueprint $table) {
            // Para saber cuándo se debe enviar una notificación previa
            $table->integer('minutos_antes_aviso')->default(60)->after('descripcion'); // Ej: 60 min antes
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
};
