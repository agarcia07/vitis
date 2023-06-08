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
    <label for="nombre">Trabajo: </label>
</div>
<select name="nombre" class="form-control" id="nombre">
        @foreach($tipoTrabajos['tipoTrabajos'] as $tipoTrabajo)
        <option value="{{$tipoTrabajo->nombre}}" {{ isset($trabajo->nombre) && $trabajo->nombre == $tipoTrabajo->nombre ? 'selected' : old('nombre') }}>{{$tipoTrabajo->nombre}}</option>     
        @endforeach
    </select><br>
<div class="form-group">
    <label for="fecha_realizacion">Fecha realización : </label>
    <input type="date" name="fecha_realizacion" class="form-control" value="{{ isset($trabajo->fecha_realizacion) ? $trabajo->fecha_realizacion : old('fecha_realizacion') }}" id="fecha_realizacion"><br>
</div>
<div class="form-group">
    <label for="nombre_parcela">Parcela trabajada : </label>

    <select name="nombre_parcela" class="form-control" id="nombre_parcela">
        @foreach($parcelas['parcelas'] as $parcela)
        <option value="{{$parcela->nombre}}" {{ isset($trabajo->nombre_parcela) && $trabajo->nombre_parcela == $parcela->nombre ? 'selected' : old('nombre_parcela') }}>{{$parcela->nombre}}</option>    
        @endforeach
    </select><br>

    
</div>

<input type="submit" class="btn btn-success" value="{{$modo}} trabajo" id="Enviar">

<a class="btn btn-primary" href="{{ url('trabajos/') }}">Regresar</a>