@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/cultivos') }}" method="post" enctype="multipart/form-data">

        @csrf

        @include('cultivo.form',['modo'=>'Crear'])

    </form>
</div>
@endsection