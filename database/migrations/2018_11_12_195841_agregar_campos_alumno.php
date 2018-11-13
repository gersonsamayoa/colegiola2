<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarCamposAlumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnos', function (Blueprint $table){
            $table->date('fecha')->after('id');
            $table->date('fechanacimiento')->after('apellidos');
            $table->string('dpiencargado', 120)->after('encargado');
            $table->string('profesionencargado', 120)->after('dpiencargado');
            $table->string('direccionencargado', 255)->after('profesionencargado');
            $table->string('relacionencargado', 120)->after('direccionencargado');
            $table->string('emailencargado', 120)->after('relacionencargado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnos', function (Blueprint $table){
            $table->dropColumn('fecha');
            $table->dropColumn('fechanacimiento');
            $table->dropColumn('dpiencargado');
            $table->dropColumn('profesionencargado');
            $table->dropColumn('direccionencargado');
            $table->dropColumn('relacionencargado');
            $table->dropColumn('emailencargado');
        });
    }
}
