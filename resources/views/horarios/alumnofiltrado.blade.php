@extends('layouts.app')

@section('content')
    <center><h1>Alumno Reservado</h1></center>
    @if (count($alumnosFiltrados) > 0)
        <ul class="list-group">
            @foreach ($alumnosFiltrados as $alumno)
                <li class="list-group-item">
                    <strong>Rut:</strong> {{ $alumno->rut }} <br>
                    <strong>Nombre:</strong> {{ $alumno->nombre }} <br>
                    <strong>Apellido:</strong> {{ $alumno->apellido }} <br>
                    <strong>Correo Electrónico:</strong> {{ $alumno->correo_electronico }} <br>
                    <strong>Carrera:</strong> {{ $alumno->carrera->nombre_carrera }} <br>

                </li>
            @endforeach
        </ul>
    @else
        <p>El Rut del alumno no existe.</p>
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
</style>
@endsection