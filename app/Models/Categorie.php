<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorie extends Model
{
    use HasFactory;
    
    public static function getIdCategoriaByName($name)
    {
        return DB::table('categories')->where('cat_name',$name)->get('id');
    }
    
    public static function list()
    {
        return self::all();
    }

    public static function listSpesa()
    {
        return DB::table('categories')->where('cat_spesa','=',1)->get();
    }

    public static function listEntrata()
    {
        return DB::table('categories')->where('cat_entrata','=',1)->get();
    }
    
    public static function inserisci($name){
       return DB::table('categories')->insert(['cat_name'=> $name]);
    }
    
    public static function deleteById($id){
    DB::table('categories')
    ->where('id','=', $id)
    ->delete();
    }
    
    public static function getById($id) {
        return DB::table('categories')
        ->where('categories.id','=',$id)
        ->get();
    }
    
    public static function updateNameById($id,$name) {
        DB::table('categories')
        ->where('id','=', $id)
        ->update([
            'cat_name' => $name,
        ]);
        
    }
}
