<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\curso;
use App\grado;
use App\alumno;
use App\calificacion;
use Laracasts\Flash\Flash;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      dd("Si");
    }

    public function listCalificaciones($id)
    {
      $calificaciones=calificacion::where('curso_id', $id)->get();
      $result=$calificaciones->count();

      if((!$result)>0)
      {
        $cursos=curso::find($id);
        $grados=grado::find($cursos->grado_id);
        $alumnos=alumno::where('grado_id', $cursos->grado_id)->get();
        return view('admin.calificaciones.list', compact('calificaciones', 'cursos', 'grados', 'alumnos'));
      }
      else {

      $cursos=curso::find($id);
      $grados=grado::find($cursos->grado_id);
      $alumnos=alumno::where('grado_id',$cursos->grado_id)->get();
      return view('admin.calificaciones.index', compact('calificaciones','cursos', 'grados', 'alumnos'));
      }
    }

    public function listAlumnos($id)
    {
      $cursos=curso::find($id);
      $grados=grado::find($cursos->grado_id);
      $alumnos=alumno::where('grado_id',$cursos->grado_id)->get();
      return view('admin.calificaciones.list', compact('cursos', 'grados', 'alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cursoid, $alumnoid)
    {
        $calificaciones=new calificacion($request->all());
        $calificaciones->save();

        flash('Calificación Guardada Exitosamente')->success()->important();
        return redirect()->route('admin.calificaciones.listCalificaciones', $cursoid);
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
      $calificaciones=calificacion::Find($id);
      $calificaciones->Fill($request->all());
      $calificaciones->save();

      flash('La calificación '. $calificaciones->alumno->nombres .' ha sido editada con éxito')->warning()->important();

      return redirect()->route('admin.cursos.index');
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
