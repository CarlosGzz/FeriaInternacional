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
            $table->increments('idAdmin');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('contrasena');
            $table->enum('tipo', array('administrador', 'organizador', 'editor'));
            $table->integer('creador')->nullable();
            $table->integer('edicion')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('ediciones', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('creador')->references('idAdmin')->on('administradores');
        });

        Schema::table('eventos', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('creador')->references('idAdmin')->on('administradores');
        });

        Schema::table('modulos', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('creador')->references('idAdmin')->on('administradores');
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
            $table->dropForeign('ediciones_creador_foreign');
        });
        Schema::table('eventos', function(Blueprint $table){
            $table->dropForeign('eventos_creador_foreign');
        });
        Schema::table('modulos', function(Blueprint $table){
            $table->dropForeign('modulos_creador_foreign');
        });
        Schema::drop('administradores');
    }
}
