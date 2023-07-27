<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContrattisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrattis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('numero', 100)->nullable()->default('N/D');
            $table->string('nome', 100)->nullable();
            $table->date('datainizio')->nullable()->default(new DateTime());
            $table->date('datatermine')->nullable()->default(new DateTime());
            $table->string('fornitore', 100)->default('text');
            $table->string('tipo', 100)->default('utenze');
            $table->decimal('importo', 5, 2)->nullable()->default(123.45);
            $table->date('scadenzapagamento')->nullable()->default(new DateTime());
            $table->string('stato', 100)->default('attivo');
            $table->longText('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrattis');
    }
}
