@extends('admin.template.main')
@section('title', 'Vaciado de Notas '.  $grado->grado . ' ' . $grado->nombre)
@section('content')
<a href="{{route('admin.niveles.grados.selectbim.imprimir', ['id'=>$grado->id,'bim'=> $bim])}}" class="btn btn-primary pull-right glyphicon glyphicon-print" target="_blank"></a>
<br>
<hr>
@include('flash::message')

@if($grado->cantidadbimestres==4)
{!! Form::open(['route'=>['admin.niveles.grados.vaciado',$grado->id], 'method'=>'POST']) !!}
<div class="form-group">
	{!! Form::label('bimestre', 'Bimestre') !!}
	{!!Form::select('bim', ['bim1'=>'Bimestre1','bim2'=>'Bimestre2','bim3'=>'Bimestre3', 'bim4'=>'Bimestre4', 'promedio'=>'Promedio'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
</div>

<div class="form-gropu">
{!! Form::submit('Mostrar', ['class'=>'btn btn-primary']) !!}
<a href="{{route('admin.niveles.grados', $grado->nivel_id)}}" class="btn btn-success">Regresar</a>
</div>
{!! Form::close() !!}
@endif

@if($grado->cantidadbimestres==3)
{!! Form::open(['route'=>['admin.niveles.grados.vaciado',$grado->id], 'method'=>'POST']) !!}
<div class="form-group">
	{!! Form::label('bimestre', 'Bimestre') !!}
	{!!Form::select('bim', ['bim1'=>'Bimestre1','bim2'=>'Bimestre2','bim3'=>'Bimestre3', 'promedio'=>'Promedio'], null, ['class'=>'form-control','placeholder'=>'Selecciona una opción...', 'required'])!!}
</div>

<div class="form-gropu">
{!! Form::submit('Mostrar', ['class'=>'btn btn-primary']) !!}
<a href="{{route('admin.niveles.grados', $grado->nivel_id)}}" class="btn btn-success">Regresar</a>
</div>
{!! Form::close() !!}
@endif
	<table class="table table-striped table-hover">
		<thead>
			<tr>
			<th style="font-size:10px">No.</th>
					<th style="font-size:12px">Nombres</th>
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
      			<td>{{ $contador }}</td> <?php $contador++; ?>
      			<td>{{ $alumno->apellidos . ' ' . $alumno->nombres}}</td>
      			@foreach($alumno_cursos as $alumno_curso)
      				@if($alumno_curso->alumno_id == $alumno->id)
      					@if($alumno_curso->nota>59)
      					<td style="text-align: center;">{{$alumno_curso->nota }}</td>
      					@else
      					<td style="text-align: center; color:red;">{{$alumno_curso->nota }}</td>
      					@endif
      					 <?php
      					 $totalpromedio=$totalpromedio+$alumno_curso->nota;
      					 ?>
      				@endif
      			@endforeach
      			<td>{{ round($totalpromedio/$cantidadcursos) }}</td>
      			<?php
      			 $totalpromedio=0;
      			?>
      		</tr>
      		@endforeach

		</tbody>
	</table>
@endsection