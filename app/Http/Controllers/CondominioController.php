<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class CondominioController extends Controller
{
   public function testPdf(){
       $data=DB::table('categories')->get();
       $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Helvetica'])->loadView('conti.categorie.list', ['categorie' => $data->toArray()]);
        //return $pdf->download('invoice.pdf');
        /*$pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');*/
        return $pdf->stream();
    }

    public function err403()
    {
        abort(403);
    }


}
