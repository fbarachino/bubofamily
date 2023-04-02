<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Manutenzione extends Model
{
    use HasFactory;
    
    public static function saveRevisione($id,$data)
    {
        DB::table('manutenziones')->insert([
            'fk_operazione_id'=>$id,
            'descrizione'=>$data['descrizione'],
        ]);
    }
    
    public static function getElementsbyOperazione($data) {
        return DB::table('manutenziones')->where('fk_operazione_id','=',$data)->get();
    }
}
