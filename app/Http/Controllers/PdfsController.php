<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\alumno;
use App\colegiatura;
use App\mes;
use Barryvdh\DomPDF\Facade as PDF;

class PdfsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

      $colegiaturas=Colegiatura::find($id);
      $pdf	= PDF::loadview('admin.alumnos.factura', ['colegiaturas' => $colegiaturas]);
      return $pdf->stream('archivo.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function compromiso($id)
    {
        $alumnos=alumno::find($id);
        $hoy=date("Y");
        $edad=$hoy-(date('Y', strtotime($alumnos->fechanacimiento)));

        $pdf=new PDF();
        $paper_size = array(0,0,609.4488,935.433);
        $pdf=PDF::loadview('admin.alumnos.compromisopdf',compact('alumnos', 'edad'))->setpaper($paper_size);;
        
        return $pdf->stream('compromiso.pdf');
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
