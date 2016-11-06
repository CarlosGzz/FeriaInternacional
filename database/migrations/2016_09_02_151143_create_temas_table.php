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
            $table->increments('id');
            $table->string('nombre',250);
            $table->timestamps();
        });

        Schema::create('edicion_tema', function(Blueprint $table){
            $table->increments('id');
            $table->integer('edicion_id')->unsigned();
            $table->integer('tema_id')->unsigned();
            $table->timestamps();
            $table->unique(array('edicion_id','tema_id'));

            // Foreign keyes
            $table->foreign('edicion_id')->references('id')->on('ediciones')->onUpdate('cascade');
            $table->foreign('tema_id')->references('id')->on('temas')->onUpdate('cascade');
        });
        Schema::table('eventos', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('tema_id')->references('id')->on('temas')->onUpdate('cascade');
        });
        Schema::table('modulos', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('tema_id')->references('id')->on('temas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('edicion_tema', function(Blueprint $table){
            $table->dropForeign('edicion_tema_edicion_id_foreign');
            $table->dropForeign('edicion_tema_tema_id_foreign');
        });
        Schema::table('eventos', function(Blueprint $table){
            $table->dropForeign('eventos_tema_id_foreign');
        });
        Schema::table('modulos', function(Blueprint $table){
            $table->dropForeign('modulos_tema_id_foreign');
        });
        Schema::drop('edicion_tema');
        Schema::drop('temas');
    }
}
