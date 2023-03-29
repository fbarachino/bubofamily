<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AutoController extends Controller
{
    //
    public static function index()
    {
        // lista le auto inserite nel gestionale
        $lista=DB::table('autos')->select(['targa','marca','modello','id'])->get();
        // dd($lista); // debug
        return view('auto.list',['title'=>'Automobile', 'automobili'=>$lista]);
    }
    
    public function newAuto()
    {
        // mostra il form di inserimento di una nuova Auto
        return view('auto.form',['title'=>'Form Automobile']);
    }
    
    public function saveAuto(Request $request)
    {
        // inserisce l'auto nel database e torna alla lista o ad un nuovo inserimento in base
        // dd($request);
      
        DB::table('autos')->insert([
            'targa'=>$request['targa'],
            'marca'=>$request['marca'],
            'modello'=>$request['modello'],
            'cilindrata'=>$request['cilindrata'],
            'cvfiscali'=>$request['cvfiscali'],
            'alimentazione'=>$request['alimentazione'],
            'ntelaio'=>$request['ntelaio'],
            'nmotore'=>$request['nmotore'],
            'data_acquisto'=>$request['data_acquisto'],
            'note'=>$request['note'],
        ]);
        
        if ($request['another']=='on')
        {
            return redirect(route('auto_new'));
        }
        else {
            return redirect(route('auto_list'));
        }
        
    }
    
    public function delAuto(Request $id)
    {
        DB::table('autos')->delete($id['id']);
        return redirect(route('auto_list'));
    }
    
    public function getAutoDetails(request $id)
    {
        // Ritorna i dettagli dell'auto
        $dettagli=DB::table('autos')->find($id['id']);
        return view('auto.detail',[
            'dettagli' => $dettagli,
        ]);
    }
    
    public function getTCOAuto(request $id)
    {
        
    }
}
