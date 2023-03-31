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
    
    public static function getList($id)
    {
        return DB::table('documentis')
        ->where('movimenti_id','=',$id)
        ->get();
    }

}
