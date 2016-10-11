<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ediciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pais', 120);
            $table->date('fechaInicio');
            $table->date('fechaFinal');
            $table->string('logo', 500);
            $table->enum('estatus', array('activo', 'inactivo'));
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('ediciones', function(Blueprint $table){
            // Foreign keyes
            $table->foreign('user_id')->references('id')->on('users');
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
            $table->dropForeign('ediciones_user_id_foreign');
        });

        Schema::drop('ediciones');
    }
}
