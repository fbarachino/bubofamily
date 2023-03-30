<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManutenzionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutenziones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('descrizione');
            $table->unsignedBigInteger('fk_operazione_id');
            $table->foreign('fk_operazione_id')->references('id')->on('operaziones')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manutenziones');
    }
}
