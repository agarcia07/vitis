<h1>{{$modo}} Propietario</h1>

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
    <input type="text" name="nombre" class="form-control" value="{{ isset($propietario->nombre) ? $propietario->nombre : old('nombre') }}" id="nombre"><br>
</div>
<div class="form-group">
    <label for="num_socio">Número Socio: </label>
    <input type="text" name="num_socio" class="form-control" value="{{ isset($propietario->num_socio) ? $propietario->num_socio : old('num_socio') }}" id="num_socio"><br>
</div>

<input type="submit" class="btn btn-success" value="{{$modo}} propietario" id="Enviar">

<a class="btn btn-primary" href="{{ url('propietarios/') }}">Regresar</a>