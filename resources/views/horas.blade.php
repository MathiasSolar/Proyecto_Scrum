<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios</title>
</head>

<body>

    <h1>Horarios Disponibles</h1>
    <label for="busqueda">Buscar:</label>
    <input type="text" id="busqueda" name="busqueda">
    <button type="button" id="btn-busqueda">Buscar</button>
    <table>
        <thead>
            <tr>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Cupos</th>
            </tr>
        </thead>
    <tbody>
        @foreach ($horarios as $horario)
        <tr>
            <td>{{$horario->hora_inicio}}</td>
            <td>{{$horario->hora_termino}}</td>
            <td>&nbsp;{{$horario->cupos}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>

