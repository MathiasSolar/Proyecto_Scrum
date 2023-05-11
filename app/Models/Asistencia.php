<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $table = 'asistencias';

    protected $fillable = [
        'id_reserva',
        'rut_alumno',
        'hora_reservada',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'rut_alumno');
    }
}