<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Boleta de Calificaciones</title>
    
  </head>
  <body>
<hr>
  <h2>Boleta del alumno:</h2> <h3>{{$alumnos->nombres . " " . $alumnos->apellidos}}</h3>
  <h2>Grado:</h2><h3>{{$grados->nombre}}</h3>

<hr>
<br>
<table border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <thead>
    <tr>
      <th >Curso_id</th>
      <th  width="230px">Curso</th>
        <th  width="75px">Bim1</th>
        <th  width="75px">Bim2</th>
        <th  width="75px">Bim3</th>
        <th  width="75px">Bim4</th>
        <th  width="75px">Promedio</th>
      </tr>
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
