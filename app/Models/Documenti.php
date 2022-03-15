<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documenti extends Model
{
    use HasFactory;
    
    public static function countDocument($id){
        $quanti=DB::table('documentis')
        ->where('movimenti_id','=',$id)
        ->count();
        return $quanti;
    }

}
