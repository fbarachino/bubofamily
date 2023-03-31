<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class contatoreEnEl extends Model
{
    use HasFactory;
    
    public static function inserisci($data) {
        DB::table('contatore_en_els')->insert([
            'enel_date'=> $data['enel_date'],
            'enel_A'=> $data['enel_A'],
            'enel_R'=> $data['enel_R'],
            'enel_F1'=> $data['enel_F1'],
            'enel_F2'=> $data['enel_F2'],
            'enel_F3'=> $data['enel_F3'],
        ]);
    }
    
    public static function getList() {
        return DB::table('contatore_en_els')->orderBy('enel_date','desc')->get();
    }
}
