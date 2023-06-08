<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['propietarios']=Propietario::paginate();
        return view('propietario.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('propietario.create');
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
        $datospropietario = request()->except('_token');
        propietario::insert($datospropietario);

        return redirect('propietarios')->with('mensaje','Propietario creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $propietario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
       $propietario=Propietario::findOrFail($id);
       return view('propietario.edit', compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datospropietario = request()->except('_token','_method');

        Propietario::where('id','=',$id)->update($datospropietario);

        return redirect('propietarios')->with('mensaje','Propietario modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $propietario=Propietario::findOrFail($id);

        Propietario::destroy($id);

        return redirect('propietarios')->with('mensaje','Propietario borrado correctamente.');
    }
}
