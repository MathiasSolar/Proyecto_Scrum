<?php

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = [
        'codigo_carrera',
        'nombre_carrera',
    ];

    public function usuarios()
    {
        return $this->hasMany(Alumno::class, 'codigo_carrera');
    }

    public function instructores()
    {
        return $this->hasMany(Ayudante::class, 'codigo_carrera');
    }
}