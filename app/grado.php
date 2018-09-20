<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grado extends Model
{
    protected $table ="grados";

    protected $fillable =['nombre', 'grado', 'cantidadbimestres', 'nivel_id', 'ciclo_id', 'created_at'];

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
      return $this->belongsTo('App\nivel', 'nivel_id');
    }

    public function ciclo()
    {
      return $this->belongsTo('App\ciclo', 'ciclo_id');
    }

    public static function grados($id){
      return grado::where('nivel_id', '=', $id)->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->get();
    }

    public static function grados2($id){
      return grado::orderBy('nombre','ASC')->orderBy('grado', 'ASC')->get();
    }
}
