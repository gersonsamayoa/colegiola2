<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grado extends Model
{
    protected $table ="grados";

    protected $fillable =['nombre', 'nivel_id'];

    public function alumnos()
    {
    	return $this->hasMany('App\alumno');
    }

    public function cursos()
    {
    	return $this->hasMany('App\curso');
    }

    public function nivel()
    {
      return $this->belongsTo('App\nivel');
    }

    public static function grados($id){
      return grado::where('nivel_id', '=', $id)->orderBy('nombre','ASC')->get();
    }
}
