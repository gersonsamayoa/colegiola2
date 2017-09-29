<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\curso;
use App\grado;
use App\nivel;


class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $niveles=Nivel::orderby('nombre','ASC')->lists('nombre', 'id');
      $grados=grado::orderby('nombre','ASC')->lists('nombre', 'id');

      if($request->grado_id){
        $cursos=curso::buscar($request->grado_id)->orderBy('nombre', 'ASC')->paginate(4);

          return view('admin.cursos.index', compact('cursos', 'grados', 'niveles'));
      }else{
        $cursos=curso::orderBy('nombre', 'ASC')->paginate(4);
          return view('admin.cursos.index', compact('cursos', 'grados', 'niveles'));
      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $grados=grado::orderby('nombre','ASC')->lists('nombre', 'id');
      $niveles=nivel::orderby('nombre', 'ASC')->lists('nombre', 'id');
      return view('admin.cursos.create', compact('grados', 'niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cursos=new curso();
        $cursos->nombre=$request->nombre;
        $cursos->grado_id=$request->grado_id;
        $cursos->save();
        flash('Curso Guardado Exitosamente')->success()->important();;
        return redirect()->route('admin.cursos.index');
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
        $cursos=curso::find($id);
        $niveles=nivel::orderby('nombre', 'ASC')->lists('nombre', 'id');
        $grados=grado::orderby('nombre', 'ASC')->lists('nombre', 'id');
        return view ('admin.cursos.edit', compact('cursos', 'niveles', 'grados'));

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
        $cursos=curso::find($id);
        $cursos->fill($request->all());
        $cursos->save();

        flash('El curso '. $cursos->nombre . ' ha sido guardado exitosamente')->warning()->important();

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
      $cursos=curso::Find($id);
      $cursos->delete();

      flash('El curso '. $cursos->nombre . ' Ha sido borrado de forma exitosa')->error()->important();
      return redirect()->route('admin.cursos.index');
    }
}
