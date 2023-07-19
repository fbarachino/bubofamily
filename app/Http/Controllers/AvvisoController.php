<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avviso;

class AvvisoController extends Controller
{
    //
    public function saveAvviso(Request $request)
    {
        Avviso::newAvviso($request);
       return redirect()->back();
    }
}
