<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        'rut_alumno',
        'fecha_reserva',
        'hora_reserva',
        'hora_elegida',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'rut_alumno');
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'id_reserva');
    }
}