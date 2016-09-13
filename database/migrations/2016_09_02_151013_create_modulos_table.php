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
            $table->increments('id');
            $table->integer('edicion_id')->unsigned();
            $table->string('titulo',200);
            $table->integer('administrador_id')->unsigned();
            $table->integer('tema_id')->unsigned();
            $table->string('tipo',120);
            $table->timestamps();
            // Foreign keyes
            $table->foreign('edicion_id')->references('id')->on('ediciones')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropForeign('modulos_edicion_id_foreign');
        });
        Schema::drop('modulos');
    }
}
