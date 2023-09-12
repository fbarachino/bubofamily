<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GenDoc extends Model
{
    use HasFactory;

    // DocumentiGenerali

    public static function saveDocument($entity,$entity_id,$data){
        
        $filename=$data->file('filename')->store('Documenti');
        DB::table('gen_docs')
        ->insert([
            'entity'=>$entity,
            'entity_id'=>$data->input('id'),
            'descrizione'=>$data->input('descrizione'),
            'filename'=>$filename,
        ]);
    }

    public static function listDocument($entity,$entity_id)
    {
        // Ritorna la lista dei documenti in base all'entità e al rispettivo id
        return DB::table('gen_docs')->where('entity','=',$entity)->andWere('entity_id','=',$entity_id)->get();
    }

    public static function countDocument($entity,$entity_id){
        // Conta i documenti inseriti per la determinata entità e id
        $quanti=DB::table('gen_docs')
        ->where('entity','=',$entity)
        ->andWhere('entity_id','=',$entity_id)
        ->count();
        return $quanti;
    }


}
