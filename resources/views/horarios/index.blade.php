@extends('layouts.app')

@section('content')
    <h1>Horarios Disponibles</h1>

    @if (count($horarios) > 0)
        <ul class="list-group">
            @foreach ($horarios as $horario)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        {{ $horario->fecha }} - {{ $horario->hora_inicio }} a {{ $horario->hora_termino }}
                    </div>
                    <div class="d-flex align-items-center ml-auto">
                        <span class="badge badge-primary mr-2">{{ $horario->cupos_disponibles }}</span>
                        <div>
                            <a href="{{ route('horarios.alumnosReservados', $horario->id) }}" class="btn btn-primary">Ver Alumnos</a>
                            <a href="{{ route('horarios.reservar', $horario->id) }}" class="btn btn-primary">Reservar</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay horarios disponibles para reserva.</p>
        <a href="{{ route('horarios.generar') }}" class="btn btn-primary">Generar Horarios</a>
    @endif
@endsection
