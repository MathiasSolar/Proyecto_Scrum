<table>
    <thead>
        <tr>
            <th>Horario</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($horarios as $horario)
        <tr>
            <td>{{$horario->hora_inicio }}</td>
            <td>{{$horario->hora_termino }}</td>
            <td>{{$horario->cupos }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
