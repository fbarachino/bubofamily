<?php

namespace App\Http\Controllers;


use App\Models\Accessori;
use App\Models\Auto;
use App\Models\Manutenzione;
use App\Models\Operazione;
use App\Models\Revisione;
use App\Models\Rifornimento;
use Illuminate\Http\Request;


class AutoController extends Controller
{
    //
    public function index()
    {
        // lista le auto inserite nel gestionale
        return view('auto.list',['title'=>'Automobile', 'automobili'=>Auto::getAutoList()]);
    }
    
    public function newAuto()
    {
        // mostra il form di inserimento di una nuova Auto
        return view('auto.form',['title'=>'Form Automobile']);
    }
    
    public function saveAuto(Request $request)
    {
        // Salva una nuova auto
        Auto::saveAuto($request);  
        if ($request['another']=='on')
        {
            return redirect(route('auto_new'));
        }
        else 
        {
            return redirect(route('auto_list'));
        }
    }
    
    public function delAuto(Request $id)
    {
        Auto::delAuto($id);
        return redirect(route('auto_list'));
    }
    
    public function getAutoDetails(request $id)
    {
        // Ritorna i dettagli dell'auto
        return view('auto.detail',[
            'dettagli' => Auto::getAutoById($id['id']),
        ]);
    }
    
   
    
    public function getTCOAuto(request $id)
    {
        // Ritorna la somma di tutti i costi sostenuti per l'auto
    }
    
    
    
    public function rifornimentoAuto(Request $id)
    {
        return view('auto.rifornimento',['id'=>$id['id'],'dettagli'=>Auto::getAutoById($id['id'])]);        
    }
    
    public function manutenzioneAuto(Request $id)
    {
        return view('auto.manutenzione',['id'=>$id['id'],'dettagli'=>Auto::getAutoById($id['id'])]);
    }
    
    public function revisioneAuto(Request $id)
    {
        return view('auto.revisione',['id'=>$id['id'],'dettagli'=>Auto::getAutoById($id['id'])]);
    }
    
    public function accessoriAuto(Request $id)
    {
        return view('auto.accessori',['id'=>$id['id'],'dettagli'=>Auto::getAutoById($id['id'])]);
    }
    
    public function saveRifornimento(Request $request)
    {
        $id=Operazione::saveOperazione($request);
        Rifornimento::saveRifornimento($id,$request);
        return redirect(route('auto_list'));
    }
    
    public function saveManutenzione(Request $request)
    {
        $id=Operazione::saveOperazione($request);
        Manutenzione::saveManutenzione($id,$request);
        return redirect(route('auto_list'));
    }
    
    public function saveAccessori(Request $request)
    {
        $id=Operazione::saveOperazione($request);
        Accessori::saveAccessori($id,$request);
        return redirect(route('auto_list'));
    }
    
    public function saveRevisione(Request $request)
    {
        $id=Operazione::saveOperazione($request);
        Revisione::saveRevisione($id,$request);
        return redirect(route('auto_list'));
    }
    
    public function getOperazioni(Request $request)
    {
        $operazioni=Operazione::getOperazioni($request['id']);
        dd($operazioni);
    }
}
