<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formatos', function (Blueprint $table) {
            $table->increments('id');
            $table->char('formato',30);
            $table->timestamps();
        });

        Schema::table('contenidos', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('formato_id')->references('id')->on('formatos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contenidos', function(Blueprint $table){
            // Foreign keyes
            $table->dropforeign('contenidos_formato_id_foreign');
        });
        Schema::drop('formatos');
    }
}
