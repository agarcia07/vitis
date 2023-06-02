@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/parcelas/'.$parcela->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('parcela.form',['modo'=>'Editar'])

    </form>
</div>
@endsection