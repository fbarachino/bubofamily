<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Auto extends Model
{
    use HasFactory;
    
    public static function  getAutoById($id)
    {
        return $dettagli=DB::table('autos')->find($id);
    }
    
    public static function getAutoList()
    {
        return $lista=DB::table('autos')->select(['targa','marca','modello','id'])->get();
    }
    
    public static function saveAuto($request)
    {
        DB::table('autos')->insert([
            'targa'=>$request['targa'],
            'marca'=>$request['marca'],
            'modello'=>$request['modello'],
            'cilindrata'=>$request['cilindrata'],
            'cvfiscali'=>$request['cvfiscali'],
            'alimentazione'=>$request['alimentazione'],
            'ntelaio'=>$request['ntelaio'],
            'nmotore'=>$request['nmotore'],
            'data_acquisto'=>$request['data_acquisto'],
            'note'=>$request['note'],
        ]);
    }
    
    public static function delAuto($id)
    {
        DB::table('autos')->delete($id['id']);
    }
}
