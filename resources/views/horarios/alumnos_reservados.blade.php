@extends('layouts.app')

@section('content')
    <h1>Alumnos Reservados - {{ $horario->fecha }} - {{ $horario->hora_inicio }} a {{ $horario->hora_termino }}</h1>

    @if (count($alumnos) > 0)
        <ul class="list-group">
            @foreach ($alumnos as $alumno)
                <li class="list-group-item">{{ $alumno->alumno->nombre }} {{ $alumno->alumno->apellido }} ({{ $alumno->alumno->correo_electronico }})</li>
            @endforeach
        </ul>
    @else
        <p>No hay alumnos reservados para este horario.</p>
    @endif
@endsection