@extends('layouts.app')
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
        <table class="table table-striped table-bordered" style="white-space: nowrap; overflow-x: auto; text-align: center;">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
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