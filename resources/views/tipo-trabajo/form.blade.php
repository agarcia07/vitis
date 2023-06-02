<h1>{{$modo}} Tipo Trabajo</h1>

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as $error )
        <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>

@endif
<div class="form-group">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" class="form-control" value="{{ isset($tipoTrabajo->nombre) ? $tipoTrabajo->nombre : old('nombre') }}" id="nombre"><br>
</div>
<input type="submit" class="btn btn-success" value="{{$modo}} tipo trabajo" id="Enviar">

<a class="btn btn-primary" href="{{ url('tipo-trabajos/') }}">Regresar</a>