<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Calificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('calificaciones', function (Blueprint $table){
        $table->increments('id');
        $table->float('Bim1', 4,2);
        $table->float('Bim2', 4,2);
        $table->float('Bim3', 4,2);
        $table->float('Bim4', 4,2);
        $table->integer('alumno_id')->unsigned();
        $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
        $table->integer('curso_id')->unsigned();
        $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
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
              Schema::drop('calificaciones');
    }
}
