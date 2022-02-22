<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContattosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contattos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('cnt_fk_anagraficaId');
            $table->foreign('cnt_fk_anagraficaId')->references('id')->on('anagraficas');
            $table->integer('cnt_tipo');
            $table->longText('cnt_valore');
            $table->longText('cnt_note');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contattos');
    }
}
