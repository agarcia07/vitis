<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use App\Models\Parcela;
use App\Models\TipoTrabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['trabajos']=Trabajo::paginate();
        return view('trabajo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parcelas['parcelas']=Parcela::all();
        $tipoTrabajos['tipoTrabajos']=TipoTrabajo::all();

    

        return view('trabajo.create')->with('parcelas', $parcelas)->with('tipoTrabajos', $tipoTrabajos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosTrabajo=request()->except('_token');
        Trabajo::insert($datosTrabajo);

        return redirect('trabajos')->with('mensaje','Trabajo creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajo $trabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $trabajo=Trabajo::findOrFail($id);
        $parcelas['parcelas']=Parcela::all();
        $tipoTrabajos['tipoTrabajos']=TipoTrabajo::all();

        return view('trabajo.edit', compact('trabajo'))->with('parcelas', $parcelas)->with('tipoTrabajos', $tipoTrabajos);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosTrabajo=request()->except('_token','_method');
        Trabajo::where('id','=',$id)->update($datosTrabajo);

        return redirect('trabajos')->with('mensaje','Trabajo modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabajo  $trabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $trabajo=Trabajo::findOrFail($id);
        Trabajo::destroy($id);

        return redirect('trabajos')->with('mensaje','Trabajo borrado coorectamente.');
    }
}
