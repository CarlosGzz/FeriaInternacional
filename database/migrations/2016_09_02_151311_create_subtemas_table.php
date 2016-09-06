<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtemas', function (Blueprint $table) {
            $table->increments('idSubtema');
            $table->integer('idTema')->unsigned();
            $table->string('nombre',250);
            $table->string('descripcion',250);
            $table->timestamps();
            // Foreign keyes
            $table->foreign('idTema')->references('idTema')->on('temas')->onDelete('cascade')->onUpdate('cascade');
        });

        // Pivot table for evento a subtema
        Schema::create('evento_subtema', function(Blueprint $table){
            $table->increments('id');
            $table->integer('idEvento')->unsigned();
            $table->integer('idSubtema')->unsigned();
            $table->timestamps();
            $table->unique(array('idEvento','idSubtema'));
            // Foreign keyes
            $table->foreign('idEvento')->references('idEvento')->on('eventos')->onUpdate('cascade');
            $table->foreign('idSubtema')->references('idSubtema')->on('subtemas')->onUpdate('cascade');
        });
        // Pivot table for modulo a subtema
        Schema::create('modulo_subtema', function(Blueprint $table){
            $table->increments('id');
            $table->integer('idModulo')->unsigned();
            $table->integer('idSubtema')->unsigned();
            $table->timestamps();
            $table->unique(array('idModulo','idSubtema'));
            // Foreign keyes
            $table->foreign('idModulo')->references('idModulo')->on('modulos')->onUpdate('cascade');
            $table->foreign('idSubtema')->references('idSubtema')->on('subtemas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evento_subtema');
        Schema::drop('modulo_subtema');
        Schema::drop('subtemas');
    }
}
