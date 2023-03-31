<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\contatoreGas;


class ContatoreGasController extends Controller
{
    public static function listLettureGas(){
        $letture=ContatoreGas::getList();
        return view('components.chartGas',['lettureGas'=>$letture]);
    }
    
    public static function insLettureGas(Request $request)
    {
        ContatoreGas::inserisci($request);
        $letture=ContatoreGas::getList();
        return view('components.chartGas',['lettureGas'=>$letture]);
    }
}
