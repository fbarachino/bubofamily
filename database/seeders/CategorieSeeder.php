<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserisce le categorie necessarie
        DB::table('categories')->insert(
            ['cat_name'=>'Automobili']
            );
    }
}
