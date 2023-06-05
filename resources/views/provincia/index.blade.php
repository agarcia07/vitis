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
    <a href="{{ url('provincias/crear') }}" class="btn btn-success m-2">Registrar nueva provincia</a>
    <div class="table-responsive m-2">
        <table id="provincias" class="table table-striped table-bordered shadow-lg" style="white-space: nowrap; overflow-x: auto; text-align: center;">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($provincias as $provincia)
                <tr>
                    <th scope="row">{{ $provincia->id }}</th>
                    <td>{{ $provincia->nombre }}</td>
                    <td>

                        <a class="btn btn-warning" href="{{ url('provincias/editar/'.$provincia->id) }}">Editar</a>

                        <form action="{{ url('/provincias/'.$provincia->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar la provincia?')" value="Borrar">

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
                $('#provincias').DataTable({
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ provincias",
                        "sZeroRecords": "No se encontraron provincias",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando provincias del _START_ al _END_ de un total de _TOTAL_ provincias",
                        "sInfoEmpty": "Mostrando provincias del 0 al 0 de un total de 0 provincias",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ provincias)",
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
                    "lengthMenu": [[5, 10, 15, -1], [5, 10, 50, "Todos"]]
                });
            });
        </script>
        @endsection
        {!! $provincias->links() !!}
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