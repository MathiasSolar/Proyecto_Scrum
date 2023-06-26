@extends('layouts.app')

@section('content')
    <center><h1>Añadir Ayudante</h1></center>

    <form action="{{ route('ayudantes.guardar_ayudante') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="rut">Rut:</label>
            <input type="text" name="rut" id="rut" placeholder="Ingrese el RUT del ayudante con punto y guion" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="carrera">Carrera:</label>
            <select name="carrera" id="carrera" class="form-control" required>
                <option value="">Seleccionar carrera</option>
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->codigo_carrera }}">{{ $carrera->nombre_carrera }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Añadir</button>
        </div>
    </form>

    <style>
  body {
      background-image: url("{{ asset('img/ejemplogim.jpg') }}");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      height: 100vh;
      
      
  }
</style>
@endsection
