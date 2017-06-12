<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    protected $table ="carreras";

    protected $fillable =['nombre', 'grado'];

    public function alumnos()
    {
    	return $this->hasMany('App\alumno');
    }
}
