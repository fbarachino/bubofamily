<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Movimenti;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class MovimentiController extends Controller
{
    // Gestione dei movimenti
    public static function newMovimenti() {
        $categorie=Categorie::list();
        $tags=tag::getList();
        return view('conti.movimenti.new',[
            'categorie'=>$categorie,
            'tags'=>$tags,
        ]);
    }
    
    public static function listMovimenti(){
        $categorie=Categorie::list();
        $tags=tag::getList();
       /* Query per visualizzare anche il totale dei documenti presenti per il record */
        $movimenti=Movimenti::getList();
         
        
        return view('conti.movimenti.list',[
            'categorie'=>$categorie,
            'movimenti'=>$movimenti,
            'tags'=>$tags 
        ]);
    }
    
    public static function dashboard()
    {
        $bilancio=Movimenti::getSaldo(date('Y'));        
        return view('layouts.dashboard',[
            'bilancio'=>$bilancio,
        ]);
    }
    
    public static function insMovimentiSpesa(Request $request)
    {
        Movimenti::insSpesa($request);
        $mov=Movimenti::getList();        
        $categorie=Categorie::list();
        $tags=tag::getList();
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
        Movimenti::insEntrata($request);
        $mov=Movimenti::getList();
        $categorie=Categorie::list();
        $tags=tag::getList();
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
        $movimenti = Movimenti::export();
        foreach ($movimenti as $movimento)
        {
            $lista[]=[
                'Data'=>$movimento->Data,
                'Categoria'=>$movimento->Categoria,
                'Tag'=>$movimento->Tag,
                'Descrizione'=>$movimento->Descrizione,
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
        
        $reportSpesa = Movimenti::reportSpesa($year, $month);
        $reportEntrate = Movimenti::reportEntrate($year,$month);
        
        return view('components.charts',[
            'dataSpesa'=>$reportSpesa,
            'dataEntrate'=>$reportEntrate,    
        ]);
    }
    
    public function updateMovimenti(Request $request)
    {
        $id=$request['id'];
        $mov=Movimenti::getMovimentoById($id);
        $categorie=Categorie::list();
        $tags=tag::getList();
        return view('conti.movimenti.update',
            [
                'categorie'=> $categorie,
                'movimenti'=> $mov,
                'tags'=>$tags,
            ]);
    }
    
    public function updatePostMovimenti(Request $request)
    {
        Movimenti::updateMovimenti($request);
        return redirect(route('movimenti'));
    }
    
    public function deleteMovimenti(Request $request)
    {
        Movimenti::deleteMovimento($request['id']);
        return redirect(route('movimenti'));
        
    }
    
    public function listMovPerCateg(Request $request)
    {
        $mov=Movimenti::listByCatMonth($request['month'], $request['cat']);
        return view('conti.movimenti.list',
            [
                'movimenti'=> $mov,     
            ]);
    }
    
    public function listMovByCat(Request $request)
    {
        $mov=Movimenti::listByCategory($request['cat']);
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
        $categorie=Categorie::list();
        
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
    
    public function filterByTag(Request $tag)
    {
        $mov=Movimenti::getByTag($tag['tag']);
        return view('conti.movimenti.list',
            [
                'movimenti'=> $mov,
            ]);
    }
    
    
    public function apiList()
    {
        $movments = Movimenti::getList();
        return json_encode($movments);
    }
    
    private function dateFormat($type,$string)
    {
        if($type)
        {
            list($year,$month,$day) = explode('-',$string);
            return $day.'/'.$month.'/'.$year;
        } else {
            list($day,$month,$year) =explode('/',$string);
            return $year.'-'.$month.'-'.$day;
        }
    }
    
    public function importEC_ING()
    {
        $collection = (new FastExcel)->import('file1.xlsx', function ($line){
             if($line['Data valuta'])
            {
                return Movimenti::insEntrata([
                'mov_data'=>$this->dateFormat(0,$line['Data valuta']),
                'mov_fk_categoria'=>1,
                'mov_descrizione'=>$line['Descrizione operazione'],
                'mov_importo'=>trim(str_replace(',','.',(str_replace('.','',str_replace('€', '', $line['Importo']))))),
                'mov_fk_tags'=>1,
                'userid'=>1,
                ]
            );
            }
            /*
             *  "Data contabile" => "29/03/2023"
  "Data valuta" => "29/03/2023"
  "Causale" => "PAGAMENTI DIVERSI"
  "Descrizione operazione" => "Addebito SDD CORE Scad. 29/03/2023 Imp. 5.99 Creditor id. IT46ZZZ0000013970161009 ILIAD Id Mandato ILIAD-FR9HXO-1 Debitore FLAVIO BARACHINO E PAOLA BRENTARI Rif ▶"
  "Importo" => "€ -5,99"
             */
            //dd($line);
        });
    }
    

}
