@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/provincias/'.$provincia->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('provincia.form',['modo'=>'Editar'])

    </form>
</div>
@endsection