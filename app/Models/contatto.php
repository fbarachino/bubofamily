<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class contatto extends Model
{
    use HasFactory;
    
   
    
    public static function listContactsById($id)
    {
        $type=[1=>'Telefono',2=>'Cellulare',3=>'Fax',4=>'Email','Website'];
        $lista=DB::table('contattos')->where('cnt_fk_anagraficaId','=',$id)->get();
        return ['tipo'=>$type,'contatti'=>$lista];
    }
    
    public static function saveNewContact($param) {
        DB::table('contattos')->insert([
            'cnt_tipo'=>$param['cnt_tipo'],
            'cnt_valore'=>$param['cnt_valore'],
            'cnt_note'=>$param['cnt_note'],
            'cnt_fk_anagraficaId'=>$param['cnt_fk_anagraficaId'],
        ]);
        
    }
    
    
}
