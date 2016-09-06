<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->increments('idModulo');
            $table->integer('idEdicion')->unsigned();
            $table->integer('creador')->unsigned();
            $table->timestamps();
            // Foreign keyes
            $table->foreign('idEdicion')->references('idEdicion')->on('ediciones')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modulos', function(Blueprint $table){
            $table->dropForeign('modulos_idedicion_foreign');
        });
        Schema::drop('modulos');
    }
}
