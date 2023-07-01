@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Horarios Buscado</h1>
<br>
<br>
        @if (count($horarios) > 0)
            <ul class="list-group">
                @foreach ($horarios as $horario)
                    @if ($horario->cupos_disponibles >= 20)
                        <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
                            <div>
                                {{ $horario->fecha }} - {{ Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }} a {{ Carbon\Carbon::parse($horario->hora_termino)->format('H:i') }}
                                <span class="badge text-bg-light">{{ $horario->cupos_disponibles }}</span>
                                <br>
                            </div>
                            <div>
                                <br><br>
                                <a href="{{ route('horarios.alumnosReservados', $horario->id) }}" class="btn btn-light">Ver Inscritos</a>
                                <a href="{{ route('horarios.reservar', $horario->id) }}" class="btn btn-light">Reservar</a>
                                <br>
                                <br><br>
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
            <br>
            <br>
            <h2 class="text-center">El horario que ha buscado no existe.</h2>
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




