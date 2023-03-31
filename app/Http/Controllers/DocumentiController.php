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
}
