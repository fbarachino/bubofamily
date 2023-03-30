<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Revisione extends Model
{
    use HasFactory;
    
    public static function saveRevisione($id,$data)
    {
        DB::table('revisiones')->insert([
            'fk_operazione_id'=>$id,
            'descrizione'=>$data['descrizione'],
            'centrorevisione'=>$data['centrorevisione'],
            'superata'=>$data['superata'],
            'dataproxrevisione'=>$data['dataproxrevisione'],
        ]);
    }
}
