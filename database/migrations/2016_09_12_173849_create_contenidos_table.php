<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modulo_id')->unsigned();
            $table->integer('formato_id')->unsigned();
            $table->string('contenido',1000);
            $table->integer('secuencia');
            $table->timestamps();
            // Constraints
            $table->unique(array('modulo_id','id','secuencia'));
            // Foreign Keyes
            $table->foreign('modulo_id')->references('id')->on('modulos')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contenidos');
    }
}
