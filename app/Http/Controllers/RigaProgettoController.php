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
}
