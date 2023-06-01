<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
                'name'=>'SystemUser',
                'email'=>'system@localhost.local',
                'password'=>Hash::make(Str::random(16)),
                'user_role'=>'user',
            ]
            );
        DB::table('users')->insert(
            [
                'name'=>'admin',
                'email'=>env('SYSADMIN_MAIL'),
                'password'=>Hash::make('admin'),
                'user_role'=>'admin',
            ]
            );
    }
}
