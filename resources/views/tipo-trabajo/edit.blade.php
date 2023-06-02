@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/tipo-trabajos/'.$tipoTrabajo->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('tipo-trabajo.form',['modo'=>'Editar'])

    </form>
</div>
@endsection