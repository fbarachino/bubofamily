<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;

class CategorieController extends Controller
{
    // Gestione delle categorie di movimento
    // TODO: sistemare la gestione dei dati nel Model Categorie
    
    public static function listCategorie(){
        
        return view('conti.categorie.list',['categorie'=>Categorie::list()]);
    }
    
    public static function insCategorie(Request $request)
    {
        Categorie::inserisci($request);
        return view('conti.categorie.list',['categorie'=>Categorie::list()]);
    }
    
    public function deleteCategorie(Request $request)
    {
        
        Categorie::deleteById($request['id']);
        return redirect(route('categorie'));  
    }
  
    
    public function updatePostCategorie(Request $request)
    {
        Categorie::updateNameById($request);
        return redirect(route('categorie'));
    }
    
    
    public function apiList()
    {
        $categorie=Categorie::list();
        return json_encode($categorie);
    }
    
    public function updateCategorie($id)
    {
        $categorie = Categorie::getById($id);
        return json_encode($categorie);
    }

    public function apiListSpesa()
    {
        $categorie=Categorie::listSpesa();
        return json_encode($categorie);
    }
 
    public function apiListEntrata()
    {
        $categorie=Categorie::listEntrata();
        return json_encode($categorie);
    }
}
