<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarCamponuevoAlumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnos', function (Blueprint $table){
            $table->string('alumnonuevo', 120)->after('carnet');
            $table->integer('edadencargado')->after('emailencargado');
            $table->string('estadocivilencargado', 120)->after('edadencargado');
            $table->string('nacionalidadencargado', 120)->after('estadocivilencargado');
            $table->string('telefono2', 120)->after('telefono');
            $table->string('telefono3', 120)->after('telefono2');
            $table->integer('correlativo')->after('carnet');
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
            $table->dropColumn('alumnonuevo');
            $table->dropColumn('edadencargado');
            $table->dropColumn('estadocivilencargado');
            $table->dropColumn('nacionalidadencargado');
            $table->dropColumn('telefono2');
            $table->dropColumn('telefono3');
            $table->dropColumn('correlativo');
        });
    }
}
