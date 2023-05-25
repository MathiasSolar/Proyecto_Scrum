@extends('layouts.app')

@section('content')
    <h1>Alumnos Reservados - {{ $horario->fecha }} - {{ $horario->hora_inicio }} a {{ $horario->hora_termino }}</h1>

    @if (count($reservas) > 0)
        <ul class="list-group">
            @foreach ($reservas as $reserva)
                <li class="list-group-item">
                    <strong>Rut:</strong> {{ $reserva->Alumno->rut }} <br>
                    <strong>Nombre:</strong> {{ $reserva->Alumno->nombre }} <br>
                    <strong>Apellido:</strong> {{ $reserva->Alumno->apellido }} <br>
                    <strong>Correo Electrónico:</strong> {{ $reserva->Alumno->correo_electronico }} <br>
                    <strong>Carrera:</strong> {{ $reserva->Alumno->carrera->nombre_carrera }} <br>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay alumnos reservados para este horario.</p>
    @endif
@endsection