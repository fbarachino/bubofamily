<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable=['titolo','descrizione','creato_da','assegnato_a','creato_il','termine_il','chiuso_il','stato'];

    public function getAllTasks()
    {
        return self::all();
    }

    // 
    public static function getTaskAssignedToUser($userid)
    {
        return self::where('assegnato_a',$userid)->get();
    }

    // 
    public static function getTaskAssignedByUser($userid)
    {
        return self::where('creato_da',$userid)->get();
    }

    public static function saveTask($collection)
    {
        self::create(
            [
                'titolo' => $collection['titolo'],
                'descrizione'=>$collection['descrizione'],
                'creato_da'=>$collection['creato_da'],
                'assegnato_a'=>$collection['assegnato_a'],
                'creato_il'=>date('Y-m-d'),
                'termine_il'=>$collection['termine_il'],
                'stato'=>'Aperto',
            ]
            );
    }

}
