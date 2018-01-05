<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colegiatura_mes extends Model
{
   protected $table="colegiatura_mes";

   protected $fillable=['colegiatura_id', 'mes_id'];

   public function colegiatura()
   {
   	return $this->belongsTo('App');
   }

   public function mes()
    {
    	return $this->belongsTo('App\mes');
    }
}
