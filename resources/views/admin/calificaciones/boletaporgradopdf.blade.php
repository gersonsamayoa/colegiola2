<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Boleta de Calificaciones</title>
    
  </head>
  <body>

@if ($grados->cantidadbimestres==4)
@foreach($alumnos as $alumno)
<?php
      $contador=1;?>
<div style="page-break-after:always;">
     <table width="100%">
      <tr>
        <td width="15%">
        <img src="http://colegio.cts.edu.gt/img/logo-header1.png" width="70px">
        </td>
        <td width="85%" align="center">
        <h1>Colegio Técnico de Computación CTS </h1>
        <p>Chiquimulilla, Santa Rosa 2,018</p>
        </td>
      </tr>
      </table>
<hr>
<h2>{{$alumno->apellidos . " " . $alumno->nombres}}</h2>
<p>{{$grados->grado . " " . $grados->nombre}}</p>
<table class="table table-striped table-hover" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
    <thead class="info">
      <tr>
          <th class="info">No</th>
          <th class="info" width="350px">Curso</th>
            <th class="info">Bim1</th>
            <th class="info">Bim2</th>
            <th class="info">Bim3</th>
            <th class="info">Bim4</th>
            <th class="info">Promedio</th>
        </tr>
    </thead>
  <tbody>
  @foreach($alumnos2 as $alumno_curso)

    @if($alumno->id==$alumno_curso->alumno_id)
          <tr>
               <td>{{ $contador }}</td> <?php $contador++; ?>
              <td>{{$alumno_curso->curso->nombre}}</td>
              <td>{{$alumno_curso->bim1}}</td>
              <td>{{$alumno_curso->bim2}}</td>
              <td>{{$alumno_curso->bim3}}</td>
              <td>{{$alumno_curso->bim4}}</td>
              <td>{{round($alumno_curso->promedio)}}</td>
              <?php
              $totalbim1=$totalbim1+$alumno_curso->bim1;
              $totalbim2=$totalbim2+$alumno_curso->bim2;
              $totalbim3=$totalbim3+$alumno_curso->bim3;
              $totalbim4=$totalbim4+$alumno_curso->bim4;
              $totalpromedio=$totalpromedio+$alumno_curso->promedio;
              $totalcursos=$totalcursos+1;
              ?>
          </tr>
       @endif
      @endforeach
      <tr>
        <td><strong>Promedio</strong></td>
        <td></td>
         @if($totalcursos>0)
        <td>{{ round($totalbim1/$totalcursos) }}</td>
        <td>{{ round($totalbim2/$totalcursos) }}</td>
        <td>{{ round($totalbim3/$totalcursos) }}</td>
        <td>{{ round($totalbim4/$totalcursos) }}</td>
        <td><strong>{{round($totalpromedio/$totalcursos)}}</strong></td>
        @endif
      </tr>
          <?php
              $totalbim1=0;
              $totalbim2=0;
              $totalbim3=0;
              $totalbim4=0;
              $totalpromedio=0;
              $totalcursos=0;
              ?>
        </tbody>
      </table>
        <br><br><br>
        <table width="100%">
          <tr>
            <td width="50%" align="center"><p>f._____________________________<br> Director </p> </td>
            <td width="50%" align="center"><p>f._____________________________<br> Secretario o Maestro de Grado </p></td>
          </tr>
        </table>
        </div>
     @endforeach
    @else
  @foreach($alumnos as $alumno)
  <?php
      $contador=1;?>
  <div style="page-break-after:always;">
    <table width="100%">
      <tr>
        <td width="15%">
        <img src="http://colegio.cts.edu.gt/img/logo-header1.png" width="70px">
        </td>
        <td width="85%" align="center">
        <h1>Colegio Técnico de Computación CTS </h1>
        <p>Chiquimulilla, Santa Rosa 2,018</p>
        </td>
      </tr>
      </table>
      <hr>
    <h2>{{$alumno->apellidos . " " . $alumno->nombres}}</h2>
    <p>{{$grados->grado . " " . $grados->nombre}}</p>
    <table class="table table-striped table-hover" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
      <thead class="info">
        <tr>
            <th class="info">No</th>
            <th class="info" width="350px">Curso</th>
            <th class="info">Bim1</th>
            <th class="info">Bim2</th>
            <th class="info">Bim3</th>
            <th class="info">Promedio</th>
        </tr>
  </thead>
  <tbody>
@foreach($alumnos2 as $alumno_curso)
  @if($alumno->id==$alumno_curso->alumno_id)
      <tr>
          <td>{{ $contador }}</td> <?php $contador++; ?>
          <td>{{$alumno_curso->curso->nombre}}</td>
          <td>{{$alumno_curso->bim1}}</td>
          <td>{{$alumno_curso->bim2}}</td>
          <td>{{$alumno_curso->bim3}}</td>
          <td>{{round($alumno_curso->promedio)}}</td>
          <?php
          $totalbim1=$totalbim1+$alumno_curso->bim1;
          $totalbim2=$totalbim2+$alumno_curso->bim2;
          $totalbim3=$totalbim3+$alumno_curso->bim3;
          $totalpromedio=$totalpromedio+$alumno_curso->promedio;
          $totalcursos=$totalcursos+1;
          ?>
      </tr>
       @endif
      @endforeach
      <tr>
        <td><strong>Promedio</strong></td>
        <td></td>
         @if($totalcursos>0)
        <td>{{ round($totalbim1/$totalcursos) }}</td>
        <td>{{ round($totalbim2/$totalcursos) }}</td>
        <td>{{ round($totalbim3/$totalcursos) }}</td>
        <td><strong>{{round($totalpromedio/$totalcursos)}}</strong></td>
        @endif
      </tr>
        <?php
          $totalbim1=0;
          $totalbim2=0;
          $totalbim3=0;
          $totalpromedio=0;
          $totalcursos=0;
          ?>
        </tbody>
      </table>
      <br><br><br>
        <table width="100%">
          <tr>
            <td width="50%" align="center"><p>f._____________________________<br> Director </p> </td>
            <td width="50%" align="center"><p>f._____________________________<br> Secretario o Maestro de Grado </p></td>
          </tr>
        </table>
           </div>
        @endforeach
@endif
