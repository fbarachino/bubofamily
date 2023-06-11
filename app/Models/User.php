<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\Access\Authorizable;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles,Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guard_name = 'web';

    public function getLdapDomainColumn()
    {
    	return 'domain';
    }

    public function getLdapGuidColumn()
    {
    	return 'guid';
    }

    public static function addGroup($gruppo)
    {
        $user= new User();
        $user->assignGroup($gruppo);
    }

    public static function getUserById($id)
    {
        return DB::table('users')->where('id','=',$id)->get();
    }

    public static function getUsers()
    {
        return DB::table('users')->orderBy('name')->get();
    }

    // Aggiunge un utente e assegna un ruolo
    public static function addUser($params)
    {
        self::create([
           'name'=>$params['name'],
           'email'=>$params['email'],
           'password'=>Hash::make($params['password']),
        ])->assignRole($params['role']);

    }




}
