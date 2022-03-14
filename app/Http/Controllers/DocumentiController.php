<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentiController extends Controller
{
    //
    public function storeFile(Request $req){
        if ($req->hasFile('filename'))
        {
            $movimento_id=$req->input('id');
            $filename=$req->file('filename')->store('Documenti');
            DB::table('documentis')
            ->insert([
                'movimenti_id'=>$movimento_id,
                'descrizione'=>$req->input('descrizione'),
                'filename'=>$filename,
            ]);
            return redirect(route('documenti',['id'=>$movimento_id,]));
        }
        else 
        {
            return 'Nessun File trovato';
        }
    }
    
    public function fileForm(Request $request){
        $documenti = DB::table('documentis')
            ->where('movimenti_id','=',$request->input('id'))
            ->get();
        return view('conti.documenti.insert', [
            'id'=>$request->input('id'),
            'documenti'=>$documenti
        ]);
    }
}
