<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Horario;
use App\Models\Reserva;
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

    // public function guardarReserva(Request $request, Horario $horario)
    public function guardarReserva(String $idHorario, Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
        ]);

        $alumno = new Alumno;
        $alumno->rut = $request->get('rut');
        $alumno->nombre = $request->get('nombre');
        $alumno->apellido = $request->get('apellido');
        $alumno->correo_electronico = $request->get('email');
        $alumno->carreras_codigo_carrera = $request->get('carrera');

        $alumno->save();

        $reserva = new Reserva;
        $reserva->fecha_reserva = "";
        $reserva->asistencia = "";
        $reserva->horarios_id = $idHorario;
        $reserva->alumnos_rut = $request->get('rut');
        $reserva->ayudantes_rut = "19128143-1";

        $reserva->save();

        return redirect()->route('horarios.index')->with('success', 'Reserva realizada correctamente.');
    }

    public function alumnosReservados(Horario $horario)
    {
        $reservas = $horario->reservas()->with('alumno')->get();

        return view('horarios.alumnos_reservados', compact('horario', 'reservas'));
    }
}
