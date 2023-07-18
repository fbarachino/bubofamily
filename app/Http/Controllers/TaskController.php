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

    public function newTask(Request $data)
    {
        Task::create([
            'titolo'=>$data['titolo'],
            'descrizione'=>$data['descrizione'],
            'assegnato_a'=>$data['assegnato_a'],
            'creato_da'=>$data['creato_da'],
            'termine_il'=>$data['termine_il'],
            'creato_il'=>$data['creato_il'],
            'chiuso_il'=>$data['chiuso_il'],
            'stato'=>$data['stato'],
        ]);
        return redirect()->back();
    }


    
}
