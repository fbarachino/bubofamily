<?php

namespace App\Http\Controllers;

use App\Models\Progetti;
use App\Models\User;
use Illuminate\Http\Request;

class ProgettiController extends Controller
{
    //
    public function listaProgetto()
    {
        return view('progetti.list',[
            'progetti'=>Progetti::getProgetti()
        ]);
    }
    
    public function nuovoProgetto()
    {
        return view('progetti.new',['coordinatori'=>User::getUsers()]);
    }
    
    public function salvaProgetto(Request $request)
    {
        Progetti::saveProgetto($request);
        return view('progetti.list',[
            'progetti'=>Progetti::getProgetti()
        ]);
    }
    
}
