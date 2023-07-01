@extends('layouts.app')

@section('content')
    <center><h1>Alumnos Reservados - {{ $horario->fecha }} - {{ $horario->hora_inicio }} a {{ $horario->hora_termino }}</h1></center>

    <form action="{{ route('alumnos.filtrar') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="rut" class="form-control" placeholder="Ingrese el rut del alumno">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>


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
                    <div class="mt-2 d-flex justify-content-between">
                    <form action="{{ route('horarios.cambiarAsistencia', ['reservaId' => $reserva->id, 'estado' => 'presente']) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Marcar Presente</button>
                            <a href="{{ route('horarios.modificarReserva', $reserva->id) }}" class="btn btn-primary">Modificar</a>
                        </form>

                        <form action="{{ route('horarios.eliminarReserva', $reserva->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta inscripción?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar Reserva</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <center><p>No hay alumnos reservados para este horario.</p></center>
    @endif
    <style>
        
body {
      background-image: url("{{ asset('img/fondoGym.jpg') }}");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      height: 100vh;
      color: lightgray;
  }

  h1{
    color: blue;
    font-family: "Times New Roman", Times, serif;
  }

  p{
    color: red;
  }


</style>
@endsection

