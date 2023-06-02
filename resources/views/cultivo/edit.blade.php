@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/cultivos/'.$cultivo->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('cultivo.form',['modo'=>'Editar'])

    </form>
</div>
@endsection