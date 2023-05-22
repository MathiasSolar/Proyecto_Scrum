@extends('layouts.app')

@section('content')
    <h1>Reservar Horario</h1>

    <form action="{{ route('horarios.guardarReserva', $horario->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="rut">Rut:</label>
            <input type="text" name="rut" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="carrera">Carerra:</label>
            <input type="text" name="carrera" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Reservar</button>
    </form>
@endsection