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
        return DB::table('riga_progettos')->where('fk_id_progetto','=',$progetto_id)->get();
    }
    
    public static function saveRiga($args)
    {
        DB::table('riga_progettos')->insert([
            'fk_id_progetto'=>$args['fk_id_progetto'],
            'data'=>$args['data'],
            'descrizione'=>$args['descrizione'],
            'prezzo'=>$args['prezzo'],
            'ore'=>$args['ore'],
        ]);
    }
}
