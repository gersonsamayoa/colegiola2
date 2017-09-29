<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\grado;
use App\nivel;
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
      $grados= grado::orderby ('nivel_id', 'ASC')->paginate(4);
      return view('admin.grados.index')->with('grados', $grados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $niveles=Nivel::orderby('nombre','ASC')->lists('nombre', 'id');
      return view('admin.grados.create', compact('niveles'));
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
      return redirect()->route('admin.grados.index');
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
      return redirect()->route('admin.grados.index');
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
      return redirect()->route('admin.grados.index');
    }
}
