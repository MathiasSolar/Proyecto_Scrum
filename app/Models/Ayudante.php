<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayudante extends Model
{
    use HasFactory;

    protected $table = 'ayudantes';

    protected $fillable = [
        'rut',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo_electronico',
    ];

}