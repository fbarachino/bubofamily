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

    function deleteUser($id) {
        User::destroy($id);

        return redirect('/admin/users/new');
    }

    function givePermissionToUser()
    {
        $users=User::all();
        $permissions=Permission::all();
        return view('users.assignperm',['users'=>$users,'permissions'=>$permissions]);
    }

    function assignPermission(Request $request)
    {
       //$user=User::getUserbyId($request['user']);
       $user=User::findOrFail($request['user']);
       foreach($request['permesso'] as $key => $value){
            if($value=='true')
            {
               $key=str_replace('\'','',$key);
                $user->givePermissionTo($key);
                // $permission['allowed'][]=$key;
            }
            else
            {
                $key=str_replace('\'','',$key);
                $user->revokePermissionTo($key);
                // $permission['denied'][]=$key;
            }

        }
        return redirect('/admin/users/givepermission');

        //return dd($user);
    }
}
