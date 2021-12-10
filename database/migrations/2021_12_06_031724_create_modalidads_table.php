<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidads', function (Blueprint $table) {
            $table->id();
            $table->string('smodalidad');
            $table->timestamps();
        });

        Schema::table('torneos', function (Blueprint $table){
            $table->unsignedBigInteger('modalidad');
            $table->foreign('modalidad','modalidad_fk')->references('id')->on('modalidads')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
            $table->dropForeign('modalidad_fk');
            $table->dropColumn('modalidad');
        });

        Schema::dropIfExists('modalidads');
    }
}
