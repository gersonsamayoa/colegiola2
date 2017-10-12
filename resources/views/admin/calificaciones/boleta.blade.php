@extends ('admin.template.main')
@section('title', 'Boleta de Calificaciones de: '. $alumnos->nombres . " " . $alumnos->apellidos)
@section('subtitle', 'Grado: '.$grados->nombre)

@section('content')
@include('flash::message')
<a href="{{route('admin.boleta.imprimir', $alumnos->id)}}" class="btn btn-primary pull-right glyphicon glyphicon-print"></a>
<br>
<br>
<br>
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
      <tr>
      <td>{{$alumno_curso->curso_id}}</td>
      <td>{{$alumno_curso->curso->nombre}}</td>
        <td>{{$alumno_curso->bim1}}</td>
        <td>{{$alumno_curso->bim2}}</td>
        <td>{{$alumno_curso->bim3}}</td>
        <td>{{$alumno_curso->bim4}}</td>
        <td>{{$alumno_curso->promedio}}</td>
        </tr>
      @endforeach

    </tbody>
  </table>

  @endsection
