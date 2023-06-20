<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Progetti extends Model
{
    use HasFactory;

    public static function getProgetti() {
        return DB::table('progettis')
        ->select(
            'progettis.id as progetto',
            'users.id as userid',
            'nome',
             'name',
            'descrizione',
            'data_creazione',
            'data_fine',
            'budget',
            'stato',
            'note')
        ->join('users','progettis.fk_user','=','users.id')->get();
    }

    public static function getProgettoById($id){
        return DB::table('progettis')->
            join('users','progettis.fk_user','=','users.id')->
            select('users.id as userid', 'users.name as name', 'progettis.*')->
            where('progettis.id','=',$id)->
            get();
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

    public static function chiudiProgetto($progetto_id)
    {
        // chiude il progetto e lo rende non cancellabile e non più editabile
        // potrà solo essere esportato in PDF
        DB::table('progettis')
        ->where('id','=', $progetto_id)
        ->update([
            'stato'=>'chiuso',
            'data_fine'=>date('Y-m-d'),
        ]);

    }

    public static function riapriProgetto($progetto_id)
    {
        DB::table('progettis')
        ->where('id','=', $progetto_id)
        ->update([
            'stato'=>'aperto',
            'data_fine'=>null,
        ]);
    }

}
