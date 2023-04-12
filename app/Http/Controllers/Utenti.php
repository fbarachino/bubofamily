<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Junges\ACL\Models\Group;
use Junges\ACL\Models\Permission;

class Utenti extends Controller
{
    //
    public function nuovoGruppo()
    {
        return view('vendor.junges.form_addGroup',['gruppi'=>Utenti::getGruppi()]);    
    }
    
    public function saveNuovoGruppo(Request $request)
    {
        $group=Group::create(['name' => $request['gruppo'],'description'=>$request['descrizione']]);
        return view('vendor.junges.form_addGroup',['gruppi'=>Utenti::getGruppi()]);
    }
    
    public function nuovoPermesso()
    {
        return view('vendor.junges.form_addPermission',['permessi'=>Utenti::getPermessi()]);
    }
    public function saveNuovoPermesso(Request $request)
    {
        $group=Permission::create(['name' => $request['permesso'],'description'=>$request['descrizione']]);
        return view('vendor.junges.form_addPermission',['permessi'=>Utenti::getPermessi()]);
    }
    
    public function getPermessi()
    {
        return DB::table('permissions')->orderBy('name')->get();
    }
    
    public function getGruppi()
    {
        return DB::table('groups')->orderBy('name')->get();
    }
    
    public function vw_assignToGroup()
    {
        return view('vendor.junges.assignPermissionToGroup',[
            'permessi'=>Utenti::getPermessi(),
            'gruppi'=>Utenti::getGruppi(),
        ]);
    }
    
    public function assignPermissionToGroup(Request $request)
    {
        $group=Group::findByName($request['gruppo']);
        $group->assignPermission($request['permesso']);
        return view('vendor.junges.assignPermissionToGroup',[
            'permessi'=>Utenti::getPermessi(),
            'gruppi'=>Utenti::getGruppi(),
        ]);
    }
}
