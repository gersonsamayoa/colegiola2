@extends ('admin.template.main')
@section('title', 'Boleta de Calificaciones de: '. $alumnos->nombres . " " . $alumnos->apellidos)
@section('subtitle', 'Grado: '.$grados->grado . " " . $grados->nombre)

@section('content')
@include('flash::message')
<a href="{{route('admin.boleta.imprimir', $alumnos->id)}}" class="btn btn-primary pull-right glyphicon glyphicon-print"></a>
<br>
<br>
<br>
@if ($grados->cantidadbimestres==4)
<table class="table table-striped table-hover">
  <thead class="info">
      <th class=" info">No.</th>
      <th class=" info">Curso</th>
        <th class=" info">Bim1</th>
        <th class=" info">Bim2</th>
        <th class=" info">Bim3</th>
        <th class=" info">Bim4</th>
        <th class=" info">Promedio</th>
  </thead>
  <tbody>
    <?php
      $contador=1;?>
      @foreach($alumnos2 as $alumno_curso)
      <tr>
          <td>{{ $contador }}</td> <?php $contador++; ?>
          <td>{{$alumno_curso->curso->nombre}}</td>
          <td>{{$alumno_curso->bim1}}</td>
          <td>{{$alumno_curso->bim2}}</td>
          <td>{{$alumno_curso->bim3}}</td>
          <td>{{$alumno_curso->bim4}}</td>
          <td>{{round($alumno_curso->promedio)}}</td>
      </tr>
      @endforeach
      <tr>
          <td><strong>Promedio</strong></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><strong>{{round($totalpromedio)}}</strong></td>
        </tr>
    </tbody>
  </table>
  @else

  <table class="table table-striped table-hover">
  <thead class="info">
      <th class=" info">No.</th>
      <th class=" info">Curso</th>
        <th class=" info">Bim1</th>
        <th class=" info">Bim2</th>
        <th class=" info">Bim3</th>
        <th class=" info">Promedio</th>
  </thead>
  <tbody>
    <?php
      $contador=1;?>
      @foreach($alumnos2 as $alumno_curso)
      <tr>
      <td>{{ $contador }}</td> <?php $contador++; ?>
      <td>{{$alumno_curso->curso->nombre}}</td>
        <td>{{$alumno_curso->bim1}}</td>
        <td>{{$alumno_curso->bim2}}</td>
        <td>{{$alumno_curso->bim3}}</td>
        <td>{{round($alumno_curso->promedio)}}</td>
        </tr>
      @endforeach
      <td><strong>Promedio</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
        <td><strong>{{round($totalpromedio)}}</strong></td>
    </tbody>
  </table>
@endif

  @endsection
