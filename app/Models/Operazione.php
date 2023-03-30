<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Operazione extends Model
{
    use HasFactory;
    
    // Operazione effettuata sull'auto
    
    public static function saveOperazione($data)
    {
        // inserisce nel database e ritorna l'id
        $id=DB::table('operaziones')->insertGetId(
            [
                'fk_auto_id'=>$data['auto'],
                'data'=>$data['data'],
                'km'=>$data['km'],
                'importo'=>$data['importo'],
                'type'=>$data['type']
            ]
            );
        return $id;
    }
}
