@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/tipo-trabajos') }}" method="post" enctype="multipart/form-data">

        @csrf

        @include('tipo-trabajo.form',['modo'=>'Crear'])

    </form>
</div>
@endsection