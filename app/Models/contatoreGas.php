<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class contatoreGas extends Model
{
    use HasFactory;
    
    public static function getList()
    {
        return DB::table('contatore_gases')->orderBy('gas_date','asc')->get();
    }
    
    public static function inserisci($data) {
        DB::table('contatore_gases')->insert([
            'gas_date'=> $data['gas_date'],
            'gas_lettura'=> $data['gas_lettura'],
        ]);
    }
}
