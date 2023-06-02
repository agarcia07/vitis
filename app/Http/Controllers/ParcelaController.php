<?php

namespace App\Http\Controllers;

use App\Models\Parcela;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ParcelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['parcelas']=Parcela::paginate(4);
        return view('parcela.index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('parcela.create');
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
        //Validar campos
        $campos=[
            'nombre'=>'required|string|max:100',
            'cultivo'=>'required|string|max:100',
            'num_uni_total'=>'required|integer',
            'num_uni_falta'=>'required|integer',
            'imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
            'provincia_id'=>'required|integer',
            'municipio_id'=>'required|integer',
            'agregado'=>'required|integer',
            'zona'=>'required|integer',
            'poligono'=>'required|integer',
            'parcela'=>'required|integer',
            'superficie_total'=>'required',
            'superficie_uso'=>'required',
            'recinto'=>'required|integer',
            'pendiente'=>'required',
            'referencia_catastral'=>'required|string|max:10000',
            'url_sigpac'=>'required|string|max:10000'

        ];

        $mensajes=[
            'required'=>'El campo :attribute es obligatorio.',
            'num_uni_total.required'=>'El campo número total de plantas es obligatorio.',
            'num_uni_falta.required'=>'El campo número total de faltas es obligatorio.',
            'superficie_uso.required'=>'El campo superficie uso es obligatorio.'
        ];

        $this->validate($request, $campos, $mensajes);


        // $datosParcela = request()->all();
        $datosParcela = request()->except('_token','imagen_url');

        if($request->hasFile('imagen')){
            $datosParcela['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Parcela::insert($datosParcela);


        //Enviamos a la pagina listado de parcelas con el mensaje de confirmacion
        return redirect('parcelas')->with('mensaje','Parcela registrada con éxito.');

        // dd($datosParcela);
        //return response()->json($datosParcela);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parcela  $parcela
     * @return \Illuminate\Http\Response
     */
    public function show(Parcela $parcela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parcela  $parcela
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $parcela=Parcela::findOrFail($id);
        return view('parcela.edit', compact('parcela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parcela  $parcela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Recogemos datos y quitamos token y metodo que no se necesitan|despues buscamos el registro en la base y lo actualizamos
        $datosParcela = request()->except('_token','_method');

        if($request->hasFile('imagen')){
            $parcela=Parcela::findOrFail($id);
            Storage::delete('public/'.$parcela->imagen);

            $datosParcela['imagen']=$request->file('imagen')->store('uploads','public');
        }

        //$datosParcela['imagen']->$datosParcela['imagen_url'];
        unset($datosParcela['imagen_url']);
        Parcela::where('id','=',$id)->update($datosParcela);

        //Recupero la informacion de nuevo con ese id y devulevo el formulario en la vista parcelas index
        $parcela=Parcela::findOrFail($id);
        //return view('parcela.edit', compact('parcela'));

        return redirect('parcelas')->with('mensaje','Parcela Modificada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parcela  $parcela
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $parcela=Parcela::findOrFail($id);

        if(Storage::delete('public/'.$parcela->imagen)){
            Parcela::destroy($id);
        }

        return redirect('parcelas')->with('mensaje','Parcela borrada.');
    }
}
