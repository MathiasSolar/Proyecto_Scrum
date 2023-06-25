<?php

namespace App\Http\Controllers;

use App\Models\Ayudante;
use App\Models\Carrera;
use Illuminate\Http\Request;

class AyudanteController extends Controller
{
    public function gestorAyudantes()
    {
        $ayudantes = Ayudante::all();
        $carreras = Carrera::all();

        return view('gestor_ayudantes', compact('ayudantes','carreras'));
    }

    public function editarEstado($id)
    {
        $ayudante = Ayudante::findOrFail($id);
        $ayudante->estado = ($ayudante->estado === 'activo') ? 'inhabilitado' : 'activo';
        $ayudante->save();

        return redirect()->route('gestor_ayudantes')->with('success', 'Estado del ayudante actualizado correctamente.');
    }
}
