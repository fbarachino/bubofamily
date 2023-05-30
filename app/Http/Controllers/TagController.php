<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public static function listTags(){
        $tags = tag::getList();
        return view('conti.tags.list',['tags'=>$tags]);
    }

    public static function insTags(Request $request)
    {
        tag::inserisci($request);
        $tags = tag::getList();
        return view('conti.tags.list',['tags'=>$tags]);
    }

    public function calendartest()
    {
        return view('components.calendar');
    }

    public function updateTag($id)
    {
        $tags=tag::getById($id);
        return json_encode($tags);
    }

    public function updatePostTag(Request $request)
    {
        tag::updateById($request);
        return redirect(route('tags'));
    }

    public function apiList()
    {
        $tags=tag::getList();
        return json_encode($tags);
    }

    public function deleteTag($id){
        tag::delete($id);
        return redirect(route('tags'));
    }
}
