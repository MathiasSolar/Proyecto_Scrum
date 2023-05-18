
@extends('layouts.app')

@section('content')
    <h1>Horarios Disponibles</h1>

    @if (count($horarios) > 0)
        <ul class="list-group">
            @foreach ($horarios as $horario)
                <li class="list-group-item">
                    {{ $horario->fecha }} - {{ $horario->hora_inicio }} a {{ $horario->hora_termino }}
                    <span class="badge badge-primary">{{ $horario->cupos_disponibles }}</span>
                    <a href="{{ route('horarios.reservar', $horario->id) }}" class="btn btn-primary float-right">Reservar</a><t>
                    <a href="{{ route('horarios.alumnosReservados', $horario->id) }}" class="btn btn-primary float-right">ver Alumnos</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay horarios disponibles para reserva.</p>
    @endif
@endsection


