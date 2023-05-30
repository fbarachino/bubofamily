<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tag extends Model
{
    use HasFactory;

    public static function getList() {
        return DB::table('tags')->orderBy('tag_name')->get();
    }

    public static function inserisci($param) {
        DB::table('tags')->insert(['tag_name'=> $param['tag_name']]);
    }

    public static function getById($param) {
        return DB::table('tags')
        ->where('tags.id','=',$param)
        ->get();

    }

    public static function updateById($param) {
        DB::table('tags')
        ->where('id','=', $param['id'])
        ->update([
            'tag_name' => $param['tag_name'],
        ]);

    }

    public static function delete($id)
    {
        DB::table('tags')
        ->where('id','=',$id)
        ->delete();
    }
}
