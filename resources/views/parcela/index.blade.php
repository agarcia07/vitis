@extends('layouts.app')
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
        <table class="table table-striped table-bordered" style="white-space: nowrap; overflow-x: auto; text-align: center;">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cultivo</th>
                    <th scope="col">Plantas totales</th>
                    <th scope="col">Faltas</th>
                    <th scope="col">Imagen</th>
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
                    <th scope="col">Url Sigpac</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parcelas as $parcela)
                <tr>
                    <th scope="row">{{ $parcela->id }}</th>
                    <td>{{ $parcela->nombre }}</td>
                    <td>{{ $parcela->cultivo }}</td>
                    <td>{{ $parcela->num_uni_total }}</td>
                    <td>{{ $parcela->num_uni_falta }}</td>

                    <td>
                        <img class="img-thumbnail img-fluid rounded mx-auto d-block w-25" src="{{asset('storage').'/'.$parcela->imagen}}" alt="">
                    </td>

                    <td>{{ $parcela->provincia_id }}</td>
                    <td>{{ $parcela->municipio_id }}</td>
                    <td>{{ $parcela->agregado }}</td>
                    <td>{{ $parcela->zona }}</td>
                    <td>{{ $parcela->poligono }}</td>
                    <td>{{ $parcela->parcela }}</td>
                    <td>{{ $parcela->superficie_total }}</td>
                    <td>{{ $parcela->superficie_uso }}</td>
                    <td>{{ $parcela->reciento }}</td>
                    <td>{{ $parcela->pendiente }}</td>
                    <td>{{ $parcela->referencia_catastral }}</td>
                    <td>{{ $parcela->url_sigpac }}</td>
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
        {!! $parcelas->links() !!}
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