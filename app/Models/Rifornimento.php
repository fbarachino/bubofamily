<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rifornimento extends Model
{
    use HasFactory;
    
    // Inserisce i dati di un rifornimento
    public static function saveRifornimento($id,$data)
    {
        DB::table('rifornimentos')->insert([
            'eurolitro'=>$data['eurolitro'],
            'litri'=>$data['litri'],
            'distributore'=>$data['distributore'],
            'fk_operazione_id'=>$id
        ]);
    }
    
    public static function getElementsbyOperazione($data) {
        return DB::table('rifornimentos')->where('fk_operazione_id','=',$data)->get();
    }
}
