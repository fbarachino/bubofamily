<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratti extends Model
{
    use HasFactory;
    protected $fillable=['numero','nome','datainizio','datatermine','fornitore','tipo','importo','scadenzapagamento','stato','note','filename'];
    public static function storeContratto($req){
         $filename=$req->file('filename')->store('Contratti');
         
            self::create([
                'numero'=>$req['numero'],
                'nome'=>$req['nome'],
                'datainizio'=>$req['datainizio'],
                'datatermine'=>$req['datatermine'],
                'fornitore'=>$req['fornitore'],
                'tipo'=>$req['tipo'],
                'importo'=>$req['importo'],
                'scadenzapagamento'=>$req['scadenzapagamento'],
                'stato'=>$req['stato'],
                'note'=>$req['note'],
                'filename'=>$filename
            ]);
            
    }

    public static function getAllContratto(){
        return self::all();
    }
   
}
