<!DOCTYPE html>
<html>
<head>
    <title>PDF Generado</title>
    <link href="{{public_path('css/styles.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Parcelas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    @foreach($propietarios as $propietario)
    <h3 class="center">{{$propietario['nombre']}}</h3>
        <table>
            <thead>
                <tr>
                    <th>{{$fechaPdf}}</th>
                    @foreach($tipoTrabajos as $tipoTrabajo)
                        @php if ($tipoTrabajo['nombre'] == 'Labrar x2') {continue;} @endphp
                        <th>{{$tipoTrabajo['nombre']}}</th>
                    @endforeach
                </tr>

            </thead>
            <tbody>
                @foreach($parcelas as $parcela)
                @php if ($propietario['nombre'] != $parcela['propietario']) {continue;} @endphp
                    @php if ($parcela['cultivo'] == 'Sin cultivar') {continue;} @endphp
                <tr>
                    <td>{{ $parcela['nombre'] }}</td>
                    @foreach($tipoTrabajos as $tipoTrabajo)
                        @php if ($tipoTrabajo['nombre'] == 'Labrar x2') {continue;} @endphp
                        @php
                            $webvitisController = new App\Http\Controllers\WebvitisController();
                            if ($tipoTrabajo['nombre'] == 'Labrar') {
                            $resultado = $webvitisController->obtenerDatos($tipoTrabajo['nombre'], $parcela['nombre']);
                            $cadena1 = str_repeat('X ', $resultado);

                            $resultado2 = $webvitisController->obtenerVueltasLabrar($parcela['nombre']);
                            $cadena2 = str_repeat('O ', $resultado2);

                            $cadenaX = $cadena1 . $cadena2;
                            } else {

                            $resultado = $webvitisController->obtenerDatos($tipoTrabajo['nombre'], $parcela['nombre']);
                            $cadenaX = str_repeat('X ', $resultado);

                            }
                            @endphp



                            <td>{{$cadenaX}}</td>

                        @endforeach
                </tr>
                @endforeach
            </tbody>
        </table><br>
        @foreach($parcelas as $parcela)
                @php if ($parcela['cultivo'] != 'Sin cultivar') {continue;} @endphp 
                @php if ($propietario['nombre'] != $parcela['propietario']) {continue;} @endphp
                <h3 class="center">{{$propietario['nombre']}} - Sin cultivar</h3>
        <table>
            <thead>
                <tr>
                    <th>{{$fechaPdf}}</th>
                    @foreach($tipoTrabajos as $tipoTrabajo)
                        @php if ($tipoTrabajo['nombre'] == 'Labrar x2') {continue;} @endphp
                        <th>{{$tipoTrabajo['nombre']}}</th>
                    @endforeach
                </tr>

            </thead>
            <tbody>
                @foreach($parcelas as $parcela)
                @php if ($parcela['cultivo'] != 'Sin cultivar') {continue;} @endphp 
                @php if ($propietario['nombre'] != $parcela['propietario']) {continue;} @endphp
                <tr>
                    <td>{{ $parcela['nombre'] }}</td>
                    @foreach($tipoTrabajos as $tipoTrabajo)
                        @php if ($tipoTrabajo['nombre'] == 'Labrar x2') {continue;} @endphp
                        @php
                            $webvitisController = new App\Http\Controllers\WebvitisController();
                            if ($tipoTrabajo['nombre'] == 'Labrar') {
                            $resultado = $webvitisController->obtenerDatos($tipoTrabajo['nombre'], $parcela['nombre']);
                            $cadena1 = str_repeat('X ', $resultado);

                            $resultado2 = $webvitisController->obtenerVueltasLabrar($parcela['nombre']);
                            $cadena2 = str_repeat('O ', $resultado2);

                            $cadenaX = $cadena1 . $cadena2;
                            } else {

                            $resultado = $webvitisController->obtenerDatos($tipoTrabajo['nombre'], $parcela['nombre']);
                            $cadenaX = str_repeat('X ', $resultado);

                            }
                            @endphp



                            <td>{{$cadenaX}}</td>

                        @endforeach
                </tr>
                @endforeach
            </tbody>
        </table><br>
        @endforeach
    @endforeach
</body>
</html>

</body>
</html>