@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/provincias') }}" method="post" enctype="multipart/form-data">

        @csrf

        @include('provincia.form',['modo'=>'Crear'])

    </form>
</div>
@endsection