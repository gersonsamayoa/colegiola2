<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AlumnoRequest;
use App\Http\Controllers\Controller;
use App\Carrera;
use App\Alumno;
use Laracasts\Flash\Flash;


class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $carreras=Carrera::selectRaw('CONCAT(grado, " ", nombre) as nombres, id')
      ->lists('nombres', 'id');

        if($request->nombres){
          $alumnos= alumno::search($request->nombres)->orderBy('id', 'ASC')->paginate(4);
            /*return view('admin.alumnos.index')->with ('alumnos', $alumnos);*/
            return view('admin.alumnos.index', compact('alumnos', 'carreras'));
        }else{
          $alumnos= alumno::buscar($request->carrera_id)->paginate(4);
          /*return view('admin.alumnos.index')->with ('alumnos', $alumnos);*/
          return view('admin.alumnos.index', compact('alumnos', 'carreras'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $carreras=Carrera::selectRaw('CONCAT(grado, " ", nombre) as nombres, id')
        ->orderBy('nombre')->lists('nombres', 'id');

        return view('admin.alumnos.create')->with('carreras', $carreras);
        /*Comment*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        $alumno= new alumno($request->all());
        $alumno->save();

        flash::Success('Alumno Guardado Exitosamente');
        return redirect()->route('admin.alumnos.index');
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
        $alumno=Alumno::Find($id);
        $carreras=Carrera::selectRaw('CONCAT(grado, " ", nombre) as nombres, id')
        ->orderBy('nombre')->lists('nombres', 'id');

        return view('admin.alumnos.edit', compact('alumno', 'carreras'));
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
        $alumno=alumno::Find($id);
        $alumno->Fill($request->all());
        $alumno->save();

        Flash::warning('La alumno '. $alumno->nombres . ' ' . $alumno->apellidos . ' ha sido editada con éxito');

        return redirect()->route('admin.alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno= alumno::Find($id);
       $alumno->delete();

       Flash::error('Alumno ' . $alumno->nombre . ' ha sido eliminado de forma exitosa');
       return redirect()->route('admin.alumnos.index');
    }
}
