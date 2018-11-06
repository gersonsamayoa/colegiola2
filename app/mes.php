<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mes extends Model
{
  protected $table ="meses";

  protected $fillable =['nombre', 'numeromes'];

  public function colegiaturas()
    {
    	return $this->hasMany('App\colegiatura');
    }
}
