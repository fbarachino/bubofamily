<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Documenti extends Model
{
    use HasFactory;
    
    public static function countDocument($id){
        $quanti=DB::table('documentis')
        ->where('movimenti_id','=',$id)
        ->count();
        return $quanti;
    }

    // Proposta modifica {issue #5} gitea (generalizzazione del documento)
    /*
    public static function countDocument($id,$entity)
    {
        return self::where('entita','=',$entity)->where('entita_id','=',$id)->count();
    }
    */
    
    public static function store($req) {
        $movimento_id=$req->input('id');
        $filename=$req->file('filename')->store('Documenti');
        DB::table('documentis')
        ->insert([
            'movimenti_id'=>$movimento_id,
            'descrizione'=>$req->input('descrizione'),
            'filename'=>$filename,
        ]);
    }

    // Proposta modifica {issue #5} gitea (generalizzazione del documento)
    /*
    public static function store($req) {
        $movimento_id=$req->input('id');
        $filename=$req->file('filename')->store('Documenti');
        self::create([
            'entità'=>$req['entita'],           // aggiunto per determinare il tipo di entità a cui si riferisce il documento
            'entita_id'=>$req['entita_id'],     // aggiunto per identificare il record al quale associare il documento (al posto di id_movimento)
            'descrizione'=>$req['descrizione'],
            'filename'=>$filename
        ]);
    }
    */
    
    public static function getList($id)
    {
        return DB::table('documentis')
        ->where('movimenti_id','=',$id)
        ->get();
    }

    // Proposta modifica issue {#5 gitea} (generalizzazione del documento)
    /*
    public static function getList($id,$entity)
    {
        self::where('entita','=',$entity)->where('entita_id','=',$id)->get();
    }
    */
}
