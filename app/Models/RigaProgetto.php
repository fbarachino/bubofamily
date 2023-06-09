<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RigaProgetto extends Model
{
    use HasFactory;
    
    public static function getRigheProgetto($progetto_id)
    {
        return DB::table('riga_progettos')->where('fk_id_progetto','=',$progetto_id)->orderBy('data')->get();
    }
    
    public static function saveRiga($args,$id)
    {
        DB::table('riga_progettos')->insert([
            'fk_id_progetto'=>$id,
            'data'=>$args['data'],
            'descrizione'=>$args['descrizione'],
            'prezzo'=>$args['prezzo'],
            'ore'=>$args['ore'],
        ]);
    }
    
    public static function deleteRow($id)
    {
        DB::table('riga_progettos')->delete($id);
    }
    
    public static function getCostoRighe($id)
    {
        return DB::table('riga_progettos')->select(DB::raw('SUM(prezzo) as costo'))->where('fk_id_progetto','=',$id)->get();
    }

    public static function getRigaById($id)
    {
        return DB::table('riga_progettos')->where('id','=',$id)->get();
    }
    
    public static function updateRiga($data)
    {
        DB::table('riga_progettos')->where('id','=',$data['idriga'])->update([
            'data'=>$data['data'],
            'descrizione'=>$data['descrizione'],
            'prezzo'=>$data['prezzo'],
            'ore'=>$data['ore'],
        ]);
    }
}
