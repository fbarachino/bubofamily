<?php

namespace App\Http\Controllers;

use App\Models\Progetti;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RigaProgetto;
use function GuzzleHttp\json_encode;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function getCoordinatori()
    {
        return json_encode(User::getUsers());
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


    public function dettaglioProgetto($id)
    {
        $progetto_id=$id;
        $progetto = Progetti::getProgettoById($progetto_id);
        $righe = RigaProgetto::getRigheProgetto($progetto_id);
        $costo_tot=RigaProgetto::getCostoRighe($progetto_id);
        return view('progetti.dettaglio',['dettaglio'=>$progetto, 'righe'=>$righe, 'tot'=>$costo_tot]);
        //dd($righe);
    }

    public function chiudiProgetto(Request $id)
    {
        Progetti::chiudiProgetto($id['id']);
        return redirect(Route('progetti'));
    }

    public function riapriProgetto(Request $id)
    {
        Progetti::riapriProgetto($id['id']);
        return redirect(Route('progetti'));
    }

    public function stampaPDFProgetto(Request $id)
    {
        $progetto_id=$id['id'];
        $progetto = Progetti::getProgettoById($progetto_id);
        $righe = RigaProgetto::getRigheProgetto($progetto_id);
        $costo_tot=RigaProgetto::getCostoRighe($progetto_id);
        $pdf=Pdf::loadview('progetti.PDF.scheda',['dettaglio'=>$progetto,'righe'=>$righe, 'tot'=>$costo_tot]);  
        return $pdf->stream();
    }

}
