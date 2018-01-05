<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MesRequest;
use App\Http\Controllers\Controller;
use App\alumno;
use App\mes;
use App\colegiatura;
use Laracasts\Flash\Flash;
use App\carrera;
use App\grado;
use App\colegiatura_mes;
use DB;

class ColegiaturasController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $meses=Mes::orderBy('id', 'ASC')->lists('nombre', 'id');
      $alumno=Alumno::Find($id);
      return view('admin.colegiaturas.create', compact('alumno', 'meses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $colegiaturas= new colegiatura($request->all());
        $colegiaturas->save();

        $colegiaturas->meses()->sync($request->mes_id);

        flash('Colegiatura Guardada Exitosamente')->success()->important();
        return redirect()->route('admin.colegiaturas.detalles', $colegiaturas->alumno_id);
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
        $meses=Mes::orderBy('id', 'ASC')->lists('nombre', 'id');
        $colegiaturas=colegiatura::Find($id);
        $mymeses=$colegiaturas->meses->lists('id')->toArray();
        $alumno=Alumno::Find($colegiaturas->alumno_id);

        return view('admin.colegiaturas.edit', compact('colegiaturas', 'alumno', 'meses', 'mymeses'));
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

        $colegiaturas=colegiatura::Find($id);
        $colegiaturas->Fill($request->all());
        $colegiaturas->save();

        $colegiaturas->meses()->sync($request->mes_id);

        flash('La colegiatura se ha sido editada con éxito')->warning()->important();
        return redirect()->route('admin.colegiaturas.detalles', $colegiaturas->alumno_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colegiaturas= colegiatura::Find($id);
        $colegiaturas->delete();

        flash('La colegiatura ha sido borrado de forma exitosa')->error()->important();
        return redirect()->route('admin.colegiaturas.detalles', $colegiaturas->alumno_id);
    }

     public function detalles($id)
    {
        $colegiaturas= colegiatura::where('alumno_id', $id)->paginate(4);
        $colegiaturas->each(function($colegiaturas){
           $colegiaturas->alumno;
           });

        $alumno=Alumno::Find($id);

        $mymeses=colegiatura_mes::all();
    
        return view('admin.colegiaturas.index', compact ('colegiaturas','alumno','mymeses'));

    }

   public function consultagrado(Request $request)
  {
    $meses=array("Inscripción", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Graduación");
    $grados=grado::select(DB::raw('concat (grado, " ", nombre) as fullgrado, id'))->orderBy('nombre','ASC')->orderBy('grado', 'ASC')->lists('fullgrado', 'id');
    if ($request->grado_id){
    $alumnos=alumno::buscar($request->grado_id)->get();
    $colegiaturas= colegiatura::orderby('mes_id','ASC')->get();
    $groupcolegiaturas=$alumnos->groupby('nombres');
    }
    else {
      {
        $alumnos=alumno::Search($request->nombres)->get();
        $colegiaturas= colegiatura::orderby('mes_id','ASC')->get();
        $groupcolegiaturas=$alumnos->groupby('nombres');
      }
    }

    return view('admin.colegiaturas.consultagrado', compact ('colegiaturas', 'groupcolegiaturas', 'alumnos', 'grados', 'meses'));
  }

  public function alumnocolegiatura($id)
  {
    $colegiaturas= colegiatura::Find($id);
    $alumnos=alumno::Find($colegiaturas->alumno_id);
    
    return view('admin.colegiaturas.alumnocolegiatura', compact('colegiaturas', 'alumnos'));
  }

    public function eliminar($id)
    {
        $colegiaturas= colegiatura::Find($id);
        $colegiaturas->delete();

        flash('La colegiatura ha sido borrado de forma exitosa')->error()->important();
        return redirect()->route('admin.colegiaturas.consultagrado');
    }
}
