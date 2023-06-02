@extends('layouts.app')
@section('content')

<div class="container mw-100">
@if(Session::has('mensaje'))  
<div class="alert alert-success fade show" role="alert" id="alertMes">
    {{ Session::get('mensaje') }}   
</div>
@endif
    <br>
    <a href="{{ url('trabajos/crear') }}" class="btn btn-success m-2">Registrar nuevo trabajo</a>
    <div class="table-responsive m-2">
        <table class="table table-striped table-bordered" style="white-space: nowrap; overflow-x: auto; text-align: center;">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha realización</th>
                    <th scope="col">Parcela trabajada</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trabajos as $trabajo)
                <tr>
                    <th scope="row">{{ $trabajo->id }}</th>
                    <td>{{ $trabajo->nombre }}</td>
                    <td>{{ $trabajo->fecha_realizacion }}</td>
                    <td>{{ $trabajo->nombre_parcela }}</td>
                    <td>

                        <a class="btn btn-warning" href="{{ url('trabajos/editar/'.$trabajo->id) }}">Editar</a>

                        <form action="{{ url('/trabajos/'.$trabajo->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar el trabajo?')" value="Borrar">

                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $trabajos->links() !!}
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