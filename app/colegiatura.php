<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colegiatura extends Model
{
    protected $table ="colegiaturas";

    protected $fillable =['fecha','nit','nombre','numerodocumento','numerofactura','monto','descripcion','alumno_id', 'mes_id'];



    public function alumno()
    {
    	return $this->belongsTo('App\alumno');
    }

    public function mes()
    {
      return $this->belongsTo('App\mes');
    }

  }
