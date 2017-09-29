<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calificacion extends Model
{
  protected $table ="calificaciones";

  protected $fillable =['Bim1','Bim2','Bim3','Bim4', 'alumno_id', 'curso_id'];

  public function alumno()
  {
      return $this->belongsTo('App\alumno');
  }
  public function curso()
  {
      return $this->belongsTo('App\curso');
  }
}
