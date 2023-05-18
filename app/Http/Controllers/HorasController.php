<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorasController extends Controller
{
    public function verHoras() 
    {

        $horarios = Horario::latest()->paginate(10);

        return view('horas',compact('horarios'));
    }
}