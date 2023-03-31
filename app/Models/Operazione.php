<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Auto;
use App\Models\Categorie;

class Operazione extends Model
{
    use HasFactory;
    
    // Operazione effettuata sull'auto
    
    public static function saveOperazione($data)
    {
        // inserisce nel database e ritorna l'id
        $id=DB::table('operaziones')->insertGetId(
            [
                'fk_auto_id'=>$data['auto'],
                'data'=>$data['data'],
                'km'=>$data['km'],
                'importo'=>$data['importo'],
                'type'=>$data['type']
            ]
            );
        if (isset($data['inMovimenti']))
        {
            
            $automobile=Auto::getAutoById($data['auto']);
            $auto=' '.$automobile->marca.' '.$automobile->modello.' '.$automobile->targa;
            $categoria=Categorie::getIdCategoriaByName('Automobili');
            $causale="Automobili: ".strtoUpper($data['type']).' ';
            
            if(isset($data['descrizione']))
            {
                $causale.=$data['descrizione'].$auto;
            }
            if(isset($data['centrorevisione']))
            {
                $causale.= $data['centrorevisione'].$auto;
            }
            if(isset($data['litri']))
            {
                $causale.=$auto.' litri:'.$data['litri'].' Euro/litro:'.$data['eurolitro'];
            }
            
            DB::table('movimentis')->insert([
                'mov_data'=>$data['data'],
                'mov_descrizione'=>$causale,
                'mov_importo'=>'-'.$data['importo'],
                'mov_fk_categoria'=> 1,
                'mov_inserito_da'=>1,
                'mov_fk_tags'=>1,
                
            ]);
        }
        return $id;
    }
    
    public static function getOperazioni($autoId)
    {
        // Ritorna la lista delle operazioni effettuate sull'auto
        
    }
}
