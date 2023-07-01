@extends('layouts.app')

@section('content')
    <center><h1>Modificar Reserva</h1></center>

    <form action="{{ route('horarios.actualizarReserva', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="rut">Rut:</label>
            <input type="text" name="rut" id="rut" value="{{ $reserva->alumnos_rut }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $reserva->Alumno->nombre }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="{{ $reserva->Alumno->apellido }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" value="{{ $reserva->Alumno->correo_electronico }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="carrera">Carrera:</label>
            <select name="carrera" id="carrera" class="form-control" required>
                <option value="">Seleccionar carrera</option>
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->codigo_carrera }}" @if ($reserva->Alumno->carreras_codigo_carrera == $carrera->codigo_carrera) selected @endif>{{ $carrera->nombre_carrera }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="asistencia">Asistencia:</label>
            <select name="asistencia" id="asistencia" class="form-control" required>
                <option value="presente" @if ($reserva->asistencia == 'presente') selected @endif>Presente</option>
                <option value="ausente" @if ($reserva->asistencia == 'ausente') selected @endif>Ausente</option>
            </select>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>

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
</style>
@endsection
