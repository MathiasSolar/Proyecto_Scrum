@extends('layouts.app')

@section('content')
    <center><h1>Gestor de Ayudantes</h1></center>

    <table class="table">
        <thead>
            <tr>
                <th>Rut</th>
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
                <td>{{ $ayudante->rut }}</td>
                <td>{{ $ayudante->nombre }}</td>
                <td>{{ $ayudante->apellido }}</td>
                <td>{{ $ayudante->correo_electronico }}</td>
                <td>{{ $ayudante->carrera->nombre_carrera }}</td>
                <td>
                    @if ($ayudante->estado === 'activo')
                        Activo
                        <td>
                        <form action="{{ route('ayudantes.cambiarEstado', ['rut' => $ayudante->rut, 'estado' => 'inhabilitado']) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit">Inhabilitar</button>
                        </form>
                        </td>
                    @else
                        Inhabilitado
                        <td>
                        <form action="{{ route('ayudantes.cambiarEstado', ['rut' => $ayudante->rut, 'estado' => 'activo']) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit">Activar</button>
                        </form>
                        </td>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <a href="" class="btn btn-primary">Añadir Ayudante</a>
    </div>
@endsection
