@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Horarios Disponibles</h1>
<br>
        <div class="d-flex align-items-center">
    <form action="{{ route('horarios.buscar') }}" method="GET" class="form-inline">
        <div class="form-group mr-2">
            <label for="hora" class="mr-2" style="font-size: 22px;">Buscar por hora:</label>
            <input type="time" id="hora" name="hora" style="font-size: 22px; padding: 0.25rem 2rem;">
        </div>
        <button type="submit" class="btn btn-primary" style="font-size: 18px; padding: 0.5rem 1rem; margin-top: 0;">Buscar</button>
    </form>
</div>

        <br>
        @if (count($horarios) > 0)
            <ul class="list-group">
                @foreach ($horarios as $horario)
                    @if ($horario->cupos_disponibles >= 20)
                        <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
                            <div>
                                {{ $horario->fecha }} - {{ Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }} a {{ Carbon\Carbon::parse($horario->hora_termino)->format('H:i') }}
                                <span class="badge text-bg-light">{{ $horario->cupos_disponibles }}</span>
                            </div>
                            <div>
                                <a href="{{ route('horarios.alumnosReservados', $horario->id) }}" class="btn btn-light">Ver Inscritos</a>
                                <a href="{{ route('horarios.reservar', $horario->id) }}" class="btn btn-light">Reservar</a>
                            </div>
                        </li>
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
                        </li>
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
            <p class="text-center">No hay horarios disponibles para reserva.</p>
            <div class="text-center">
                <a href="{{ route('horarios.generar') }}" class="btn btn-primary">Generar Horarios</a>
            </div>
        @endif
    </div>

    <style>
  body {
      background-image: url("{{ asset('img/ejemplogim.jpg') }}");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      height: 100vh;
  }

  h1{
    font-family: "Times New Roman", Times, serif;
  }
</style>
@endsection
