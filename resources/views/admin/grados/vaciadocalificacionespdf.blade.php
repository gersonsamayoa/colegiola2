<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Vaciado</title>
    <style type="text/css">
    	html {
		margin: 0;
		}
		body {
		margin: 10mm 7mm 10mm 7mm;
		}
    </style>
    
  </head>
  <body>
  	<h1>Grado: {{ $grado->grado . ' ' . $grado->nombre}}</h1>
	 <table width="100%" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
	 	<thead>
			<tr>
			<th style="font-size:8px">No.</th>
			<th style="font-size:8px">Nombres</th>
			@foreach($cursos as $curso)
			<th style="font-size:8px; text-align: center;">{{ $curso->nombre }}</th>
			@endforeach
      <th style="font-size:8px; text-align: center;">Promedio</th>
			</tr>
			</thead>
		<tbody>
			
			 <?php
      		$contador=1;?>
      		@foreach($alumnos as $alumno)
      		<tr>
      			<td style="font-size:10px">{{ $contador }}</td> <?php $contador++; ?>
      			<td style="font-size:10px">{{ $alumno->apellidos . ' ' . $alumno->nombres}}</td>
      			@foreach($alumno_cursos as $alumno_curso)
      				@if($alumno_curso->alumno_id == $alumno->id)
      					@if($alumno_curso->nota>59)
      					<td style="font-size:12px; text-align: center;">{{$alumno_curso->nota }}</td>
      					@else
                <td style="font-size:12px; text-align: center;"><font color="red">{{$alumno_curso->nota }}</font></td>
                @endif
                <?php
                 $totalpromedio=$totalpromedio+$alumno_curso->nota;
                 ?>
              @endif
            @endforeach
            <td style="font-size:12px; text-align: center;">{{ round($totalpromedio/$cantidadcursos) }}</td>
            <?php
             $totalpromedio=0;
            ?>
      		</tr>
      		@endforeach

		</tbody>
	</table>

