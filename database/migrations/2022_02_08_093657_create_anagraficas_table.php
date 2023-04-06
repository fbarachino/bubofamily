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

            $table->string('ang_ragioneSociale',255)->nullable();
            $table->string('ang_codiceFiscale',255)->nullable();
            $table->string('ang_partitaIva',255)->nullable();
            
            $table->longText('ang_indirizzo')->nullable();
            $table->string('ang_CAP',10)->nullable();
            $table->string('ang_Citta',255)->nullable();
            $table->string('ang_Provincia',255)->nullable();
            
            //ALTER TABLE `bubofamily_db`.`anagraficas`
            //ADD COLUMN `ang_telefono` VARCHAR(45) NOT NULL AFTER `ang_note`;
            
            $table->string('ang_telefono',45);
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
