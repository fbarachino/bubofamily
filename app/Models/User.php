<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
<<<<<<< HEAD
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\Access\Authorizable;

=======
 //use LdapRecord\Laravel\Auth\Authenticatable;

use Junges\ACL\Concerns\HasGroups;
>>>>>>> 3ebca7bb4a04430aecf781bee6ba7b1a1ec56a41


class User extends Authenticatable
{
<<<<<<< HEAD
    use HasApiTokens, HasFactory, Notifiable, HasRoles,Authorizable;
=======
    use HasApiTokens, HasFactory, Notifiable, HasGroups, SoftDeletes;
>>>>>>> 3ebca7bb4a04430aecf781bee6ba7b1a1ec56a41

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
<<<<<<< HEAD
    
    // Aggiunge un utente e assegna un ruolo
    public static function addUser($params)
    {
        self::create([
           'name'=>$params['name'],
           'email'=>$params['email'],
           'password'=>Hash::make($params['password']),
        ])->assignRole($params['role']);
        
    }
    
    
=======


>>>>>>> 3ebca7bb4a04430aecf781bee6ba7b1a1ec56a41


}
