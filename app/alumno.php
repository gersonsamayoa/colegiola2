<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    protected $table ="alumnos";

    protected $fillable =['nombres','apellidos','codigopersonal', 'carrera_id'];

    public function carrera()
    {
    	return $this->belongsTo('App\carrera');
    }

    public function colegiaturas()
    {
    	return $this->hasMany('App\colegiatura');
    }

       public function scopeSearch($query, $nombres)
    {
        return $query->where('nombres', 'LIKE', "%$nombres%");
    }

    public function scopeBuscar($query, $carrera_id)
    {
      return $query->where('carrera_id', 'LIKE', "%$carrera_id%");
    }

}
