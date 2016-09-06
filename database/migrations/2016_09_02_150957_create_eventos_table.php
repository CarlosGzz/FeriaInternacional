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
            $table->increments('idEvento');
            $table->integer('idEdicion')->unsigned();;
            $table->string('titulo',200);
            $table->datetime('fechaInicio');
            $table->datetime('fechaFinal');
            $table->string('lugar',400);
            $table->string('descripcion',600);
            $table->integer('tema')->unsigned();
            $table->string('tipo',120);
            $table->string('encargado',200);
            $table->integer('estatus');
            $table->string('registroDeAsistencia',100);
            $table->string('audienciaInteresada',100);
            $table->string('comentarios',500);
            $table->integer('creador')->unsigned();
            $table->timestamps();
            // Foreign keyes
            $table->foreign('idEdicion')->references('idEdicion')->on('ediciones')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('tema')->references('idTema')->on('temas')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('creador')->references('idAdmin')->on('administradores')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropForeign('eventos_idedicion_foreign');
        });
        Schema::drop('eventos');
    }
}
