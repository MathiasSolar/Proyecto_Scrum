<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';

    protected $primaryKey = 'rut';

    protected $fillable = [
        'rut',
        'nombre',
        'apellido',
        'correo_electronico',
        'carreras_codigo_carrera',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carreras_codigo_carrera');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'alumnos_rut');
    }
}
