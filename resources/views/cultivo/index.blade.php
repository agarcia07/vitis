@extends('layouts.app')
@section('content')

<div class="container mw-100">
@if(Session::has('mensaje'))  
<div class="alert alert-success fade show" role="alert" id="alertMes">
    {{ Session::get('mensaje') }}   
</div>
@endif
    <br>
    <a href="{{ url('cultivos/crear') }}" class="btn btn-success m-2">Registrar nuevo cultivo</a>
    <div class="table-responsive m-2">
        <table class="table table-striped table-bordered" style="white-space: nowrap; overflow-x: auto; text-align: center;">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Variedad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cultivos as $cultivo)
                <tr>
                    <th scope="row">{{ $cultivo->id }}</th>
                    <td>{{ $cultivo->nombre }}</td>
                    <td>{{ $cultivo->variedad }}</td>
                    <td>

                        <a class="btn btn-warning" href="{{ url('cultivos/editar/'.$cultivo->id) }}">Editar</a>

                        <form action="{{ url('/cultivos/'.$cultivo->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar el cultivo?')" value="Borrar">

                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $cultivos->links() !!}
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