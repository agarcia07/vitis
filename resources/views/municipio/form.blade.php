<h1>{{$modo}} Municipio</h1>

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
    <label for="id">Id: </label>
    <input type="text" name="id" class="form-control" value="{{ isset($municipio->id) ? $municipio->id : old('id') }}" id="id"><br>
</div>
<div class="form-group">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" class="form-control" value="{{ isset($municipio->nombre) ? $municipio->nombre : old('nombre') }}" id="nombre"><br>
</div>

<input type="submit" class="btn btn-success" value="{{$modo}} municipio" id="Enviar">

<a class="btn btn-primary" href="{{ url('municipios/') }}">Regresar</a>