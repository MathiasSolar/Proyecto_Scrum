@extends('layouts.app')

@section('content')
    <h1>Alumnos Reservados - {{ $horario->fecha }} - {{ $horario->hora_inicio }} a {{ $horario->hora_termino }}</h1>

    @if (count($reservas) > 0)
        <ul class="list-group">
            @foreach ($reservas as $reserva)
            <li class="list-group-item">{{ $reserva->alumnos_rut }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay alumnos reservados para este horario.</p>
    @endif
@endsection