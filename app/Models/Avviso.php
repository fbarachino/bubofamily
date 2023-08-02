<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Avviso extends Model
{
    use HasFactory;

    protected $fillable=['avviso','creato_il', 'creato_da', 'urgente'];

    public static function newAvviso($data)
    {
        self::create([
            'avviso'=>$data['avviso'],
            'creato_da'=>$data['creato_da'],
            'creato_il'=>date('Y-m-d'),
            'urgente'=>$data['urgente'],
        ]);
    }

    public static function getAvvisi()
    {
        return self::all();
    }

    public static function getHAstatus()
    {
        /*$response = Http::withHeaders([
            'Authorization'=>' Bearer '.env('HA_TOKEN'),
            'Content-Type'=>' application/json',
        ])->get('https://ha.lavorain.cloud/api/services',['domain']);
        return $response;
       // return dd($response);*/
    }

    public static function getAnsaNews()
    {
       /*$xmlstring = Http::get('https://www.ansa.it/trentino/notizie/trentino_rss.xml');
       $xml_file = simplexml_load_string($xmlstring);
       $json = json_encode($xml_file );
       $array = json_decode($json,TRUE);
       dd($array); // return $array;*/
       
      
    }
}
