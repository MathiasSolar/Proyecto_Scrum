@extends('layouts.app')

@section('content')
    <center><h1>Alumnos Reservados - {{ $horario->fecha }} - {{ $horario->hora_inicio }} a {{ $horario->hora_termino }}</h1></center>

    @if (count($reservas) > 0)
        <ul class="list-group">
            @foreach ($reservas as $reserva)
                <li class="list-group-item">
                    <strong>Rut:</strong> {{ $reserva->alumnos_rut }} <br>
                    <strong>Nombre:</strong> {{ $reserva->Alumno->nombre }} <br>
                    <strong>Apellido:</strong> {{ $reserva->Alumno->apellido }} <br>
                    <strong>Correo Electrónico:</strong> {{ $reserva->Alumno->correo_electronico }} <br>
                    <strong>Carrera:</strong> {{ $reserva->Alumno->carrera->nombre_carrera }} <br>

                    <strong>Asistencia:</strong>
                    @if ($reserva->asistencia === 'presente')
                        <span class="badge bg-success">Presente</span>
                    @else
                        <span class="badge bg-danger">Ausente</span>
                    @endif

                    <div class="mt-2">
                        <form action="{{ route('horarios.cambiarAsistencia', ['reservaId' => $reserva->id, 'estado' => ($reserva->asistencia === 'presente' ? 'ausente' : 'presente')]) }}" method="POST">
                            @csrf
                            <a href="{{ route('horarios.modificarReserva', $reserva->id) }}" class="btn btn-primary">Modificar</a>

                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay alumnos reservados para este horario.</p>
    @endif
@endsection
