<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nombreJuego');

            $table->date('fechaInicio');
            $table->date('fecahFin');
            $table->string('estado');
            $table->integer('puntuacionVictoria');
            $table->integer('puntuacionDerrota');
            $table->integer('puntuacionEmpate');
            // id del creador
            $table->unsignedBigInteger('creador_id');
            $table->foreign('creador_id','creador_fk')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');


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
        Schema::table('torneos', function (Blueprint $table){
           $table->dropForeign('creador_fk');
           $table->dropColumn('creador_id');
        });
        Schema::dropIfExists('torneos');
    }
}
