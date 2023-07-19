<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subtask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('subtasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
           // $table->bigInteger('tasks_id');
            $table->foreignId('tasks_id')->onDelete('cascade');
            $table->string('titolo',255);
            $table->longText('descrizione')->nullable();
            $table->bigInteger('creato_da');
            $table->bigInteger('assegnato_a');
            $table->date('creato_il');
            $table->date('termine_il');
            $table->date('chiuso_il');
            $table->enum('stato', ['Aperto', 'Chiuso'])->nullable()->default('Aperto');
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
    }
}
