<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function listTask()
    {
        return Task::all();
        // debug
        // return get_class_methods($this);
    }

    public function Task()
    {
        return view('tasks.list',['tasks'=>$this->listTask()]);
    }

    public function newTask()
    {

    }


    
}
