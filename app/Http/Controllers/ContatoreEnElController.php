<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\contatoreEnEl;

class ContatoreEnElController extends Controller
{
    public static function listLettureEnel(){
        $letture=ContatoreEnel::getList();
        return view('letture.enel.list',['lettureEnel'=>$letture]);
    }
    
    public static function insLettureEnel(Request $request)
    {
        ContatoreEnel::inserisci($request);
        $letture=ContatoreEnel::getList();
        return view('letture.enel.list',['lettureEnel'=>$letture]);
    }
}
