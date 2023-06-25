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
                <th>Accion</th>
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
                        <form action="{{ route('ayudantes.cambiarEstado', ['ayudante' => $ayudante->rut, 'estado' => 'inhabilitado']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit">Inhabilitar</button>
                        </form>
                    @else
                        Inhabilitado
                        <form action="{{ route('ayudantes.cambiarEstado', ['ayudante' => $ayudante->rut, 'estado' => 'activo']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit">Activar</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach

@endsection