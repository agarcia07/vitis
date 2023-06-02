<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcela;
use App\Models\Trabajo;
use App\Models\TipoTrabajo;
use App\Models\Webvitis;
use Carbon\Carbon;
use App\Http\Controllers\ParcelaController;

class WebvitisController extends Controller
{
    //
    public function index()
    {
        $parcelas = Parcela::all();
        $tipoTrabajos = TipoTrabajo::all();


        return view('template.index', [
            'parcelas' => $parcelas->toArray(),
            'tipoTrabajos' => $tipoTrabajos->toArray()
        ]);
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
