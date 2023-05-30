@extends('layouts.app')

@section('content')
    <h1>Reservar Horario</h1>

    <form action="{{ route('horarios.guardarReserva', $horario->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="rut">Rut:</label>
            <input type="text" name="rut" id="rut" placeholder="Ingrese el RUT del alumno con punto y guion" class="form-control" required>
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
            <button type="submit" class="btn btn-primary">Reservar</button>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#rut').on('blur', function() {
            var rut = $(this).val();

            $.ajax({
                url: "{{ route('buscarAlumno') }}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'rut': rut
                },
                success: function(response) {
                    if (response.nombre) {
                        // El alumno está registrado, llenar los campos
                        $('#nombre').val(response.nombre);
                        $('#apellido').val(response.apellido);
                        $('#email').val(response.correo);
                        $('#carrera').val(response.carrera);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
             });
         });
        });
    </script>
@endsection
