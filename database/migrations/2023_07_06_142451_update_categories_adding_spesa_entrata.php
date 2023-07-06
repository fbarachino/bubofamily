<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoriesAddingSpesaEntrata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('categories', function (Blueprint $table) {
     
            $table->smallInteger('cat_entrata')->after('cat_name')->default(0); 
            $table->smallInteger('cat_uscita')->after('cat_entrata')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('categories', function (Blueprint $table) {
        $table->dropColumn('cat_entrata');
        $table->dropColumn('cat_uscita');
        });
    }
}
