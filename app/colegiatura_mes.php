<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colegiatura_mes extends Model
{
   protected $table="colegiatura_mes";

   protected $fillable=['fecha','nit','nombre','numerodocumento','numerofactura','monto','descripcion', 'alumno_id', 'mes_id'];

   public function alumno()
  {
    return $this->belongsTo('App\alumno');
  }

   public function meses()
    {
    	return $this->belongsToMany('App\mes');
    }
}
