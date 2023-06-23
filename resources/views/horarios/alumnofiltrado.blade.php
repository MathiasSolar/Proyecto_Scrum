@extends('layouts.app')

@section('content')
    <h1>Alumno Reservado</h1>
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
@endsection