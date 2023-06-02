<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcela;
use App\Http\Controllers\ParcelaController;

class WebvitisController extends Controller
{
    //
    public function index()
    {
        $parcelas = Parcela::all();



        return view('template.index', ['parcelas' => $parcelas->toArray()]);
    }
}
