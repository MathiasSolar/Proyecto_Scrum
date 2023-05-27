@extends('layouts.app')

@section('content')
    <h1>Horarios Disponibles</h1>

    @if (count($horarios) > 0)
        <ul class="list-group">
            @foreach ($horarios as $horario)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        {{ $horario->fecha }} - {{ Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }} a {{ Carbon\Carbon::parse($horario->hora_termino)->format('H:i') }}
                        <span class="badge text-bg-primary">{{ $horario->cupos_disponibles }}</span>
                    </div>
                        <div>
                            <a href="{{ route('horarios.alumnosReservados', $horario->id) }}" class="btn btn-primary">Ver Alumnos</a>
                            <a href="{{ route('horarios.reservar', $horario->id) }}" class="btn btn-primary">Reservar</a>
                        </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay horarios disponibles para reserva.</p>
        <a href="{{ route('horarios.generar') }}" class="btn btn-primary">Generar Horarios</a>
    @endif
@endsection
