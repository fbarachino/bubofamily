<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContatoreEnElController extends Controller
{
    public static function listLettureEnel(){
        $letture=DB::table('contatore_en_els')->orderBy('enel_date','desc')->get();
        return view('letture.enel.list',['lettureEnel'=>$letture]);
    }
    
    public static function insLettureEnel(Request $request)
    {
        DB::table('contatore_en_els')->insert([
            'enel_date'=> $request['enel_date'],
            'enel_A'=> $request['enel_A'],
            'enel_R'=> $request['enel_R'],
            'enel_F1'=> $request['enel_F1'],
            'enel_F2'=> $request['enel_F2'],
            'enel_F3'=> $request['enel_F3'],
        ]);
        $letture=DB::table('contatore_en_els')->orderBy('enel_date','desc')->get();
        return view('letture.enel.list',['lettureEnel'=>$letture]);
    }
}
