<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Horario;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        $horarios->transform(function ($horario) {
            $horario->fecha = Carbon::parse($horario->fecha)->format('d/m/Y');
            return $horario;
        });
        return view('horarios.index', compact('horarios'));
    }

    public function reservar(Horario $horario)
    {   
        $carreras = Carrera::all();
        return view('horarios.reservar', compact('horario', 'carreras'));
    }

    // public function guardarReserva(Request $request, Horario $horario)
    public function guardarReserva(String $idHorario, Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
        ]);

        $alumno = Alumno::where('rut', $request->get('rut'))->first();

        if (!$alumno) {
            $alumno = new Alumno;
            $alumno->rut = $request->get('rut');
            $alumno->nombre = $request->get('nombre');
            $alumno->apellido = $request->get('apellido');
            $alumno->correo_electronico = $request->get('email');
            $alumno->carreras_codigo_carrera = $request->get('carrera');
            $alumno->save();
        }

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

    public function generarHorarios()
    {
        $horariosExistentes = Horario::count();

        if ($horariosExistentes === 0) {
            $inicio = Carbon::parse('09:00'); // Hora de inicio del primer horario
            $duracion = 60; // Duración de cada horario en minutos

            $fecha = Carbon::tomorrow()->toDateString(); // Fecha de mañana

            for ($i = 0; $i < 10; $i++) {
                $horario = new Horario;
                $horario->fecha = $fecha;
                $horario->hora_inicio = $inicio->toTimeString();
                $horario->hora_termino = $inicio->addMinutes($duracion)->toTimeString();
                $horario->estado = 'disponible';
                $horario->cupos_disponibles = 30;

                $horario->save();
            }
        }

        return redirect()->route('horarios.index');
    }



    public function buscarAlumno(Request $request)
    {
        $rut = $request->input('rut');

        $alumno = Alumno::where('rut', $rut)->first();

        if ($alumno) {
            return response()->json([
                'nombre' => $alumno->nombre,
                'apellido' => $alumno->apellido,
                'correo' => $alumno->correo_electronico,
                'carrera' => $alumno->carreras_codigo_carrera,
            ]);
        } else {
            return response()->json(['mensaje' => 'Alumno no registrado']);
        }
    }   



}


