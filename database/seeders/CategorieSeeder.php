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
            [
                'cat_name'=>'Automobili',
                'cat_uscita'=>1,
                'cat_entrata'=>0,
                ]
            );
        DB::table('categories')->insert(
            [
                'cat_name'=>'Stipendio',
                'cat_uscita'=>0,
                'cat_entrata'=>1]
            );
        DB::table('categories')->insert(
            [
                'cat_name'=>'Utenze',
                'cat_uscita'=>1,
                'cat_entrata'=>0]
            );
    }
}
