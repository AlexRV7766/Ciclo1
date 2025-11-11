<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $table = 'dias';

    protected $fillable = ['nombre'];

    public function horarios()
    {
        return $this->belongsToMany(Horario::class, 'dia_horario', 'dia_id', 'horario_id');
    }
}
