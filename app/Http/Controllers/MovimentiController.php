<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Rap2hpoutre\FastExcel\FastExcel;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Arr;

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
       /* Query per visualizzare anche il totale dei documenti presenti per il record */
         $movimenti=DB::table('movimentis')
            ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
            ->join('tags','movimentis.mov_fk_tags','=','tags.id')
            ->leftJoin('documentis', 'movimenti_id','=','movimentis.id')
            ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name', DB::raw('Count(movimenti_id) as quanti'))
            ->groupBy('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
            ->get();
         
        
        return view('conti.movimenti.list',[
            'categorie'=>$categorie,
            'movimenti'=>$movimenti,
            'tags'=>$tags 
        ]);
    }
    
    public static function dashboard()
    {
        $bilancio=DB::table('movimentis')->whereYear('mov_data','=',date('Y'))->sum('mov_importo');
        
        
        return view('layouts.dashboard',[
            'bilancio'=>$bilancio,
            
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
        ->leftJoin('documentis', 'movimenti_id','=','movimentis.id')
        ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name', DB::raw('Count(movimenti_id) as quanti'))
        ->groupBy('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
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
        ->leftJoin('documentis', 'movimenti_id','=','movimentis.id')
        ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name', DB::raw('Count(movimenti_id) as quanti'))
        ->groupBy('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
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
                //'Importo'=>str_replace(".",",",$movimento->Importo),
                'Importo'=>$movimento->Importo,
            ];
        }
            return (new FastExcel($lista))->download('movimenti_al_'.date('d-m-Y').'.xls');
            // return dd($movimenti);
    }
    
    public function resocontoMovimenti(Request $request)
    {
        if(!$request['Year'])
        {
            $year=date('Y');
        }
        else {
            $year=$request['Year'];
        }
        
        if (!$request['Month'])
        {
            $month=date('m');
        }
        else {
            $month=$request['Month'];
        }
        
        $reportSpesa = DB::table('movimentis')
            ->selectRaw('ABS(Sum(movimentis.mov_importo)) as resoconto, categories.cat_name,categories.id')
            ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
            ->where('mov_importo','<',0)
            ->whereYear('mov_data',$year)
            ->whereMonth('mov_data',$month)
            ->groupBy('cat_name','categories.id')
            ->get();
        
        $reportEntrate = DB::table('movimentis')
            ->selectRaw('ABS(Sum(movimentis.mov_importo)) as resoconto, categories.cat_name,categories.id')
            ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
            ->where('mov_importo','>',0)
            ->whereYear('mov_data',$year)
            ->whereMonth('mov_data',$month)
            ->groupBy('cat_name','categories.id')
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
    
    public function listMovPerCateg(Request $request)
    {
        $mov=DB::table('movimentis')
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->join('tags','movimentis.mov_fk_tags','=','tags.id')
        ->where('movimentis.mov_fk_categoria','=',$request['cat'])
        ->whereMonth('mov_data','=',$request['month'])
        ->leftJoin('documentis', 'movimenti_id','=','movimentis.id')
        ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name', DB::raw('Count(movimenti_id) as quanti'))
        ->groupBy('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
        ->get();
        return view('conti.movimenti.list',
            [
                'movimenti'=> $mov,     
            ]);
    }
    
    public function listMovByCat(Request $request)
    {
        $mov=DB::table('movimentis')
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->join('tags','movimentis.mov_fk_tags','=','tags.id')
        ->where('movimentis.mov_fk_categoria','=',$request['cat'])
        ->leftJoin('documentis', 'movimenti_id','=','movimentis.id')
        ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name', DB::raw('Count(movimenti_id) as quanti'))
        ->groupBy('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
        ->get();
        return view('conti.movimenti.list',
            [
                'movimenti'=> $mov,
            ]);
    }
    
    public function reportCategorieAnno($anno = 0)
    {
        if ($anno <= 1970)
        {
            $anno = date('Y');    
        }
        
        $mesi=['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];
        $categorie=DB::table('categories')->orderBy('cat_name')->get();
        
        foreach ($categorie as $categoria)
        {
            $id=$categoria->id;
            $ncategoria=$categoria->cat_name;
            for ($i=1;$i<=12;$i++)
            {
                $movrow=DB::table('movimentis')
                    ->whereMonth('mov_data','=',$i)
                    ->whereYear('mov_data','=',$anno)
                    ->where('mov_fk_categoria','=',$id)
                    ->sum('mov_importo');
                
                    
                    $coll[]=$movrow;
                    $collx[]=$movrow;
                    //$coll[] = ['totale' => $movrow];
                    // $coll[]=array_push(array_sum($coll['totale']));
                    
                    // $coll[]=array_push($coll,$totale);
               }
            $totale[]=array_sum($collx);
            unset($collx);
        }
         /*dd($totale);*/
        return view('conti.report.catanno',[
                'categorie'=>$categorie,
                'mesi'=>$mesi,
                'matrice'=>array_chunk($coll, 12),
                'totale'=>$totale,
                'anno'=>$anno
        ]);
    }
    
    public function reportCategorieAnnoXLS($anno = 0)
    {
        if ($anno <= 1970)
        {
            $anno = date('Y');
        }
        
        $intestazione=['Categoria','Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];
        $categorie=DB::table('categories')->orderBy('cat_name')->get();
        
        foreach ($categorie as $categoria)
        {
            $id=$categoria->id;
            $ncategoria=$categoria->cat_name;
            for ($i=1;$i<=12;$i++)
            {
                $movrow=DB::table('movimentis')
                ->whereMonth('mov_data','=',$i)
                ->whereYear('mov_data','=',$anno)
                ->where('mov_fk_categoria','=',$id)
                ->sum('mov_importo');
                
                //$coll[] = str_replace(".",",",$movrow);
                $coll[] = $movrow;
               
            }
            
            $row[]=array_combine($intestazione,array_merge(array($ncategoria),$coll));
            unset($coll); 
        }
     return (new FastExcel($row))->download('report_al_'.date('d-m-Y').'.xls');   
    }
    
    public function apiList()
    {
        $movments = DB::table('movimentis')
            ->orderBy('mov_data','desc')
            ->get();
        return json_encode($movments);
    }
    
    

}
