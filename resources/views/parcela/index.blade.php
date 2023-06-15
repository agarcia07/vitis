@extends('layouts.app')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="container mw-100">
    @if(Session::has('mensaje'))
    <div class="alert alert-success fade show" role="alert" id="alertMes">
        {{ Session::get('mensaje') }}
    </div>
    @endif
    <br>
    <a href="{{ url('parcelas/crear') }}" class="btn btn-success m-2">Registrar nueva parcela</a>
    <div class="table-responsive m-2">
        <table id="parcelas" class="table table-striped table-bordered shadow-lg" style="width:100%; white-space: nowrap; overflow-x: auto; text-align: center;">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Cultivo</th>
                    <th scope="col">Plantas totales</th>
                    <th scope="col">Faltas</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Municipio</th>
                    <th scope="col">Agregado</th>
                    <th scope="col">Zona</th>
                    <th scope="col">Polígono</th>
                    <th scope="col">Parcela</th>
                    <th scope="col">Superficie total (ha)</th>
                    <th scope="col">Superficie en uso (ha)</th>
                    <th scope="col">Recinto</th>
                    <th scope="col">Pendiente</th>
                    <th scope="col">Referencia catastral</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos['parcelas'] as $parcela)
                <tr>
                    <th scope="row">{{ $parcela->id }}</th>
                    <td>{{ $parcela->nombre }}</td>
                    <td>{{ $parcela->propietario }}</td>
                    <td>{{ $parcela->cultivo }}</td>
                    <td>{{ $parcela->num_uni_total }}</td>
                    <td>{{ $parcela->num_uni_falta }}</td>
                    @foreach($datosProvincias['datosProvincias'] as $datosProvincia)
                    @php
                    if($datosProvincia->id == $parcela->provincia_id) {
                    @endphp
                    <td>{{ $datosProvincia->nombre }}</td>
                    @php
                    }
                    @endphp
                    @endforeach
                    @foreach($datosMunicipios['datosMunicipios'] as $datosMunicipio)
                    @php
                    if($datosMunicipio->id == $parcela->municipio_id) {
                    @endphp
                    <td>{{ $datosMunicipio->nombre }}</td>
                    @php
                    }
                    @endphp
                    @endforeach
                    <td>{{ $parcela->agregado }}</td>
                    <td>{{ $parcela->zona }}</td>
                    <td>{{ $parcela->poligono }}</td>
                    <td>{{ $parcela->parcela }}</td>
                    <td>{{ $parcela->superficie_total }}</td>
                    <td>{{ $parcela->superficie_uso }}</td>
                    <td>{{ $parcela->recinto }}</td>
                    <td>{{ $parcela->pendiente }}</td>
                    <td>{{ $parcela->referencia_catastral }}</td>
                    <td>

                        <a class="btn btn-warning" href="{{ url('parcelas/editar/'.$parcela->id) }}">Editar</a>

                        <form action="{{ url('/parcelas/'.$parcela->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar la parcela?')" value="Borrar">

                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#parcelas').DataTable({
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ parcelas",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando parcelas del _START_ al _END_ de un total de _TOTAL_ parcelas",
                        "sInfoEmpty": "Mostrando parcelas del 0 al 0 de un total de 0 parcelas",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ parcelas)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },
                    "lengthMenu": [
                        [5, 10, 15, -1],
                        [5, 10, 50, "Todas"]
                    ]
                });
            });
        </script>
        @endsection
        {!! $datos['parcelas']->links() !!}
    </div>
</div>

<script>
    // Obten el elemento del alert
    var alert = document.getElementById('alertMes');

    // Desvanecer y ocultar el alert después de 5 segundos
    setTimeout(function() {
        alert.classList.remove('show');
    }, 5000);
</script>

@endsection