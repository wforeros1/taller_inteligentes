<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordatorio extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'tipo', 'fecha_hora', 'descripcion', 'minutos_antes_aviso'];

    protected $casts = [
        'fecha_hora' => 'datetime',
    ];
}
