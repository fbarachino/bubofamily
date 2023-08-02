<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contratti;

class ContrattiController extends Controller
{
    //
    public function contratti()
    {
        return view('contratti.lista',['data'=>Contratti::getAllContratto()]);
    }

    public function newContratto(Request $request)
    {
        Contratti::storeContratto($request);
        return redirect()->back();
    }

}
