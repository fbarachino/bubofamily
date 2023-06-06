<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Junges\ACL\Models\Group;
// use Junges\ACL\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class Utenti extends Controller
{
    
    public function createRole($ruolo)
    {
        $role=Role::create(['name'=>$ruolo]);
        return json_encode(Role::all()->pluck('name'));
    }

    function createPermission($permesso){
        $permission=Permission::create(['name'=>$permesso]);
        return json_encode(Permission::all()->pluck('name'));
    }
    
    function userClass() {
        $user=new User();
        return get_class_methods($user);
    }
    
    // post del create user
    function createUser(Request $params){
        User::addUser($params);
        return redirect('/admin/users/new');
    }
    
    // mostra il form della creazione dell'utente
    function addUser(){
        $roles = Role::all();
        $users = User::all();
        return view('users.create',['ruoli'=>$roles,'users'=>$users]);
    }
    
    function listUser(){
        $users = User::all();
        return view('users.list',['users'=>$users]);       
    }
    
    function listRoles(){
        $roles = Role::all();
        return $roles;
    }
    

        
    
}
