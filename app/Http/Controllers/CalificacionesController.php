<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\curso;
use App\grado;
use App\alumno;
use App\alumno_curso;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;


class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    public function listCalificaciones($id)
    {
        $cursos=curso::find($id);
        $grados=grado::find($cursos->grado_id);
        $alumnos=alumno::where('grado_id', $grados->id)->get();

        //Alumnos con notas ya consignadas segun el curso seleccionado
        $cursosalumnosasignados=DB::table('alumno_curso')->leftjoin('alumnos', 'alumno_curso.alumno_id', '=', 'alumnos.id')->where('alumno_curso.curso_id','=',$id)->orderBy('nombres', 'ASC')->get();

        // Primero sacas los id alumnos que están asignados al curso
        $alumno_curso = alumno_curso::where('curso_id','=',$id)
        ->select(['alumno_id'])->get();

        //busqueda de alumnos que no tienen la nota en el curso
        $cursos_alumnos=DB::table('alumnos')->whereNotIn('id', $alumno_curso)->select('alumnos.*')->get();


        return view('admin.calificaciones.index', compact('cursos', 'grados', 'alumnos', 'cursosalumnosasignados', 'cursos_alumnos'));


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
        $alumnos=alumno::find($alumnoid);
        $alumnos->cursos()->attach($cursoid, ['bim1' => $request->bim1, 'bim2' => $request->bim2, 'bim3' => $request->bim3, 'bim4' => $request->bim4, 'promedio' => $request->promedio]);


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
    public function update(Request $request, $cursoid, $alumnoid)
    {
      $alumnos=alumno::find($alumnoid);
      $cursos=$alumnos->cursos()->where('curso_id', $cursoid)->first();
      $cursos->pivot->bim1=$request->bim1;
      $cursos->pivot->bim2=$request->bim2;
      $cursos->pivot->bim3=$request->bim3;
      $cursos->pivot->bim4=$request->bim4;
      $cursos->pivot->promedio=$request->promedio;
      $cursos->pivot->save();

      flash('Calificación Editada Exitosamente')->success()->important();
      return redirect()->route('admin.calificaciones.listCalificaciones', $cursoid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($alumnoid, $cursoid)
    {

      $alumnos=alumno::find($alumnoid);
      $alumnos->cursos()->detach($cursoid);

      flash('Calificaciones eliminada Exitosamente')->error()->important();
      return redirect()->route('admin.calificaciones.listCalificaciones', $cursoid);
    }
}
