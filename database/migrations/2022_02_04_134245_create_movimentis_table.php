<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('mov_data');
            $table->unsignedBigInteger('mov_fk_categoria');
            $table->foreign('mov_fk_categoria')->references('id')->on('categories');
            $table->longText('mov_descrizione');
            $table->decimal('mov_importo',8,2);
            $table->unsignedBigInteger('mov_inserito_da');
            $table->foreign('mov_inserito_da')->references('id')->on('users');
            $table->unsignedBigInteger('mov_fk_tags');
            $table->foreign('mov_fk_tags')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentis');
    }
}
