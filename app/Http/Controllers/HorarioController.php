<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        return view('horarios.index', compact('horarios'));
    }

    public function reservar(Horario $horario)
    {
        return view('horarios.reservar', compact('horario'));
    }

    public function guardarReserva(Request $request, Horario $horario)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
        ]);

        $horario->save();

        return redirect()->route('horarios.index')->with('success', 'Reserva realizada correctamente.');
    }

    public function alumnosReservados(Horario $horario)
    {
        $alumnos = $horario->reservas()->with('alumno')->get();
        return view('horarios.alumnos_reservados', compact('horario', 'alumnos'));
    }
}
