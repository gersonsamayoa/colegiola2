<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ColegiaturaMes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('colegiatura_mes', function(Blueprint $table){
      $table->increments('id');
      $table->integer('colegiatura_id')->unsigned();
      $table->integer('mes_id')->unsigned();

      $table->foreign('colegiatura_id')->references('id')->on('colegiaturas')->onDelete('cascade');
      $table->foreign('mes_id')->references('id')->on('meses')->onDelete('cascade');

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
        Schema::drop('colegiatura_mes');
    }
}
