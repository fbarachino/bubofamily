<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgettisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progettis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',255);
            $table->longText('descrizione');
            $table->date('data_creazione');
            $table->date('data_inizio')->nullable();
            $table->date('data_fine')->nullable();
            $table->foreignId('fk_user')->constrained('users');
            $table->decimal('budget',10,2)->nullable();
            $table->enum('stato', ['aperto','bloccato','chiuso']);
            $table->longtext('note')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progettis');
    }
}
