@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/municipios/'.$municipio->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('municipio.form',['modo'=>'Editar'])

    </form>
</div>
@endsection