<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tags')->insert(
            ['tag_name'=>'System']
            );
        DB::table('tags')->insert(
            ['tag_name'=>'da verificare']
            );
    }
}
