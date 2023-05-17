<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RigaProgetto;

class RigaProgettoController extends Controller
{
    //
    public function deleterow($id_row,$id_prog)
    {
        $id_riga = $id_row;
        $id_progetto = $id_prog;
        
        RigaProgetto::deleteRow($id_riga);
        // Ritorna alla pagina dei dettagli del progetto
        return redirect('/admin/progetti/detail/?id='.$id_progetto);
    }
    
    public function editRiga($id)
    {
        // modifica della riga inserita
        //return redirect('/admin/progetti/editDetail');
        $data=RigaProgetto::getRigaById($id);
        return $data;
    }
    
    public function updateRiga(Request $data)
    {
        RigaProgetto::updateRiga($data);
        $id_progetto=$data['fk_id_progetto'];
        return redirect('/admin/progetti/detail/?id='.$id_progetto);
    }
}
