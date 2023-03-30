<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Accessori extends Model
{
    use HasFactory;
    
    public static function saveAccessori($id,$data)
    {
        DB::table('accessoris')->insert([
            'fk_operazione_id'=>$id,
            'descrizione'=>$data['descrizione'],
        ]);
    }
}
