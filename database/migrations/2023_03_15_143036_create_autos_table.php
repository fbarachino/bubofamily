<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('targa',10);
            $table->string('marca',10);
            $table->string('modello',10);
            $table->string('cilindrata',10);
            $table->string('alimentazione',10);
            $table->string('cvfiscali',10);
            $table->string('ntelaio',30);
            $table->string('nmotore',30)->nullable();
            $table->date('data_acquisto');
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autos');
    }
}
