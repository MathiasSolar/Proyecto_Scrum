<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = [
        'fecha',
        'hora_inicio',
        'hora_termino',
        'estado',
        'cupos_disponibles',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'horarios_id');
    }
}