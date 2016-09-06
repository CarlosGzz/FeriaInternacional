<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->increments('idTema');
            $table->string('nombre',250);
            $table->string('descripcion',250);
            $table->timestamps();
        });

        Schema::create('edicion_tema', function(Blueprint $table){
            $table->increments('id');
            $table->integer('idEdicion')->unsigned();
            $table->integer('idTema')->unsigned();
            $table->timestamps();
            $table->unique(array('idEdicion','idTema'));

            // Foreign keyes
            $table->foreign('idEdicion')->references('idEdicion')->on('ediciones')->onUpdate('cascade');
            $table->foreign('idTema')->references('idTema')->on('temas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('edicion_tema');
        Schema::drop('temas');
    }
}
