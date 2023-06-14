<?php

namespace App\Http\Controllers;

use App\Models\TipoTrabajo;
use Illuminate\Http\Request;

class TipoTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['tipoTrabajos']=TipoTrabajo::paginate();
        return view('tipo-trabajo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipo-trabajo.create');
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
        $datosTipoTrabajo=request()->except('_token');
        TipoTrabajo::insert($datosTipoTrabajo);

        return redirect('tipo-trabajos')->with('mensaje','Tipo de trabajo creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoTrabajo  $tipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show(TipoTrabajo $tipoTrabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoTrabajo  $tipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipoTrabajo=TipoTrabajo::findOrFail($id);
        return view('tipo-trabajo.edit', compact('tipoTrabajo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoTrabajo  $tipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosTipoTrabajo=request()->except('_token','_method');
        TipoTrabajo::where('id','=',$id)->update($datosTipoTrabajo);

        return redirect('tipo-trabajos')->with('mensaje','Tipo de trabajo modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoTrabajo  $tipoTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tipoTrabajo=TipoTrabajo::findOrFail($id);
        TipoTrabajo::destroy($id);

        return redirect('tipo-trabajos')->with('mensaje','Tipo de trabajo borrado coorectamente.');
    }
}
