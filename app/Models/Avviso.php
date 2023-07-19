<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
