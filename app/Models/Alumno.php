<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';

    protected $fillable = [
        'rut',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo_electronico',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'rut_alumno');
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'rut_alumno');
    }
}