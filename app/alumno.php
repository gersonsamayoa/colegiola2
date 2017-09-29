<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    protected $table ="alumnos";

    protected $fillable =['nombres','apellidos','encargado', 'telefono','carnet', 'grado_id'];

    public function grado()
    {
    	return $this->belongsTo('App\grado');
    }

    public function colegiaturas()
    {
    	return $this->hasMany('App\colegiatura');
    }

       public function scopeSearch($query, $nombres)
    {
        return $query->where('nombres', 'LIKE', "%$nombres%");
    }

    public function scopeBuscar($query, $grado_id)
    {
      return $query->where('grado_id', 'LIKE', "%$grado_id%");
    }

    public function calificaciones()
    {
    	return $this->hasMany('App\calificacion');
    }

}
