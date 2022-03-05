<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    // Gestione delle categorie di movimento
    
    public static function listCategorie(){
        $categorie=DB::table('categories')->orderBy('cat_name')->get();
        return view('conti.categorie.list',['categorie'=>$categorie]);
    }
    
    public static function insCategorie(Request $request)
    {
        DB::table('categories')->insert(['cat_name'=> $request['cat_name']]);
        $categorie=DB::table('categories')->orderBy('cat_name')->get();
        return view('conti.categorie.list',['categorie'=>$categorie]);
    }
    
    public function deleteCategorie(Request $request)
    {
        DB::table('categories')
        ->where('id','=', $request['id'])
        ->delete();
        return redirect(route('categorie'));  
    }
    public function updateCategorie(Request $request)
    {
        $id=$request['id'];
        $categorie=DB::table('categories')
        ->where('categories.id','=',$id)
        ->get();
        return view('conti.categorie.update',
            [
                'categorie'=> $categorie,
            ]);
    }
    
    public function updatePostCategorie(Request $request)
    {
        DB::table('categories')
        ->where('id','=', $request['id'])
        ->update([
            'cat_name' => $request['cat_name'],
        ]);
        return redirect(route('categorie'));
    }
    
    
    public function apiList()
    {
        $categorie=DB::table('categories')->orderBy('cat_name')->get();
        return json_encode($categorie);
    }
}
