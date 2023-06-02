<h1>{{$modo}} Cultivo</h1>

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
    <input type="text" name="nombre" class="form-control" value="{{ isset($cultivo->nombre) ? $cultivo->nombre : old('nombre') }}" id="nombre"><br>
</div>
<div class="form-group">
    <label for="variedad">Variedad: </label>
    <input type="text" name="variedad" class="form-control" value="{{ isset($cultivo->variedad) ? $cultivo->variedad : old('variedad') }}" id="variedad"><br>
</div>

<input type="submit" class="btn btn-success" value="{{$modo}} cultivo" id="Enviar">

<a class="btn btn-primary" href="{{ url('cultivos/') }}">Regresar</a>