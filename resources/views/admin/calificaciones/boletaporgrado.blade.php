@extends ('admin.template.main')
@section('title', 'Boleta de Calificaciones por grado')
@section('subtitle', 'Grado: '.$grados->nombre)

@section('content')
@include('flash::message')
<a href="{{route('admin.grados.imprimir', $grados->id)}}" class="btn btn-primary pull-right glyphicon glyphicon-print"></a>
<br>
<br>
<br>
@if ($grados->cantidadbimestres==4)
@foreach($alumnos as $alumno)

<h3>{{$alumno->nombres . " " . $alumno->apellidos}}</h3>
<table class="table table-striped table-hover">
      <thead class="info">
      <th class=" info">Curso_id</th>
      <th class=" info">Curso</th>
        <th class=" info">Bim1</th>
        <th class=" info">Bim2</th>
        <th class=" info">Bim3</th>
        <th class=" info">Bim4</th>
        <th class=" info">Promedio</th>
  </thead>
  <tbody>
@foreach($alumnos2 as $alumno_curso)
  @if($alumno->id==$alumno_curso->alumno_id)
      <tr>
          <td>{{$alumno_curso->curso_id}}</td>
          <td>{{$alumno_curso->curso->nombre}}</td>
          <td>{{$alumno_curso->bim1}}</td>
          <td>{{$alumno_curso->bim2}}</td>
          <td>{{$alumno_curso->bim3}}</td>
          <td>{{$alumno_curso->bim4}}</td>
          <td>{{$alumno_curso->promedio}}</td>
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
        <td><strong>{{$totalpromedio/$totalcursos}}</strong></td>
      </tr>
      <?php
          $totalpromedio=0;
          $totalcursos=0;
          ?>
        </tbody>
      </table>
        @endforeach

@else

        @foreach($alumnos as $alumno)
<h3>{{$alumno->nombres . " " . $alumno->apellidos}}</h3>
<table class="table table-striped table-hover">
      <thead class="info">
      <th class=" info">Curso_id</th>
      <th class=" info">Curso</th>
        <th class=" info">Bim1</th>
        <th class=" info">Bim2</th>
        <th class=" info">Bim3</th>
        <th class=" info">Promedio</th>
  </thead>
  <tbody>
@foreach($alumnos2 as $alumno_curso)
  @if($alumno->id==$alumno_curso->alumno_id)
      <tr>
          <td>{{$alumno_curso->curso_id}}</td>
          <td>{{$alumno_curso->curso->nombre}}</td>
          <td>{{$alumno_curso->bim1}}</td>
          <td>{{$alumno_curso->bim2}}</td>
          <td>{{$alumno_curso->bim3}}</td>
          <td>{{$alumno_curso->promedio}}</td>
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
        <td><strong>{{$totalpromedio/$totalcursos}}</strong></td>
      </tr>
      <?php
          $totalpromedio=0;
          $totalcursos=0;
          ?>
        </tbody>
      </table>
        @endforeach

        @endif
   @endsection
