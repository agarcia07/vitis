@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/propietarios/'.$propietario->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('propietario.form',['modo'=>'Editar'])

    </form>
</div>
@endsection