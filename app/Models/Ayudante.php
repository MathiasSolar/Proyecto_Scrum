<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ayudante extends Model
{
    protected $table = 'ayudantes';

    protected $primaryKey = 'rut';

    protected $fillable = [
        'rut',
        'nombre',
        'apellido',
        'correo_electronico',
        'contraseña',
        'carreras_codigo_carrera',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carreras_codigo_carrera');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'ayudantes_rut');
    }
}