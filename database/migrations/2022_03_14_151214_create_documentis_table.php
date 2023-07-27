<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('movimenti_id');
            $table->string('descrizione');
            $table->string('filename');
        });

        /*
        ISSUE #5 GITEA - proposta modifica
        Schema::create('documentis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('entita');
            $table->bigInteger('entita_id');
            $table->string('descrizione');
            $table->string('filename');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentis');
    }
}
