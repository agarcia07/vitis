@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/parcelas') }}" method="post" enctype="multipart/form-data">

        @csrf

        @include('parcela.form',['modo'=>'Crear'])

    </form>
</div>
@endsection