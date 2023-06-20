<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColumnsAnagrafica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('anagraficas', function (Blueprint $table) {
         /*   //
	//		$table->longText('ang_indirizzo');
		$table->string('ang_CAP');
		$table->string('ang_Citta');  
		$table->string('ang_Provincia'); 
		$table->string('ang_telefono');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anagraficas', function (Blueprint $table) {
            //
        });
    }
}
