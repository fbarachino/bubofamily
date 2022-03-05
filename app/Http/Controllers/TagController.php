<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public static function listTags(){
        $tags = DB::table('tags')->orderBy('tag_name')->get();
        return view('conti.tags.list',['tags'=>$tags]);
    }
    
    public static function insTags(Request $request)
    {
        DB::table('tags')->insert(['tag_name'=> $request['tag_name']]);
        $tags = DB::table('tags')->orderBy('tag_name')->get();
        return view('conti.tags.list',['tags'=>$tags]);
    }
    
    public function calendartest()
    {
        return view('components.calendar');
    }
    
    public function updateTag(Request $request)
    {
        $id=$request['id'];
        $tags=DB::table('tags')
        ->where('tags.id','=',$id)
        ->get();
        return view('conti.tags.update',
            [
                'tags'=> $tags,
            ]);
    }
    
    public function updatePostTag(Request $request)
    {
        DB::table('tags')
        ->where('id','=', $request['id'])
        ->update([
            'tag_name' => $request['tag_name'],
        ]);
        return redirect(route('tags'));
    }
    
    public function apiList()
    {
        $tags=DB::table('tags')->orderBy('tag_name')->get();
        return json_encode($tags);
    }
}
