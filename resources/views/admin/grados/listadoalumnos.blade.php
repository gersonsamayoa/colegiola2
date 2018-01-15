@extends('admin.template.main')
@section('title', ''.  $grado->grado . ' ' . $grado->nombre)
@section('content')
<hr>
@include('flash::message')
	<table class="table table-striped table-hover">
		<thead>
			<th>No.</th>
			<th>Apellidos</th>
			<th>Nombres</th>
		</thead>
		<tbody>
			 <?php
      		$contador=1;?>
      		@foreach($alumnos as $alumno)
      		<tr>
      			<td>{{ $contador }}</td> <?php $contador++; ?>
      			<td>{{ $alumno->apellidos }}</td>
      			<td>{{ $alumno->nombres }}</td>
      		</tr>
      		@endforeach

		</tbody>
	</table>
<a href="{{route('admin.niveles.grados', $grado->nivel_id)}}" class="btn btn-success">Regresar</a>
@endsection