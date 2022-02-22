<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnagraficasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anagraficas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ang_cognome');
            $table->string('ang_nome');

            $table->string('ang_ragioneSociale')->nullable();
            $table->string('ang_codiceFiscale')->nullable();
            $table->string('ang_partitaIva')->nullable();
            
            $table->longText('ang_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anagraficas');
    }
}
