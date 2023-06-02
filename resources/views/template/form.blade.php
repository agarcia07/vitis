<div class="container">

    <form action="{{ url('/web') }}" method="post" enctype="multipart/form-data">

        @csrf

        @foreach($tipoTrabajos as $tipoTrabajo)
        <button type="submit" class="btn btn-success mb-2" name="{{$tipoTrabajo['id']}}" value="{{$tipoTrabajo['id']}}.{{$tipoTrabajo['nombre']}}.{{$parcela['nombre']}}">
           {{$tipoTrabajo['nombre']}}
        </button>
        @endforeach

    </form>

</div>