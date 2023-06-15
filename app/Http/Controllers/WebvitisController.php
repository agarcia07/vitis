<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcela;
use App\Models\Trabajo;
use App\Models\TipoTrabajo;
use App\Models\Propietario;
use App\Models\Webvitis;
use Carbon\Carbon;
use App\Http\Controllers\ParcelaController;
use App\Models\Municipio;
use App\Models\Provincia;
use PDF;

class WebvitisController extends Controller
{
    //
    public function index(Request $request)
    {
        //$parcelas = Parcela::all();
        $tipoTrabajos = TipoTrabajo::all();
        $trabajos = Trabajo::all();
        $provincias = Provincia::all();
        $municipios = Municipio::all();

        //Buscador web
        $busqueda = $request->busqueda;
        $parcelas = Parcela::where('nombre','LIKE','%'.$busqueda.'%')
                                ->latest('id')
                                ->get();


        return view('template.index', [
            'parcelas' => $parcelas->toArray(),
            'tipoTrabajos' => $tipoTrabajos->toArray(),
            'trabajos' => $trabajos->toArray(),
            'provincias' => $provincias->toArray(),
            'municipios' => $municipios->toArray(),
            'busqueda'=>$busqueda,
        ]);
    }

    public function generarPDF()
    {
                $parcelas = Parcela::all();
                $tipoTrabajos = TipoTrabajo::all();
                $trabajos = Trabajo::all();
                $propietarios = Propietario::all();

                $fechaActual = Carbon::now()->year;
                $fechaAnterior = $fechaActual - 1;
                
                $fechaPdf = $fechaAnterior . '-' . $fechaActual;
                

                $pdf = PDF::loadView('template.pdf',[
                    'parcelas' => $parcelas->toArray(),
                    'tipoTrabajos' => $tipoTrabajos->toArray(),
                    'trabajos' => $trabajos->toArray(),
                    'propietarios' => $propietarios->toArray(),
                    'fechaPdf' => $fechaPdf
                ]);
                return $pdf->stream();

 
    }

    public function parcelasPropietario($propietario,$parcela)
    {

        $resultado = Parcela::where('propietario', $propietario)
            ->where('nombre', $parcela)
            ->get();


        return $resultado;
    }

    public function obtenerDatos($trabajo,$parcela)
    {
        $fechaInicio = Carbon::now()->subYear()->startOfYear()->month(11)->startOfMonth();

        $resultado = Trabajo::where('fecha_realizacion', '>', $fechaInicio)
            ->where('nombre', $trabajo)
            ->where('nombre_parcela', $parcela)
            ->count();


        return $resultado;
    }

    public function obtenerVueltasLabrar($parcela)
    {
        $anyoActual = Carbon::now()->format('Y');

        $resultadoVueltas = Trabajo::where('fecha_realizacion', 'LIKE', $anyoActual.'%')
        ->where('nombre', 'Labrar x2')
        ->where('nombre_parcela', $parcela)
        ->count();


        return $resultadoVueltas;
    }

    public function storeTrabajo(Request $request)
    {
        $fechaActual = Carbon::now()->format('Y-m-d');

        $datosTrabajo = request()->except('_token');

        $valores = array_values($datosTrabajo);

        $valor1 = $valores[0]; // 2
        $datos = explode('.',$valor1);

        $idTrabajo = $datos[0];
        $nombreTrabajo = $datos[1];
        $nombreParcela = $datos[2];

        $campos = [
            'nombre' => $nombreTrabajo,
            'fecha_realizacion' => $fechaActual,
            'nombre_parcela' => $nombreParcela
        ];

        Trabajo::insert($campos);

        return redirect('web')->with('mensaje','Se ha añadido un trabajo de '.$nombreTrabajo.' en '.$nombreParcela);

    }
}
