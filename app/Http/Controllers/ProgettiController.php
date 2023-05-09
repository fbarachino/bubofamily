<?php

namespace App\Http\Controllers;

use App\Models\Progetti;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RigaProgetto;

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
    
    public function inserisciTask(Request $args)
    {
        RigaProgetto::saveRiga($args);
        return redirect(Route('detail',['id'=>$args['fk_id_progetto']]));
    }
    
    public function dettaglioProgetto(Request $id)
    {
        $progetto_id=$id['id'];
        $progetto = Progetti::getProgettoById($progetto_id);
        $righe = RigaProgetto::getRigheProgetto($progetto_id);
        return view('progetti.dettaglio',['dettaglio'=>$progetto, 'righe'=>$righe,]);
        //dd($righe);
    }
    
}
