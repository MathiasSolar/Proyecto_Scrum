@extends('layouts.app')

@section('content')
    <center><h1>Gestor de Ayudantes</h1></center>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo Electrónico</th>
                <th>Carrera</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($ayudantes as $ayudante)
    <tr>
        <td>{{ $ayudante->nombre }}</td>
        <td>{{ $ayudante->apellido }}</td>
        <td>{{ $ayudante->correo_electronico }}</td>
        <td>{{ $ayudante->carrera->nombre_carrera }}</td>
        <td>
            @if ($ayudante->estado === 'activo')
                Activo
                <td>
                <form action="{{ route('ayudantes.cambiarEstado', ['nombre' => $ayudante->nombre, 'estado' => 'inhabilitado']) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-danger">Inhabilitar</button>
                </form>
                </td>
            @else
                Inhabilitado
                <td>
                <form action="{{ route('ayudantes.cambiarEstado', ['nombre' => $ayudante->nombre, 'estado' => 'activo']) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-success">Activar</button>
                </form>
                </td>
            @endif
        </td>
    </tr>
@endforeach

        </tbody>
    </table>
    <div class="text-center">
    <a href="{{ route('ayudantes.nuevo_ayudante') }}" class="btn btn-primary">Añadir Ayudante</a>


    </div>
@endsection
