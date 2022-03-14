<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondominiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('dal');
            $table->date('al');
            $table->foreignId('pertinenza_id');
            $table->decimal('generali',10,2);
            $table->decimal('generali_civico',10,2);
            $table->decimal('risc_consumo',10,2);
            $table->decimal('risc_millesimi',10,2);
            $table->decimal('acqua_calda_consumo',10,2);
            $table->decimal('acqua_fredda_consumo',10,2);
            $table->decimal('ripart_spese',10,2);
            $table->decimal('ascensore',10,2);
            $table->decimal('scala',10,2);
            $table->decimal('autorimessa',10,2);
            $table->decimal('gest_inquilini',10,2);
            $table->decimal('parcheggi_isola',10,2);
            $table->decimal('percorsi_ped',10,2);
            $table->decimal('cancello_viale',10,2);
            $table->decimal('zone_comuni_gen',10,2);
            $table->decimal('mov_personali',10,2);
            $table->decimal('tot_gestione',10,2);
            $table->decimal('saldi_fine_es_prec',10,2);
            $table->decimal('rate_versate',10,2);
            $table->decimal('saldo_finale',10,2);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condominios');
    }
}
