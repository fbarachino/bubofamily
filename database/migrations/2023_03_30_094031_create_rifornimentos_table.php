<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRifornimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rifornimentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->double('eurolitro',10,2);
            $table->double('litri',10,2);
            $table->string('distributore',255);
            $table->unsignedBigInteger('fk_operazione');
            $table->foreign('fk_operazione')->references('id')->on('operaziones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rifornimentos');
    }
}
