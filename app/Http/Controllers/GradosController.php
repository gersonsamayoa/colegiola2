<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\grado;
use App\nivel;
use App\alumno;
use Laracasts\Flash\Flash;

class GradosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $grados= grado::orderby('nombre', 'ASC')->orderby('grado', 'ASC')->paginate(10);
      return view('admin.grados.index')->with('grados', $grados);
    }

    public function gradosnivel($id)
    {
      $niveles=Nivel::Find($id);
      $grados= grado::where('nivel_id', $id)->orderby('id', 'ASC')->orderby('grado', 'ASC')->orderby('nombre', 'ASC')->paginate(10);
      return view('admin.grados.index2', compact('grados', 'niveles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $niveles=Nivel::orderby('nombre','ASC')->lists('nombre', 'id');
      $niveles2=Nivel::Find($id);
      return view('admin.grados.create', compact('niveles', 'niveles2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $grados=new grado($request->all());
      $grados->save();
      flash('Grado Guardado Exitosamente')->success()->important();
      return redirect()->route('admin.niveles.grados', $grados->nivel_id);
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
      $niveles=Nivel::orderby('nombre','ASC')->lists('nombre', 'id');
      $grados=Grado::Find($id);

      return view('admin.grados.edit', compact('grados', 'niveles'));
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
      $grados=grado::Find($id);
      $grados->Fill($request->all());
      $grados->save();

      flash('El Grado '. $grados->nombre . ' ha sido editado con éxito')->warning()->important();
      return redirect()->route('admin.niveles.grados', $grados->nivel_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $grados= grado::Find($id);
      $grados->delete();

      flash('El Grado ' . $grados->nombre . ' ha sido borrado de forma exitosa')->error()->important();
      return redirect()->route('admin.niveles.grados', $grados->nivel_id);
    }

    public function listado($id)
    {
      $alumnos=alumno::where('grado_id', $id)->orderby('apellidos', 'ASC')->get();
      $grado=grado::find($id);
      return view('admin.grados.listadoalumnos', compact('alumnos', 'grado'));

    }
}
