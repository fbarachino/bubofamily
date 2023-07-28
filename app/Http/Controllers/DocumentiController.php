<?php

namespace App\Http\Controllers;

use App\Models\Documenti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentiController extends Controller
{
    //
    public function storeFile(Request $req){
        if ($req->hasFile('filename'))
        {
            Documenti::store($req);
            return redirect(route('documenti',['id'=>$req->input('id'),]));
        }
        else 
        {
            return 'Nessun File trovato';
        }
    }
    
    public function fileForm(Request $request){
        $documenti = Documenti::getList($request->input('id'));  
        return view('conti.documenti.insert', [
            'id'=>$request->input('id'),
            'documenti'=>$documenti
        ]);
    }

    /*
    // isssue #5 Proposta cambiamento per generalizzazione documenti
    // NB: cambiare anche in routes/admin.php il riferimento alla funzione da richiamare
    public function fileMovimentiForm(Request $request){
        $documenti = Documenti::getList($request->input('id'),'Movimenti');  
        return view('conti.documenti.insert', [
            'id'=>$request['id']),
            'documenti'=>$documenti
        ]);
    }
    */

    public function listaDocumenti()
    {
        return view('documenti.lista',['data'=>Documenti::all()]);
    } 
}
