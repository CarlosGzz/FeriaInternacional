<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('edicion_id')->unsigned();;
            $table->string('titulo',200);
            $table->datetime('fechaInicio');
            $table->datetime('fechaFinal');
            $table->string('lugar',400);
            $table->string('descripcion',600);
            $table->integer('tema_id')->unsigned();
            $table->string('tipo',120);
            $table->string('encargado',200);
            $table->integer('estatus');
            $table->string('registroDeAsistencia',100);
            $table->string('audienciaInteresada',100);
            $table->string('comentarios',500);
            $table->integer('administrador_id')->unsigned();
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
        Schema::table('eventos', function(Blueprint $table){
            $table->dropForeign('eventos_edicion_id_foreign');
        });
        Schema::drop('eventos');
    }
}
