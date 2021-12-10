<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_torneos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participante_id');
            $table->foreign('participante_id','participante_fk')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('torneo_id');
            $table->foreign('torneo_id')
                ->references('id')
                ->on('torneos')
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
        Schema::table('registro_torneos', function (Blueprint $table){

        });
        Schema::dropIfExists('registro_torneos');
    }
}
