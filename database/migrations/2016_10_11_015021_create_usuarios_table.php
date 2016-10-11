<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('contraseña');
            $table->string('carrera');
            $table->string('semestre');
            $table->string('puntos');
            $table->timestamps();
        });

        // Pivot table for usuario a tema
        Schema::create('usuario_tema', function(Blueprint $table){
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('tema_id')->unsigned();
            $table->timestamps();
            $table->unique(array('usuario_id','tema_id'));
            // Foreign keyes
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreign('tema_id')->references('id')->on('temas')->onUpdate('cascade');
        });

        // Pivot table for usuario a evento
        Schema::create('usuario_evento', function(Blueprint $table){
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('evento_id')->unsigned();
            $table->timestamps();
            $table->unique(array('usuario_id','evento_id'));
            // Foreign keyes
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')->onUpdate('cascade');
        });

        // Pivot table for usuario a evento
        Schema::create('usuario_modulo', function(Blueprint $table){
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('modulo_id')->unsigned();
            $table->timestamps();
            $table->unique(array('usuario_id','modulo_id'));
            // Foreign keyes
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreign('modulo_id')->references('id')->on('modulos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuario_tema');
        Schema::drop('usuario_evento');
        Schema::drop('usuario_modulo');
        Schema::drop('usuarios');
    }
}
