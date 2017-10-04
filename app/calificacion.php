<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calificacion extends Model
{
  protected $table ="calificaciones";

  protected $fillable =['bim1','bim2','bim3','bim4', 'promedio', 'alumno_id', 'curso_id'];

  public function alumno()
  {
      return $this->belongsTo('App\alumno');
  }
  public function curso()
  {
      return $this->belongsTo('App\curso');
  }
}
