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
          /* $progetti=Progetti::getProgetti();
        dd($progetti);*/
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
        return redirect(Route('progetti'));
    }
    
    public function deleteProgetto(Request $param) {
        Progetti::delProgetto($param['id']);
        return redirect(Route('progetti'));
    }
    
    public function inserisciTask(Request $id)
    {
        
    }
    
    public function dettaglioProgetto(Request $id)
    {
        $progetto = Progetti::getProgettoById($id['id']);
        return view('progetti.dettaglio',['dettaglio'=>$progetto]);
    }
    
}
