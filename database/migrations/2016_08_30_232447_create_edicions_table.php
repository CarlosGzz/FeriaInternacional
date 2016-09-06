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
            $table->increments('idEdicion');
            $table->string('pais', 120);
            $table->date('fechaInicio');
            $table->date('fechaFinal');
            $table->string('logo', 500);
            $table->integer('creador')->unsigned();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ediciones');
    }
}
