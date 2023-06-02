<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['municipios']=Municipio::paginate(4);
        return view('municipio.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('municipio.create');
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
        $datosMunicipio=request()->except('_token');
        Municipio::insert($datosMunicipio);

        return redirect('municipios')->with('mensaje','Municipio creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $municipio=Municipio::findOrFail($id);
        return view('municipio.edit', compact('municipio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosMunicipio=request()->except('_token','_method');
        Municipio::where('id','=',$id)->update($datosMunicipio);

        return redirect('municipios')->with('mensaje','Municipio modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $municipio=Municipio::findOrFail($id);
        Municipio::destroy($id);

        return redirect('municipios')->with('mensaje','Municipio borrado coorectamente.');
    }
}
