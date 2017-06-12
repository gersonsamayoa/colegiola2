<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colegiatura extends Model
{
    protected $table ="colegiaturas";

    protected $fillable =['fecha','nit','numerodocumento','mes','monto','descripcion','alumno_id'];



    public function alumno()
    {
    	return $this->belongsTo('App\alumno');
    }

  }
