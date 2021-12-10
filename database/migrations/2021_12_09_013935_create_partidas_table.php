<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jugador1');
            $table->foreign('jugador1', 'jugador1_fk')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('jugador2');
            $table->foreign('jugador2', 'jugador2_fk')
                ->references('id')
                ->on('users')
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
        Schema::table('partidas', function (Blueprint $table){
            $table->dropForeign('jugador1_fk');
            $table->dropForeign('jugador2_fk');

            $table->dropColumn('jugador1');
            $table->dropColumn('jugador2');
        });

        Schema::dropIfExists('partidas');
    }
}
