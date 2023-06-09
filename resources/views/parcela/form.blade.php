<h1>{{$modo}} Parcela</h1>

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
    <input type="text" name="nombre" class="form-control" value="{{ isset($parcela->nombre) ? $parcela->nombre : old('nombre') }}" id="nombre"><br>
</div>

<div class="form-group">
    <label for="propietario">Propietario: </label>
    <select name="propietario" class="form-control" id="propietario">
        @foreach($datosPropietarios['datosPropietarios'] as $datosPropietario)
        <option value="{{$datosPropietario->nombre}}" {{ isset($parcela->propietario) && $parcela->propietario == $datosPropietario->nombre ? 'selected' : old('propietario') }}>{{$datosPropietario->nombre}}</option>
        @endforeach
    </select><br>
</div>

<div class="form-group">
    <label for="cultivo">Cultivo: </label>
    <select name="cultivo" class="form-control" id="cultivo">
        @foreach($datosCultivos['datosCultivos'] as $datosCultivo)
        <option value="{{$datosCultivo->nombre}}" {{ isset($parcela->cultivo) && $parcela->cultivo == $datosCultivo->nombre ? 'selected' : old('cultivo') }}>{{$datosCultivo->nombre}}</option>
        @endforeach
    </select><br>
</div>

<div class="form-group">
    <label for="num_uni_total">Número total de plantas (contando las faltas): </label>
    <input type="text" name="num_uni_total" class="form-control" value="{{ isset($parcela->num_uni_total) ? $parcela->num_uni_total : old('num_uni_total') }}" id="num_uni_total"><br>
</div>

<div class="form-group">
    <label for="num_uni_falta">Número total de plantas faltantes: </label>
    <input type="text" name="num_uni_falta" class="form-control" value="{{ isset($parcela->num_uni_falta) ? $parcela->num_uni_falta : old('num_uni_falta') }}" id="num_uni_falta"><br>
</div>

<div class="form-group ">
    <label for="imagen"></label>
    <!-- {{ isset($parcela->imagen) ? $parcela->imagen : '' }} -->
    @if(isset($parcela->imagen))
    <img class="img-thumbnail img-fluid rounded mx-auto d-block" src="{{ asset('storage').'/'.$parcela->imagen }}" alt="" width="40%">
    @endif
    <input type="file" name="imagen" class="form-control" id="imagen"><br>

    <input type="hidden" name="imagen_url" value="{{ isset($parcela->imagen) ? $parcela->imagen : old('imagen') }}">
</div>

<div class="form-group">
    <label for="provincia_id">Provincia: </label>
    <select name="provincia_id" class="form-control" id="provincia_id">
        @foreach($datosProvincias['datosProvincias'] as $datosProvincia)
        <option value="{{$datosProvincia->id}}" {{ isset($parcela->provincia_id) && $parcela->provincia_id == $datosProvincia->id ? 'selected' : old('provincia_id') }}>{{$datosProvincia->nombre}}</option>
        @endforeach
    </select><br>
</div>

<div class="form-group">
    <label for="municipio_id">Municipio: </label>
    <select name="municipio_id" class="form-control" id="municipio_id">
        @foreach($datosMunicipios['datosMunicipios'] as $datosMunicipio)
        <option value="{{$datosMunicipio->id}}" {{ isset($parcela->municipio_id) && $parcela->municipio_id == $datosMunicipio->id ? 'selected' : old('municipio_id') }}>{{$datosMunicipio->nombre}}</option>
        @endforeach
</select><br>
</div>

<div class="form-group">
    <label for="agregado">Agregado: </label>
    <input type="text" name="agregado" class="form-control" value="{{ isset($parcela->agregado) ? $parcela->agregado : old('agregado') }}" id="agregado"><br>
</div>

<div class="form-group">
    <label for="zona">Zona: </label>
    <input type="text" name="zona" class="form-control" value="{{ isset($parcela->parcela) ? $parcela->parcela : old('zona') }}" id="zona"><br>
</div>

<div class="form-group">
    <label for="poligono">Poligono: </label>
    <input type="text" name="poligono" class="form-control" value="{{ isset($parcela->poligono) ? $parcela->poligono : old('poligono') }}" id="poligono"><br>
</div>

<div class="form-group">
    <label for="parcela">Parcela: </label>
    <input type="text" name="parcela" class="form-control" value="{{ isset($parcela->parcela) ? $parcela->parcela : old('parcela') }}" id="parcela"><br>
</div>

<div class="form-group">
    <label for="superficie_total">Superficie total (ha): </label>
    <input type="text" name="superficie_total" class="form-control" value="{{ isset($parcela->superficie_total) ? $parcela->superficie_total : old('superficie_total') }}" id="superficie_total"><br>
</div>

<div class="form-group">
    <label for="superficie_uso">Superficie Plantada (ha): </label>
    <input type="text" name="superficie_uso" class="form-control" value="{{ isset($parcela->superficie_uso) ? $parcela->superficie_uso : old('superficie_uso') }}" id="superficie_uso"><br>
</div>

<div class="form-group">
    <label for="recinto">Recinto: </label>
    <input type="text" name="recinto" class="form-control" value="{{ isset($parcela->recinto) ? $parcela->recinto : old('recinto') }}" id="recinto"><br>
</div>

<div class="form-group">
    <label for="pendiente">Pendiente: </label>
    <input type="text" name="pendiente" class="form-control" value="{{ isset($parcela->pendiente) ? $parcela->pendiente : old('pendiente') }}" id="pendiente"><br>
</div>

<div class="form-group">
    <label for="referencia_catastral">Referencia catastral: </label>
    <input type="text" name="referencia_catastral" class="form-control" value="{{ isset($parcela->referencia_catastral) ? $parcela->referencia_catastral : old('referencia_catastral') }}" id="referencia_catastral"><br>
</div>
@if(request()->route()->getName() == 'editar')
<div class="form-group">
    <label for="url_sigpac">Url Sigpac: </label>
    <input type="text" name="url_sigpac" class="form-control" value="{{ isset($parcela->url_sigpac) ? $parcela->url_sigpac : old('url_sigpac') }}" id="url_sigpac"><br>
</div>
@endif
<div class="form-group">
    <label for="latitud">Latitud: </label>
    <input type="text" name="latitud" class="form-control" value="{{ isset($parcela->latitud) ? $parcela->latitud : old('latitud') }}" id="latitud"><br>
</div>
<div class="form-group">
    <label for="longitud">Longitud: </label>
    <input type="text" name="longitud" class="form-control" value="{{ isset($parcela->longitud) ? $parcela->longitud : old('longitud') }}" id="longitud"><br>
</div>
<input type="submit" class="btn btn-success" value="{{$modo}} parcela" id="Enviar">

<a class="btn btn-primary" href="{{ url('parcelas/') }}">Regresar</a>