<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoColumnaAlumnoCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumno_curso', function (Blueprint $table) {
            $table->decimal('bim1', 8, 0)->change();
            $table->decimal('bim2', 8, 0)->change();
            $table->decimal('bim3', 8, 0)->change();
            $table->decimal('bim4', 8, 0)->change();
            $table->decimal('promedio', 8, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumno_curso', function (Blueprint $table) {
             $table->float('bim1')->change();
             $table->float('bim2')->change();
             $table->float('bim3')->change();
             $table->float('bim4')->change();
             $table->float('promedio')->change();
        });
    }
}
