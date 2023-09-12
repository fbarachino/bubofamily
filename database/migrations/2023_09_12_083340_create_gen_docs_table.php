<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gen_docs', function (Blueprint $table) {
            // Documenti generali definibili agganciabili a diverse entità
            $table->id();
            $table->timestamps();
            $table->integer('entity')->unsigned();
            $table->bigInteger('entity_id');
            $table->string('filename', 255);
            $table->longText('descrizone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gen_docs');
    }
}
