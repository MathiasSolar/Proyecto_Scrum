@extends('layouts.app')

@section('content')
    <center><h1>Horarios Disponibles</h1> </center>

    @if (count($horarios) > 0)
        <ul class="list-group">
            @foreach ($horarios as $horario)
                @if ($horario->cupos_disponibles >= 20 )
                    <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
                        <div>
                            {{ $horario->fecha }} - {{ Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }} a {{ Carbon\Carbon::parse($horario->hora_termino)->format('H:i') }}
                            <span class="badge text-bg-light">{{ $horario->cupos_disponibles }}</span>
                        </div>
                            <div>
                                <a href="{{ route('horarios.alumnosReservados', $horario->id) }}" class="btn btn-light">Ver Inscritos</a>
                                <a href="{{ route('horarios.reservar', $horario->id) }}" class="btn btn-light">Reservar</a>
                            </div>
                @elseif ($horario->cupos_disponibles >= 10)
                <li class="list-group-item list-group-item-warning d-flex justify-content-between align-items-center">
                        <div>
                            {{ $horario->fecha }} - {{ Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }} a {{ Carbon\Carbon::parse($horario->hora_termino)->format('H:i') }}
                            <span class="badge text-bg-light">{{ $horario->cupos_disponibles }}</span>
                        </div>
                            <div>
                                <a href="{{ route('horarios.alumnosReservados', $horario->id) }}" class="btn btn-light">Ver Inscritos</a>
                                <a href="{{ route('horarios.reservar', $horario->id) }}" class="btn btn-light">Reservar</a>
                            </div>

                @elseif ($horario->cupos_disponibles <= 10)
                <li class="list-group-item list-group-item-danger d-flex justify-content-between align-items-center">
                        <div>
                            {{ $horario->fecha }} - {{ Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }} a {{ Carbon\Carbon::parse($horario->hora_termino)->format('H:i') }}
                            <span class="badge text-bg-light">{{ $horario->cupos_disponibles }}</span>
                        </div>
                            <div>
                                <a href="{{ route('horarios.alumnosReservados', $horario->id) }}" class="btn btn-light">Ver Inscritos</a>
                                <a href="{{ route('horarios.reservar', $horario->id) }}" class="btn btn-light">Reservar</a>
                            </div>
                    </li>
                @endif
            @endforeach
        </ul>
    @else
        <p>No hay horarios disponibles para reserva.</p>
        <a href="{{ route('horarios.generar') }}" class="btn btn-primary">Generar Horarios</a>
    @endif
@endsection
