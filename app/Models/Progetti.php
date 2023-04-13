<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Progetti extends Model
{
    use HasFactory;
    
    public static function getProgetti() {
        return DB::table('progettis')->get(); 
    }
    
    public static function getProgettoById($id){
       return DB::table('progettis')->where('id','=',$id)->get();
    }
    
    public static function saveProgetto($progetto){
        DB::table('progettis')->insert([
           'nome'=>$progetto['nome'],
            'descrizione'=>$progetto['descrizione'],
            'data_creazione'=>date('Y-m-d'),
            'data_inizio'=>$progetto['data_inizio'],
            'data_fine'=>$progetto['data_fine'],
            'fk_user'=>$progetto['coordinatore'],
            'budget'=>$progetto['budget'],
            'stato'=>$progetto['stato'],
            'note'=>$progetto['note']
        ]);
     
    }
    
    public static function delProgetto($progetto_id)
     {
         DB::table('progettis')->delete($progetto_id);
     }
    
}
