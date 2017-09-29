<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Colegiaturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colegiaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('nit');
            $table->string('nombre', 120);
            $table->integer('numerodocumento');
            $table->integer('numerofactura');
            $table->float('monto', 8,2);
            $table->text('descripcion');
            $table->integer('mes_id')->unsigned();
            $table->integer('alumno_id')->unsigned();
            $table->foreign('mes_id')->references('id')->on('meses')->onDelete('cascade');
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
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
        Schema::drop('colegiaturas');
    }
}
