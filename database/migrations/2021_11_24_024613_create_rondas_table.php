<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRondasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rondas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_torneo');
            $table->date('fechaInicioRonda');
            $table->date('fecahFinRonda');
            $table->integer('NrondaTorneo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rondas');
    }
}
