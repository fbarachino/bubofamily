<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatoreEnElsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatore_en_els', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('enel_date');
            $table->integer('enel_A');
            $table->integer('enel_R');
            $table->integer('enel_F1');
            $table->integer('enel_F2');
            $table->integer('enel_F3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contatore_en_els');
    }
}
