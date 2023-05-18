<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = [
        'fecha',
        'hora_inicio',
        'hora_fin',
        'estado',
        'cupos',
    ];

    public function reservas()
    {
        return $this->belongsTo(Reserva::class,'id_reserva');
    }

}