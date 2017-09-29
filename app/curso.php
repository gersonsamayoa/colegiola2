<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
  protected $table ="cursos";

  protected $fillable =['nombre', 'grado_id'];

  public function grado()
  {
      return $this->belongsTo('App\grado');
  }

  public function calificaciones()
  {
    return $this->hasMany('App\calificacion');
  }

  public function scopeBuscar($query, $grado_id)
  {

    return $query->where('grado_id', 'LIKE', "%$grado_id%");
  }


}
