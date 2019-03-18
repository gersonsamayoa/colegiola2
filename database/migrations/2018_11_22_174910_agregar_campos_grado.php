<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarCamposGrado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grados', function (Blueprint $table){
            $table->string('jornada', 120)->after('cantidadbimestres');
            $table->integer('inscripcion')->after('jornada');
            $table->integer('mensualidad')->after('inscripcion');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('grados', function (Blueprint $table){
            $table->dropColumn('jornada');
            $table->dropColumn('inscripcion');
            $table->dropColumn('mensualidad');
        });
    }
}
