<?php

namespace App\Http\Controllers;

use App\Models\Cultivo;
use Illuminate\Http\Request;

class CultivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['cultivos']=Cultivo::paginate(4);
        return view('cultivo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cultivo.create');
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
        $datosCultivo=request()->except('_token');
        Cultivo::insert($datosCultivo);

        return redirect('cultivos')->with('mensaje','Cultivo creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo  $cultivo
     * @return \Illuminate\Http\Response
     */
    public function show(Cultivo $cultivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo  $cultivo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cultivo=Cultivo::findOrFail($id);
        return view('cultivo.edit', compact('cultivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo  $cultivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosCultivo = request()->except('_token','_method');
        Cultivo::where('id','=',$id)->update($datosCultivo);

        return redirect('cultivos')->with('mensaje','Cultivo modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo  $cultivo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cultivo=Cultivo::findOrFail($id);
        Cultivo::destroy($id);

        return redirect('cultivos')->with('mensaje','Cultivo eliminado correctamente.');
    }
}
