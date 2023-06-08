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
    <a href="{{ url('propietarios/crear') }}" class="btn btn-success m-2">Registrar nuevo propietario</a>
    <div class="table-responsive m-2">
        <table id="propietarios" class="table table-striped table-bordered shadow-lg" style="white-space: nowrap; overflow-x: auto; text-align: center;">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Número de socio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($propietarios as $propietario)
                <tr>
                    <th scope="row">{{ $propietario->id }}</th>
                    <td>{{ $propietario->nombre }}</td>
                    <td>{{ $propietario->num_socio }}</td>
                    <td>

                        <a class="btn btn-warning" href="{{ url('propietarios/editar/'.$propietario->id) }}">Editar</a>

                        <form action="{{ url('/propietarios/'.$propietario->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar la propietario?')" value="Borrar">

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
                $('#propietarios').DataTable({
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ propietarios",
                        "sZeroRecords": "No se encontraron propietarios",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando propietarios del _START_ al _END_ de un total de _TOTAL_ propietarios",
                        "sInfoEmpty": "Mostrando propietarios del 0 al 0 de un total de 0 propietarios",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ propietarios)",
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
        {!! $propietarios->links() !!}
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