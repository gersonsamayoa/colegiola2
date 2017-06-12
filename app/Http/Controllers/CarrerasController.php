<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Carrera;
use Laracasts\Flash\Flash;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras= carrera::orderBy('id', 'ASC')->paginate(4);
        return view('admin.carreras.index')->with ('carreras', $carreras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrera=new  carrera($request->all());
        $carrera->save();
        flash::Success('Carrera Guardada Exitosamente');
        return redirect()->route('admin.carreras.index');
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
        $carrera=Carrera::Find($id);
        return view('admin.carreras.edit')->with('carrera', $carrera);
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
        $carrera=Carrera::Find($id);
        $carrera->Fill($request->all());
        $carrera->save();

        Flash::warning('La carrera '. $carrera->nombre . ' ha sido editada con éxito');
        return redirect()->route('admin.carreras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $carrera= Carrera::Find($id);
       $carrera->delete();

       Flash::error('Carrera ' . $carrera->nombre . ' ha sido borrado de forma exitosa');
       return redirect()->route('admin.carreras.index');
    }
}
