<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\alumno;
use App\grado;
use App\curso;
use App\alumno_curso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection as Collection;
use Barryvdh\DomPDF\Facade as PDF;


class BoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idalumno)
    {
        $totalpromedio=0;
        $totalcursos=0;
        $alumnos=alumno::find($idalumno);
        $grados=grado::find($alumnos->grado_id);

        $alumnos2=alumno_curso::where('alumno_id', $idalumno)->orderby('curso_id', 'ASC')->get();
        foreach ($alumnos2 as $alumno) {
            $totalpromedio=$totalpromedio+$alumno->promedio;
            $totalcursos=$totalcursos+1;
        }

        $totalpromedio=$totalpromedio/$totalcursos;

        return view('admin.calificaciones.boleta', compact('alumnos', 'grados', 'alumnos2', 'totalpromedio'));
    }

    public function imprimir($idalumno)
    {
        $totalpromedio=0;
        $totalcursos=0;
        $alumnos=alumno::find($idalumno);
        $grados=grado::find($alumnos->grado_id);
        $alumnos2=alumno_curso::where('alumno_id', $idalumno)->orderby('curso_id', 'ASC')->get();
        foreach ($alumnos2 as $alumno) {
            $totalpromedio=$totalpromedio+$alumno->promedio;
            $totalcursos=$totalcursos+1;
        }

        $totalpromedio=$totalpromedio/$totalcursos;

        $pdf=new PDF();


        $pdf=PDF::loadview('admin.calificaciones.boletapdf',compact('alumnos', 'grados', 'alumnos2', 'totalpromedio'));
  
        return $pdf->stream('archivo.pdf');
    }

    public function BoletaporGrado($idgrado)
    {
        $totalpromedio=0;
        $totalcursos=0;
        $grados=grado::find($idgrado);
        $alumnos=alumno::where('grado_id', $idgrado)->get();

        $alumnos2=alumno_curso::orderby('curso_id', 'ASC')->get();

        return view('admin.calificaciones.boletaporgrado', compact('alumnos',
            'alumnos2', 'grados', 'totalpromedio', 'totalcursos'));
    }

    public function ImprimirPorGrado($idgrado)
    {
        $totalpromedio=0;
        $totalcursos=0;
        $grados=grado::find($idgrado);
        $alumnos=alumno::where('grado_id', $idgrado)->get();

        $alumnos2=alumno_curso::orderby('curso_id', 'ASC')->get();

        $pdf=new PDF();

        $pdf=PDF::loadview('admin.calificaciones.boletaporgradopdf',compact('alumnos',
            'alumnos2', 'grados', 'totalpromedio', 'totalcursos'));
  
        return $pdf->stream('archivo.pdf');
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
