<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Rap2hpoutre\FastExcel\FastExcel;
use Rap2hpoutre\FastExcel\FastExcel;

class MovimentiController extends Controller
{
    // Gestione dei movimenti
    
    public static function newMovimenti() {
        $categorie=DB::table('categories')->orderBy('cat_name')->get();
        $tags=DB::table('tags')->orderBy('tag_name')->get();
        return view('conti.movimenti.new',[
            'categorie'=>$categorie,
            'tags'=>$tags,
        ]);
    }
    
    public static function listMovimenti(){
        $categorie=DB::table('categories')->orderBy('cat_name')->get();
        $tags=DB::table('tags')->orderBy('tag_name')->get();
        $movimenti=DB::table('movimentis')
            ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
            ->join('tags','movimentis.mov_fk_tags','=','tags.id')
            ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
            ->get();
        
        return view('conti.movimenti.list',[
            'categorie'=>$categorie,
            'movimenti'=>$movimenti,
            'tags'=>$tags 
        ]);
    }
    

    
    public static function insMovimentiSpesa(Request $request)
    {
        DB::table('movimentis')->insert(
        [
            'mov_data'=>$request['mov_data'],
            'mov_fk_categoria'=>$request['mov_fk_categoria'],
            'mov_descrizione'=>$request['mov_descrizione'],
            'mov_importo'=>'-'.$request['mov_importo'],
            'mov_fk_tags'=>$request['mov_fk_tags'],
            'mov_inserito_da'=>$request['userid'],
        ]);
        $mov=DB::table('movimentis')
            ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
            ->join('tags','movimentis.mov_fk_tags','=','tags.id')
            ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
            ->get();
        $categorie=DB::table('categories')
            ->orderBy('cat_name')
            ->get();
        $tags=DB::table('tags')
            ->orderBy('tag_name')
            ->get();
        return view('conti.movimenti.list',
            [
                'categorie'=> $categorie,
                'movimenti'=> $mov,
                'tags'=>$tags,
            ]);
          
           /* return dd($mov);*/  
    }
    public static function insMovimentiEntrata(Request $request)
    {
        DB::table('movimentis')->insert(
            [
                'mov_data'=>$request['mov_data'],
                'mov_fk_categoria'=>$request['mov_fk_categoria'],
                'mov_descrizione'=>$request['mov_descrizione'],
                'mov_importo'=>$request['mov_importo'],
                'mov_fk_tags'=>$request['mov_fk_tags'],
                'mov_inserito_da'=>$request['userid'],
            ]);
        $mov=DB::table('movimentis')
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->join('tags','movimentis.mov_fk_tags','=','tags.id')
        ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
        ->get();
        $categorie=DB::table('categories')
        ->orderBy('cat_name')
        ->get();
        $tags=DB::table('tags')
        ->orderBy('tag_name')
        ->get();
        return view('conti.movimenti.list',
            [
                'categorie'=> $categorie,
                'movimenti'=> $mov,
                'tags'=>$tags,
            ]);
        
        /* return dd($mov);*/
    }
    public function exportMovimenti()
    {
        $movimenti = DB::table('movimentis')
            ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
            ->join('tags','movimentis.mov_fk_tags','=','tags.id')
            ->selectRaw('mov_data AS Data,cat_name AS Categoria,tag_name AS Tag,mov_descrizione AS Descrizione,mov_importo AS Importo')
            ->orderBy('Data','asc')
            ->get();
        foreach ($movimenti as $movimento)
        {
            $lista[]=[
                'Data'=>$movimento->Data,
                'Categoria'=>$movimento->Categoria,
                'Tag'=>$movimento->Tag,
                'Descrizione'=>$movimento->Descrizione,
                'Importo'=>$movimento->Importo
            ];
        }
            return (new FastExcel($lista))->download('movimenti_al_'.date('d-m-Y').'.ods');
            // return dd($movimenti);
    }
    
    public function resocontoMovimenti()
    {
        // SELECT Sum(movimentis.mov_importo) as resoconto, categories.cat_name FROM movimentis JOIN categories ON movimentis.mov_fk_categoria = categories.id GROUP BY categories.id;
        $reportSpesa = DB::table('movimentis')
            ->selectRaw('ABS(Sum(movimentis.mov_importo)) as resoconto, categories.cat_name')
            ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
            ->where('mov_importo','<',0)
            ->whereYear('mov_data',date('Y'))
            ->groupBy('cat_name')
            ->get();
            $reportEntrate = DB::table('movimentis')
            ->selectRaw('ABS(Sum(movimentis.mov_importo)) as resoconto, categories.cat_name')
            ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
            ->where('mov_importo','>',0)
            ->whereYear('mov_data',date('Y'))
            ->groupBy('cat_name')
            ->get();
        return view('components.charts',[
            'dataSpesa'=>$reportSpesa,
            'dataEntrate'=>$reportEntrate,
            
        ]);
    }
    
    public function updateMovimenti(Request $request)
    {
        $id=$request['id'];
        $mov=DB::table('movimentis')
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->join('tags','movimentis.mov_fk_tags','=','tags.id')
        // ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
        ->where('movimentis.id','=',$id)
        ->get();
        $categorie=DB::table('categories')
        ->orderBy('cat_name')
        ->get();
        $tags=DB::table('tags')
        ->orderBy('tag_name')
        ->get();
        return view('conti.movimenti.update',
            [
                'categorie'=> $categorie,
                'movimenti'=> $mov,
                'tags'=>$tags,
            ]);
    }
    
    public function updatePostMovimenti(Request $request)
    {
        DB::table('movimentis')
            ->where('id','=', $request['id'])
            ->update([
                'mov_data' => $request['mov_data'],
                'mov_fk_categoria'=>$request['mov_fk_categoria'],
                'mov_descrizione'=>$request['mov_descrizione'],
                'mov_importo'=>$request['mov_importo'],
                'mov_fk_tags'=>$request['mov_fk_tags'],
                'mov_inserito_da'=>$request['userid'],
                
            ]);
        return redirect(route('movimenti'));
    }
    
    public function deleteMovimenti(Request $request)
    {
        DB::table('movimentis')
        ->where('id','=', $request['id'])
        ->delete();
        return redirect(route('movimenti'));
        
    }
    
    
    public function apiList()
    {
        $movments=DB::table('movimentis')->orderBy('mov_data','desc')->get();
        return json_encode($movments);
    }
    
    

}
