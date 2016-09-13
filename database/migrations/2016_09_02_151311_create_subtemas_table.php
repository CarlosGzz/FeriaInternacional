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
            $table->increments('id');
            $table->integer('tema_id')->unsigned();
            $table->string('nombre',250);
            $table->string('descripcion',250);
            $table->timestamps();
            // Foreign keyes
            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('cascade')->onUpdate('cascade');
        });

        // Pivot table for evento a subtema
        Schema::create('evento_subtema', function(Blueprint $table){
            $table->increments('id');
            $table->integer('evento_id')->unsigned();
            $table->integer('subtema_id')->unsigned();
            $table->timestamps();
            $table->unique(array('evento_id','subtema_id'));
            // Foreign keyes
            $table->foreign('evento_id')->references('id')->on('eventos')->onUpdate('cascade');
            $table->foreign('subtema_id')->references('id')->on('subtemas')->onUpdate('cascade');
        });
        // Pivot table for modulo a subtema
        Schema::create('modulo_subtema', function(Blueprint $table){
            $table->increments('id');
            $table->integer('modulo_id')->unsigned();
            $table->integer('subtema_id')->unsigned();
            $table->timestamps();
            $table->unique(array('modulo_id','subtema_id'));
            // Foreign keyes
            $table->foreign('modulo_id')->references('id')->on('modulos')->onUpdate('cascade');
            $table->foreign('subtema_id')->references('id')->on('subtemas')->onUpdate('cascade');
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
