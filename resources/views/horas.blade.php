<table>
    <thead>
        <tr>
            <th>Horario</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($horario as $id)
        <tr>
            <td>{{ $horario->Horario }}</td>
            <td>{{ $hora->descripcion }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
