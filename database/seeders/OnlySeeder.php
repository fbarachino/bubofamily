<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class OnlySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*        // Role Creation
        $role_admin = Role::create([
            'name' => 'admin'
        ]);
        $role_user = Role::create([
            'name' => 'user'
        ]);
        $role_guest = Role::create([
            'name' => 'guest'
        ]);

        // Permission Creation
        Permission::create([
            'name' => 'conti'
        ]);
        Permission::create([
            'name' => 'consumi'
        ]);
        Permission::create([
            'name' => 'automobili'
        ]);
        Permission::create([
            'name' => 'contatti'
        ]);
        Permission::create([
            'name' => 'affitti'
        ]);
        Permission::create([
            'name' => 'progetti'
        ]);
        Permission::create([
            'name' => 'amministrazione'
        ]);

        // Assegnazione permessi al ruolo user
        $role_user->givePermissionTo('affitti');
        $role_user->givePermissionTo('automobili');
        $role_user->givePermissionTo('contatti');
        $role_user->givePermissionTo('consumi');
        $role_user->givePermissionTo('conti');
        $role_user->givePermissionTo('progetti');
            // Assegnazione permessi al ruolo guest
        $role_guest->givePermissionTo('affitti');
*/        
        $admin = User::create([            
            'name'=>'Amministratore',
            'email'=>'admin@localhost.local',
            'password'=>Hash::make('Portalnet_2023'),
            ])->assignRole('admin');
        
        $user = User::create([
            'name'=>'Utente',
            'email'=>'user@localhost.local',
            'password'=>Hash::make('user2023'),
        ])->assignRole('user');
        
        $guest = User::create([
            'name'=>'Guest',
            'email'=>'guest@localhost.local',
            'password'=>Hash::make('password'),
        ])->assignRole('guest');
    }
}
