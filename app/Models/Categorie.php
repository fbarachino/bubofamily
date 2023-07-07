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
        return DB::table('categories')->where('cat_uscita','=',1)->orderBy('cat_name')->get(); 
    }

    public static function listEntrata()
    {
        return DB::table('categories')->where('cat_entrata','=',1)->orderBy('cat_name')->get();
    }
    
    public static function inserisci($request){
        if ($request['cat_entrata']==='on')
        {
            $entrata=1;
        }
        else
        {
            $entrata=0;
        }

        if ($request['cat_uscita']==='on')
        {
            $uscita=1;
        }
        else
        {
            $uscita=0;
        }
        
       return DB::table('categories')->insert([
        'cat_name'=> $request['cat_name'],
        'cat_entrata'=>$entrata,
        'cat_uscita'=>$uscita
        ]);
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
    
    public static function updateNameById($request) {
        if ($request['cat_entrata']==='on')
        {
            $entrata=1;
        }
        else
        {
            $entrata=0;
        }

        if ($request['cat_uscita']==='on')
        {
            $uscita=1;
        }
        else
        {
            $uscita=0;
        }

        DB::table('categories')
        ->where('id','=', $request['id'])
        ->update([
            'cat_name' => $request['cat_name'],
            'cat_entrata' => $entrata,
            'cat_uscita'=>$uscita,
        ]);
        
    }
}
