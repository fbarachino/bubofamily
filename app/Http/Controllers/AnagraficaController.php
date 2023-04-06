<?php

namespace App\Http\Controllers;

use App\Models\anagrafica;
use App\Models\contatto;
use Illuminate\Http\Request;

class AnagraficaController extends Controller
{
    //
    public function newContact()
    {
        return view('anagrafica.form');
    }
    
    public function insContact(Request $request)
    {
        anagrafica::inserisci($request);
        return view('anagrafica.list',['anagrafiche'=>anagrafica::getList()]);
    }
    
    public function schedaContact(Request $request)
    {
        $dati = anagrafica::getById($request['id']);
        return view('anagrafica.scheda',['anagrafiche'=>$dati]);
    }
    
    public function listContact()
    {
        return view('anagrafica.list',['anagrafiche'=>anagrafica::getList()]);
    }
    
    public function modifica(Request $request)
    {    
       return view('anagrafica.form',['anagrafiche'=>anagrafica::getById($request['id'])]);
    }
    
    public function getScheda(Request $request)
    {
        $id=$request['id'];
        $anagrafica = anagrafica::getById($id);
        $contatto=contatto::listContactsById($id);
        return view('anagrafica.dettagli',['anagrafiche'=>$anagrafica,'contatti'=>$contatto['contatti'],'tipo'=>$contatto['tipo']]);
        
    }
    
    public function insOtherContact(Request $param){
        $contatto=contatto::listContactsById($param['id']);
        return view('anagrafica.altrocontatto',['id'=>$param['id'],'tipo'=>$contatto['tipo']]);
    }
    
    public function saveOtherContact(Request $param){
        // return view('anagrafica.altrocontatto',[id=>$param['id']]);
        contatto::saveNewContact($param);
        $contatto=contatto::listContactsById($param['cnt_fk_anagraficaId']);
        if($param['another'])
        {
            return view('anagrafica.altrocontatto',['tipo'=>$contatto['tipo'],'id'=>$param['cnt_fk_anagraficaId']]);
        }else {
            return redirect(Route('contatti'));
        }
    }
    
    
    
}
