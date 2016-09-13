<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('contrasena');
            $table->enum('tipo', array('administrador', 'organizador', 'editor'));
            $table->integer('administrador_id')->nullable();
            $table->integer('edicion_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('ediciones', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('administrador_id')->references('id')->on('administradores');
        });

        Schema::table('eventos', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('administrador_id')->references('id')->on('administradores');
        });

        Schema::table('modulos', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('administrador_id')->references('id')->on('administradores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ediciones', function(Blueprint $table){
            $table->dropForeign('ediciones_administrador_id_foreign');
        });
        Schema::table('eventos', function(Blueprint $table){
            $table->dropForeign('eventos_administrador_id_foreign');
        });
        Schema::table('modulos', function(Blueprint $table){
            $table->dropForeign('modulos_administrador_id_foreign');
        });
        Schema::drop('administradores');
    }
}
