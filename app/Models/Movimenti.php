<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class Movimenti extends Model
{
    use HasFactory;


    public static function getList() {
        return DB::table('movimentis')
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->join('tags','movimentis.mov_fk_tags','=','tags.id')
        ->leftJoin('documentis', 'movimenti_id','=','movimentis.id')
        ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name', DB::raw('Count(movimenti_id) as quanti'))
        ->groupBy('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
        ->get();
    }
    
    public static function getSaldo($date) {
        return DB::table('movimentis')->whereYear('mov_data','=',$date)->sum('mov_importo');
    }
    
    public static function insSpesa($request) {
        DB::table('movimentis')->insert(
            [
                'mov_data'=>$request['mov_data'],
                'mov_fk_categoria'=>$request['mov_fk_categoria'],
                'mov_descrizione'=>$request['mov_descrizione'],
                'mov_importo'=>'-'.$request['mov_importo'],
                'mov_fk_tags'=>$request['mov_fk_tags'],
                'mov_inserito_da'=>$request['userid'],
            ]);
    }
    
    public static function insEntrata($request) {
        DB::table('movimentis')->insert(
            [
                'mov_data'=>$request['mov_data'],
                'mov_fk_categoria'=>$request['mov_fk_categoria'],
                'mov_descrizione'=>$request['mov_descrizione'],
                'mov_importo'=>$request['mov_importo'],
                'mov_fk_tags'=>$request['mov_fk_tags'],
                'mov_inserito_da'=>$request['userid'],
            ]);
    }
    
    public static function export() {
        return DB::table('movimentis')
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->join('tags','movimentis.mov_fk_tags','=','tags.id')
        ->selectRaw('mov_data AS Data,cat_name AS Categoria,tag_name AS Tag,mov_descrizione AS Descrizione,mov_importo AS Importo')
        ->orderBy('Data','asc')
        ->get();
    }
    
    public static function reportSpesa($year,$month) {
        return DB::table('movimentis')
        ->selectRaw('ABS(Sum(movimentis.mov_importo)) as resoconto, categories.cat_name,categories.id')
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->where('mov_importo','<',0)
        ->whereYear('mov_data',$year)
        ->whereMonth('mov_data',$month)
        ->groupBy('cat_name','categories.id')
        ->get();
    }
    
    public static function reportEntrate($year,$month) {
        return DB::table('movimentis')
        ->selectRaw('ABS(Sum(movimentis.mov_importo)) as resoconto, categories.cat_name,categories.id')
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->where('mov_importo','>',0)
        ->whereYear('mov_data',$year)
        ->whereMonth('mov_data',$month)
        ->groupBy('cat_name','categories.id')
        ->get();
    }
    
    public static function getMovimentoById($id) {
        return DB::table('movimentis')
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->join('tags','movimentis.mov_fk_tags','=','tags.id')
        ->where('movimentis.id','=',$id)
        ->get();
    }
    
    public static function updateMovimenti($request) {
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
    }
    
    public static function deleteMovimento($id) {
        DB::table('movimentis')
        ->where('id','=', $id)
        ->delete();
    }
    
    public static function listByCatMonth($month,$cat) {
        return DB::table('movimentis')
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->join('tags','movimentis.mov_fk_tags','=','tags.id')
        ->where('movimentis.mov_fk_categoria','=',$cat)
        ->whereMonth('mov_data','=',$month)
        ->leftJoin('documentis', 'movimenti_id','=','movimentis.id')
        ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name', DB::raw('Count(movimenti_id) as quanti'))
        ->groupBy('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
        ->get();
    }
    
    public static function listByCategory($cat) {
        DB::table('movimentis')
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->join('tags','movimentis.mov_fk_tags','=','tags.id')
        ->where('movimentis.mov_fk_categoria','=',$cat)
        ->leftJoin('documentis', 'movimenti_id','=','movimentis.id')
        ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name', DB::raw('Count(movimenti_id) as quanti'))
        ->groupBy('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
        ->get();
    }
    
    public static function getByTag($tag) {
        DB::table('movimentis')
        ->where('mov_fk_tags','=',$tag)
        ->join('categories','movimentis.mov_fk_categoria','=','categories.id')
        ->join('tags','movimentis.mov_fk_tags','=','tags.id')
        ->leftJoin('documentis', 'movimenti_id','=','movimentis.id')
        ->select('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name', DB::raw('Count(movimenti_id) as quanti'))
        ->groupBy('movimentis.id','mov_data','mov_descrizione','mov_importo','cat_name','tag_name')
        ->get();
    }

    public static function importEstrattoIng($filename)
    {
        //$file = str_replace('/EC/','',$filename);
        $inputPath='/var/www/html/bubofamily/public/storage/'.$filename;
        $outputPath='/var/www/html/bubofamily/public/'.$filename;
        rename($inputPath,$outputPath);
       
        $collection = (new FastExcel)->import($filename, function ($line){
            if($line['Data valuta'])
            {
                Movimenti::insEntrata([
                    'mov_data'=>Movimenti::dateFormat(0,$line['Data valuta']),
                    'mov_fk_categoria'=>1,
                    'mov_descrizione'=>$line['Descrizione operazione'],
                    'mov_importo'=>trim(str_replace(',','.',(str_replace('.','',str_replace('€', '', $line['Importo']))))),
                    'mov_fk_tags'=>1,
                    'userid'=>1,
                ]);
            }

           });
        //dd($outputPath);
    }
    
    public static function importEstrattoCR($filename)
    {
        //$file = str_replace('/EC/','',$filename);
        $inputPath='/var/www/html/bubofamily/public/storage/'.$filename;
        $outputPath='/var/www/html/bubofamily/public/'.$filename.'.csv';
        rename($inputPath,$outputPath);
        
        $collection = (new FastExcel)->configureCsv(';')->import($filename.'.csv', function ($line){
            if($line['VALUTA'])
            {
                if($line['DARE']<>'')
                {
                $dati=[
                    'mov_data'=>Movimenti::dateFormat(0,$line['VALUTA']),
                    'mov_fk_categoria'=>1,
                    'mov_descrizione'=>$line['DESCRIZIONE OPERAZIONE'],
                    'mov_importo'=>'-'.trim(str_replace(',','.',(str_replace('.','',$line['DARE'])))),
                    'mov_fk_tags'=>1,
                    'userid'=>1,
                ];
                }
                if($line['AVERE']<>'')
                {
                    $dati=[
                        'mov_data'=>Movimenti::dateFormat(0,$line['VALUTA']),
                        'mov_fk_categoria'=>1,
                        'mov_descrizione'=>$line['DESCRIZIONE OPERAZIONE'],
                        'mov_importo'=>trim(str_replace(',','.',(str_replace('.','',$line['AVERE'])))),
                        'mov_fk_tags'=>1,
                        'userid'=>1,
                    ];
                }
                Movimenti::insEntrata($dati);
               // dd($dati);
            }
            
        });
            //dd($outputPath);
    }
    private static function dateFormat($type,$string)
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
}
