<h1>{{$modo}} Provincia</h1>

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
    <input type="text" name="nombre" class="form-control" value="{{ isset($provincia->nombre) ? $provincia->nombre : old('nombre') }}" id="nombre"><br>
</div>

<input type="submit" class="btn btn-success" value="{{$modo}} provincia" id="Enviar">

<a class="btn btn-primary" href="{{ url('provincias/') }}">Regresar</a>