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
<hr>
<h2>{{$alumno->apellidos . " " . $alumno->nombres}}</h2>
<h3>{{$grados->grado . " " . $grados->nombre}}</h3>
<hr>
<table class="table table-striped table-hover" border="1">
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
              $totalpromedio=$totalpromedio+$alumno_curso->promedio;
              $totalcursos=$totalcursos+1;
              ?>
          </tr>
       @endif
      @endforeach
      <tr>
        <td><strong>Promedio</strong></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>{{round($totalpromedio/$totalcursos)}}</strong></td>
      </tr>
          <?php
              $totalpromedio=0;
              $totalcursos=0;
              ?>
        </tbody>
      </table>
    </div>
     @endforeach
    @else
  @foreach($alumnos as $alumno)
  <?php
      $contador=1;?>
  <div style="page-break-after:always;">
    <h2>{{$alumno->apellidos . " " . $alumno->nombres}}</h2>
    <h3>{{$grados->grado . " " . $grados->nombre}}</h3>
    <table class="table table-striped table-hover" border="1">
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
          $totalpromedio=$totalpromedio+$alumno_curso->promedio;
          $totalcursos=$totalcursos+1;
          ?>
      </tr>
       @endif
      @endforeach
      <tr>
        <td><strong>Promedio</strong></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>{{round($totalpromedio/$totalcursos)}}</strong></td>
      </tr>
        <?php
          $totalpromedio=0;
          $totalcursos=0;
          ?>
        </tbody>
      </table>
           </div>
        @endforeach
@endif