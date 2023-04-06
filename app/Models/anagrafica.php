<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class anagrafica extends Model
{
    use HasFactory;
    
    public static function inserisci($param) {
        DB::table('anagraficas')->insert([
            'ang_cognome'=>$param['ang_cognome'],
            'ang_nome'=>$param['ang_nome'],
            'ang_ragioneSociale'=>$param['ang_ragioneSociale'],
            'ang_codiceFiscale'=>$param['ang_codiceFiscale'],
            'ang_partitaIva'=>$param['ang_partitaIva'],
            'ang_indirizzo'=>$param['ang_indirizzo'],
            'ang_CAP'=>$param['ang_CAP'],
            'ang_Citta'=>$param['ang_Citta'],
            'ang_Provincia'=>$param['ang_Provincia'],
            'ang_telefono'=>$param['ang_telefono'],
            'ang_note'=>$param['ang_note'],
        ]);
    }
    
    public static function getList() {
        $lista = DB::table('anagraficas')->OrderBy('ang_cognome')->get();
        return $lista;
    }
    
    public static function getById($param) {
        
        return DB::table('anagraficas')->where('id','=',$param)->get();
    }
}
