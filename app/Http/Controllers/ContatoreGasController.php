<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContatoreGasController extends Controller
{
    public static function listLettureGas(){
        $letture=DB::table('contatore_gases')->orderBy('gas_date','asc')->get();
        return view('components.chartGas',['lettureGas'=>$letture]);
    }
    
    public static function insLettureGas(Request $request)
    {
        DB::table('contatore_gases')->insert([
            'gas_date'=> $request['gas_date'],
            'gas_lettura'=> $request['gas_lettura'],
        ]);
        $letture=DB::table('contatore_gases')
            ->orderBy('gas_date','asc')
            ->get();
        return view('components.chartGas',['lettureGas'=>$letture]);
    }
}
