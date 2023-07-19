<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvvisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avvisos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longtext('avviso');
            $table->date('creato_il')->nullable()->default(date('Y-m-d'));
            $table->bigInteger('creato_da');
            $table->boolean('urgente')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avvisos');
    }
}
