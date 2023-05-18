<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        'id_horario',
        'rut_alumno',
        'rut_ayudante',
        'fecha_reserva',
        'asistencia',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class,'rut_alumno');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class,'id_horario');
    }

    public function ayudante()
    {
        return $this->belongsTo(Ayudante::class,'rut_ayudante');
    }
}