@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Vitis</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="img/brand/vitis-icono.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-primary text-uppercase fixed-top" id="mainNav">
        <div class="container flex-nowrap">
            <a class="navbar-brand" href="{{route('web')}}"><img src="{{ asset('img/brand/Vitis-blanco.png') }}" class="img-fluid w-25 h-25" alt="Logo de la página"></a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded m-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{url('/login')}}">Admin</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{url('web/generar-pdf')}}" target="_blank">Generar PDF</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <a class="text-decoration-none" href="{{route('web')}}">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-4 mt-5">Parcelas</h2>
            </a>
            <div class="d-md-flex justify-content-md-center mb-3">
                <form class="d-flex justify-content-center pt-3 pb-3" action="{{route('web')}}" method="GET">
                    <div class="btn-group">
                        <input type="text" class="form-control" name="busqueda">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                </form>
            </div>
            <!-- Icon Divider-->
            @if(Session::has('mensaje'))
            <div class="alert alert-success fade show" role="alert" id="alertMes">
                {{ Session::get('mensaje') }}
            </div>
            @endif
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">

                @foreach($parcelas as $parcela)
                <!-- Portfolio Item 1-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal{{$parcela['id']}}">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-eye fa-3x"></i></div>
                        </div>
                        <h3 class="d-flex justify-content-center">{{$parcela['nombre']}}</h3>
                        <img class="img-fluid" src="{{asset('storage').'/'.$parcela['imagen']}}" alt="..." />
                    </div>
                </div>
                <!-- Portfolio Modal 1-->
                <div class="portfolio-modal modal fade" id="portfolioModal{{$parcela['id']}}" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                            <div class="modal-body text-center pb-5">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <!-- Portfolio Modal - Title-->
                                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$parcela['nombre']}}</h2>
                                            <!-- Icon Divider-->
                                            <div class="divider-custom">
                                                <div class="divider-custom-line"></div>

                                            </div>
                                            <!-- Portfolio Modal - Image-->
                                            <img class="img-fluid rounded mb-5" src="{{asset('storage').'/'.$parcela['imagen']}}" alt="..." />
                                            <!-- Portfolio Modal - Text-->


                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="font-weight-bold fs-5">Datos</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><b>Propietario:</b> {{$parcela['propietario']}} &nbsp;&nbsp; <b>Cultivo:</b> {{$parcela['cultivo']}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Cepas:</b> {{ $resultado = $parcela['num_uni_total'] - $parcela['num_uni_falta'] < 0 ? 0 : $parcela['num_uni_total'] - $parcela['num_uni_falta'] }} &nbsp;&nbsp; <b>Faltas:</b> {{$parcela['num_uni_falta']}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Municipio:</b>
                                                                        @foreach($municipios as $municipio)
                                                                        @php if($municipio['id'] == $parcela['municipio_id']){ @endphp
                                                                        {{$municipio['nombre']}}
                                                                        @php } @endphp
                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Parcela:</b> {{$parcela['parcela']}} &nbsp;&nbsp; <b>Polígono:</b> {{$parcela['poligono']}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Superficie (ha):</b> {{$parcela['superficie_total']}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a class="btn btn-warning mt-3" href="{{$parcela['url_sigpac']}}" target="_blank">Ver Sigpac</a>
                                                                        @php if($parcela['pdf_sigpac'] != ''){ @endphp
                                                                        <a class="btn btn-warning mt-3" href="{{ asset('storage/pdf/' . $parcela['pdf_sigpac']) }}" target="_blank">PDF SigPac</a>
                                                                        @php } @endphp
                                                                        <a class="btn btn-danger mt-3" href="https://www.google.com/maps/search/?api=1&query={{$parcela['latitud']}},{{$parcela['longitud']}}&zoom=20" target="_blank">Ver Maps</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="font-weight-bold fs-5">Trabajos</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($tipoTrabajos as $tipoTrabajo)
                                                                @php if ($tipoTrabajo['nombre'] == 'Labrar x2') {continue;} @endphp
                                                                <tr>
                                                                    <td><b>{{$tipoTrabajo['nombre']}}:</b> &nbsp;&nbsp;

                                                                        @php
                                                                        $webvitisController = new App\Http\Controllers\WebvitisController();
                                                                        if ($tipoTrabajo['nombre'] == 'Labrar') {
                                                                        $resultado = $webvitisController->obtenerDatos($tipoTrabajo['nombre'], $parcela['nombre']);
                                                                        $cadena1 = str_repeat('X ', $resultado);

                                                                        $resultado2 = $webvitisController->obtenerVueltasLabrar($parcela['nombre']);
                                                                        $cadena2 = str_repeat('O ', $resultado2);

                                                                        $cadenaX = $cadena1 . $cadena2;
                                                                        } else {

                                                                        $resultado = $webvitisController->obtenerDatos($tipoTrabajo['nombre'], $parcela['nombre']);
                                                                        $cadenaX = str_repeat('X ', $resultado);

                                                                        }
                                                                        @endphp



                                                                        <span class="text-danger font-weight-bold fs-5">{{$cadenaX}}</span>

                                                                    </td>
                                                                </tr>

                                                                @endforeach


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Datos</th>
                                                        <th>Trabajos</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><b>Nombre:</b> {{$parcela['nombre']}} &nbsp;&nbsp; <b>Cultivo:</b> {{$parcela['cultivo']}}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Cepas:</b> {{ $parcela['num_uni_total']-$parcela['num_uni_falta']}} &nbsp;&nbsp; <b>Faltas:</b> {{$parcela['num_uni_falta']}}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Parcela:</b> {{$parcela['parcela']}} &nbsp;&nbsp; <b>Poligono:</b> {{$parcela['poligono']}}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Superficie (ha):</b> {{$parcela['superficie_total']}}</td>
                                                        <td><a class="btn btn-success" href="{{$parcela['url_sigpac']}}" target="_blank">Ver Sigpac</a></td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <div>
                                                @include('template.form')
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary mt-3" data-bs-dismiss="modal">
                                                <i class="fas fa-xmark fa-fw"></i>
                                                Volver
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </section>
    <footer class="fixed-bottom bg-primary text-white text-center py-2">
        <div class="container">
            <p class="m-0">&copy; Vitis {{ Carbon::now()->format('Y') }} - AGarcia</p>
        </div>
    </footer>




    <!-- Copyright Section-->
    <!-- <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Vitis 2023</small></div>
        </div> -->
    <!-- Portfolio Modals-->


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->

    <script>
        // Obten el elemento del alert
        var alert = document.getElementById('alertMes');

        // Desvanecer y ocultar el alert después de 5 segundos
        setTimeout(function() {
            alert.classList.remove('show');
        }, 5000);
    </script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>