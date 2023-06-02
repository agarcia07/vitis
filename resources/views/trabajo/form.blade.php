<h1>{{$modo}} Trabajo</h1>

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
    <input type="text" name="nombre" class="form-control" value="{{ isset($trabajo->nombre) ? $trabajo->nombre : old('nombre') }}" id="nombre"><br>
</div>
<div class="form-group">
    <label for="fecha_realizacion">Fecha realización : </label>
    <input type="date" name="fecha_realizacion" class="form-control" value="{{ isset($trabajo->fecha_realizacion) ? $trabajo->fecha_realizacion : old('fecha_realizacion') }}" id="fecha_realizacion"><br>
</div>
<div class="form-group">
    <label for="nombre_parcela">Parcela trabajada : </label>
    <input type="text" name="nombre_parcela" class="form-control" value="{{ isset($trabajo->nombre_parcela) ? $trabajo->nombre_parcela : old('nombre_parcela') }}" id="nombre_parcela"><br>
</div>

<input type="submit" class="btn btn-success" value="{{$modo}} trabajo" id="Enviar">

<a class="btn btn-primary" href="{{ url('trabajos/') }}">Regresar</a>