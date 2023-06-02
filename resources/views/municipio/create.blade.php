@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/municipios') }}" method="post" enctype="multipart/form-data">

        @csrf

        @include('municipio.form',['modo'=>'Crear'])

    </form>
</div>
@endsection