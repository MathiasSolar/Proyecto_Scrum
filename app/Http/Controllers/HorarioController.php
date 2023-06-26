<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Alumno;
use App\Models\Ayudante;
use App\Models\Carrera;
use App\Models\Horario;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

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
        $reserva->fecha_reserva = Carbon::now()->toDateString();
        $reserva->asistencia = "ausente";
        $reserva->horarios_id = $idHorario;
        $reserva->alumnos_rut = $request->get('rut');
        $reserva->ayudantes_rut = "11.111.111-1";

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
            return response()->json([]);
        }
    }

    public function cambiarAsistencia($reservaId, $estado)
    {
        $reserva = Reserva::findOrFail($reservaId);
        // Verificar si el estado de asistencia es válido
        if ($estado === 'ausente' || $estado === 'presente') {
            $reserva->asistencia = $estado;
            $reserva->save();
            // Redireccionar a la página de alumnos reservados o realizar alguna otra acción
            return redirect()->back()->with('success', 'El estado de asistencia se ha actualizado correctamente.');
        } else {
            // Estado de asistencia no válido
            return redirect()->back()->with('error', 'Estado de asistencia no válido.');
        }
    }

    public function modificarReserva($reservaId)
    {
        $reserva = Reserva::findOrFail($reservaId);
        $carreras = Carrera::all(); 
        return view('horarios.modificar_reserva', compact('reserva', 'carreras'));
    }

    public function actualizarReserva(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->alumnos_rut = $request->rut;
    
        // Obtener el alumno asociado a la reserva
        $alumno = $reserva->Alumno;
        $alumno->nombre = $request->nombre;
        $alumno->apellido = $request->apellido;
        $alumno->correo_electronico = $request->email;
        $alumno->carreras_codigo_carrera = $request->carrera;
        $alumno->save();
    
        $reserva->asistencia = $request->asistencia;
        $reserva->save();
    
        return redirect()->route('horarios.alumnosReservados', $reserva->Horario->id)->with('success', 'Reserva actualizada correctamente.');
    }

    public function eliminarReserva(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->back()->with('success', 'La inscripción ha sido eliminada exitosamente.');
    }

    public function buscar(Request $request)
    {
        $hora = Carbon::createFromFormat('H:i', $request->input('hora'))->format('H:i:s');
        $horarios = Horario::where('hora_inicio', '<=', $hora)
            ->where('hora_termino', '>=', $hora)
            ->get();
        return view('horarios.buscar', compact('horarios'));
    }

    public function filtrarAlumnos(Request $request)
    {
        $rut = $request->input('rut');

        // Obtener los alumnos filtrados por rut
        $alumnosFiltrados = Alumno::where('rut', 'like', '%' . $rut . '%')->get();

        return view('horarios.alumnofiltrado', compact('alumnosFiltrados'));
    }

    public function gestorAyudantes()
    {
        $ayudantes = Ayudante::all();
        $carreras = Carrera::all();

        return view('ayudantes.gestor_ayudantes', compact('ayudantes','carreras'));
    }


public function cambiarEstado($rut, $estado)
{
    // Buscar al ayudante por su rut
    $ayudante = Ayudante::where('rut', $rut)->first();

    // Verificar si se encontró el ayudante
    if ($ayudante) {
        // Validar el estado proporcionado
        if ($estado === 'activo' || $estado === 'inhabilitado') {
            $ayudante->estado = $estado;
            $ayudante->save();
            return redirect()->route('ayudantes.gestor_ayudantes')->with('success', 'Estado del ayudante cambiado correctamente');
        } else {
            // Estado no válido
            return redirect()->back()->with('error', 'Estado no válido.');
        }
    } else {
        // No se encontró el ayudante
        return redirect()->back()->with('error', 'Ayudante no encontrado.');
    }
}


    public function nuevoAyudante()
{
    $carreras = Carrera::all();
    return view('ayudantes.nuevo_ayudante', compact('carreras'));
}


public function guardarAyudante(Request $request)
{
    $request->validate([
        'rut' => 'required',
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required|email',
        'carrera' => 'required',
    ]);

    $ayudante = new Ayudante;
    $ayudante->rut = $request->get('rut');
    $ayudante->nombre = $request->get('nombre');
    $ayudante->apellido = $request->get('apellido');
    $ayudante->correo_electronico = $request->get('email');
    $ayudante->carreras_codigo_carrera = $request->get('carrera');
    $ayudante->estado = 'activo';
    $ayudante->save();

    return redirect()->route('ayudantes.gestor_ayudantes')->with('success', 'Ayudante añadido correctamente.');
}


}



