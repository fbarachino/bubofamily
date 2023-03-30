<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorie extends Model
{
    use HasFactory;
    
    public static function getIdCategoriaByName($name)
    {
        return DB::table('categories')->where('cat_name',$name)->get('id');
    }
}
