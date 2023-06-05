<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcela;
use App\Models\Trabajo;
use App\Models\TipoTrabajo;
use App\Models\Webvitis;
use Carbon\Carbon;
use App\Http\Controllers\ParcelaController;
use App\Models\Municipio;

class WebvitisController extends Controller
{
    //
    public function index(Request $request)
    {
        //$parcelas = Parcela::all();
        $tipoTrabajos = TipoTrabajo::all();
        $trabajos = Trabajo::all();

        //Buscador web
        $busqueda = $request->busqueda;
        $parcelas = Parcela::where('nombre','LIKE','%'.$busqueda.'%')
                                ->latest('id')
                                ->get();



        return view('template.index', [
            'parcelas' => $parcelas->toArray(),
            'tipoTrabajos' => $tipoTrabajos->toArray(),
            'trabajos' => $trabajos->toArray(),
            'busqueda'=>$busqueda
        ]);
    }

    public function obtenerDatos($trabajo,$parcela)
    {
        $anyoActual = Carbon::now()->format('Y');

        $resultado = Trabajo::where('fecha_realizacion', 'LIKE', $anyoActual.'%')
        ->where('nombre', $trabajo)
        ->where('nombre_parcela', $parcela)
        ->count();


        return $resultado;
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
