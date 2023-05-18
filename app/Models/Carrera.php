<?php

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = [
        'codigo_carrera',
        'nombre_carrera',
    ];

    public function alumnos()
    {
        return $this->hasMany(Alumno::class,'rut_alumno');
    }

    public function ayudantes()
    {
        return $this->hasMany(Ayudante::class,'rut_ayudante');
    }
}