<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRigaProgettosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riga_progettos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data');
            $table->longText('descrizione');
            $table->decimal('prezzo',10,2)->nullable();
            $table->decimal('ore',10,2)->nullable();
            $table->unsignedBigInteger('fk_id_progetto');
            $table->foreign('fk_id_progetto')->references('id')->on('progettis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riga_progettos');
    }
}
