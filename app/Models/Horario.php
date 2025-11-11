<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario'; // nombre exacto de tu tabla
    protected $fillable = [
        'hora_inicio',
        'hora_fin',
    ];

    // 🔹 Relación con dias
    public function dias()
    {
        return $this->belongsToMany(Dia::class, 'dia_horario', 'horario_id', 'dia_id');
    }
}
