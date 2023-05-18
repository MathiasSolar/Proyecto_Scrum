<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';

    protected $primaryKey = 'codigo_carrera';

    protected $fillable = [
        'codigo_carrera',
        'nombre_carrera',
    ];

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'carreras_codigo_carrera');
    }

    public function ayudantes()
    {
        return $this->hasMany(Ayudante::class, 'carreras_codigo_carrera');
    }
}