<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'fecha_reserva',
        'asistencia',
        'horarios_id',
        'alumnos_rut',
        'ayudantes_rut',
    ];

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horarios_id');
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumnos_rut');
    }

    public function ayudante()
    {
        return $this->belongsTo(Ayudante::class, 'ayudantes_rut');
    }
}

