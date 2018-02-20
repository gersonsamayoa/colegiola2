<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AlumnoRequest;
use App\Http\Controllers\Controller;
use App\alumno;
use App\grado;
use App\nivel;
use DB;
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
      $grados=grado::select(DB::raw('concat (grado, " ", nombre) as fullgrado, id'))->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->lists('fullgrado', 'id');
 
      $alumnos=alumno::orderBy('nombres', 'ASC')->paginate(10);
      
      if($request->nombres){
        $alumnos=alumno::search($request->nombres)->orderBy('apellidos', 'ASC')->paginate(30);
          /*return view('admin.alumnos.index')->with ('alumnos', $alumnos);*/
          return view('admin.alumnos.index', compact('alumnos', 'grados'));
      }else {
        $alumnos= alumno::buscar($request->grado_id)->orderBy('apellidos', 'ASC')->paginate(30);
        /*return view('admin.alumnos.index')->with ('alumnos', $alumnos);*/
        return view('admin.alumnos.index', compact('alumnos', 'grados'));
        }

      return view('admin.alumnos.index', compact('alumnos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles=nivel::orderBy('id','ASC')->lists('nombre', 'id');
        $grados=grado::select(DB::raw('concat (grado, " ", nombre) as fullgrado, id'))->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->lists('fullgrado', 'id');

        return view('admin.alumnos.create', compact('niveles', 'grados'));
    }

    /*Metodo para llenar combos anidados*/
    public function getGrados(Request $request, $id)
    {
      if($request->ajax()){
        $grados=grado::grados($id);
            return response()->json($grados);
        }
    }

    public function getGrados2(Request $request, $id)
    {
      if($request->ajax()){
        $grados=grado::grados2($id);
            return response()->json($grados);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        $nombres=alumno::where('nombres', $request->nombres)->get();
        $apellidos=alumno::where('apellidos', $request->apellidos)->get();

        if ($nombres->all() OR $apellidos->all())
        {
        $alumno= new alumno();
        $alumno->nombres=$request->nombres;
        $alumno->apellidos=$request->apellidos;
        $alumno->encargado=$request->encargado;
        $alumno->telefono=$request->telefono;
        $alumno->carnet=$request->carnet;
        $alumno->grado_id=$request->grado_id;
        $alumno->save();

        flash('Alumno Guardado con Nombre o Apellidos Repetido')->success()->warning();
        return redirect()->route('admin.alumnos.index');
        }
        else
        {
        $alumno= new alumno();
        $alumno->nombres=$request->nombres;
        $alumno->apellidos=$request->apellidos;
        $alumno->encargado=$request->encargado;
        $alumno->telefono=$request->telefono;
        $alumno->carnet=$request->carnet;
        $alumno->grado_id=$request->grado_id;
        $alumno->save();

        flash('Alumno Guardado Exitosamente')->success()->important();
        return redirect()->route('admin.alumnos.index');
        
        }
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
        $niveles=nivel::orderBy('nombre','ASC')->lists('nombre', 'id');
        $grados=grado::select(DB::raw('concat (grado, " ", nombre) as fullgrado, id'))->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->lists('fullgrado', 'id');


        return view('admin.alumnos.edit', compact('alumno', 'grados', 'niveles'));
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

        flash('La alumno '. $alumno->nombres . ' ' . $alumno->apellidos . ' ha sido editada con éxito')->warning()->important();

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

       flash('Alumno ' . $alumno->nombre . ' ha sido eliminado de forma exitosa')->error()->important();
       return redirect()->route('admin.alumnos.index');
    }

}
