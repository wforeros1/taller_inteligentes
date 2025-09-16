<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nombre', 'dosis', 'hora', 'es_critico', 'ultima_toma'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
