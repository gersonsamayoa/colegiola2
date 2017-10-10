<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('alumno_curso', function (Blueprint $table){
        $table->increments('id');
        $table->float('bim1')->nullable();
        $table->float('bim2')->nullable();
        $table->float('bim3')->nullable();
        $table->float('bim4')->nullable();
        $table->float('promedio')->nullable();
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
        Schema::drop('alumno_curso');
    }
}
