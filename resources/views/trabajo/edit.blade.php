@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{ url('/trabajos/'.$trabajo->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('trabajo.form',['modo'=>'Editar'])

    </form>
</div>
@endsection