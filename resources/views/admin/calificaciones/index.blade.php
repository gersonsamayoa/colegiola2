@extends ('admin.template.main')
@section('title', 'Ingreso de Notas del Curso de: '. $cursos->nombre)
@section('subtitle', 'Grado: '.$grados->nombre)

@section('content')
@include('flash::message')

<h3 class="text-center">Alumnos con notas</h3>
@if($grados->cantidadbimestres==4)
	<table class="table table-striped">
		<thead>
			<th>Carnet</th>
			<th>Alumno</th>
      <th>Curso_id</th>
					<th class="col-sm-1">Bim1</th>
					<th class="col-sm-1">Bim2</th>
		      <th class="col-sm-1">Bim3</th>
					<th class="col-sm-1">Bim4</th>
		      <th class="col-sm-1">Promedio</th>
      <th>Acción</th>
		</thead>
		<tbody>

		@foreach($cursosalumnosasignados as $cursoalumnoasignado)

				@if($cursoalumnoasignado->curso_id==$cursos->id)
					{!!Form::open(['route'=>['admin.calificaciones.update', $cursoalumnoasignado->curso_id, $cursoalumnoasignado->alumno_id], 'method'=>'PUT']) !!}
					 <tr data-alumnoid="{{$cursoalumnoasignado->alumno_id}}" data-cursoid="{{$cursoalumnoasignado->curso_id}}">
					<td>{{$cursoalumnoasignado->carnet}}</td>
					<td>{{$cursoalumnoasignado->nombres . " " . $cursoalumnoasignado->apellidos}}</td>
					<td>{{$cursoalumnoasignado->curso_id}}</td>

					<td><div class="form-group">
						{!!Form::text('bim1',$cursoalumnoasignado->bim1,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
							{!!Form::text('bim2',$cursoalumnoasignado->bim2,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::text('bim3',$cursoalumnoasignado->bim3,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::text('bim4',$cursoalumnoasignado->bim4,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::label('promedio',$cursoalumnoasignado->promedio,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td>
						<div class="form-group">
						{!!Form::submit('Editar',['class'=>'btn btn-info'])!!}
						{!!Form::close()!!}
						<a href="{{route('admin.calificaciones.destroy', [$cursoalumnoasignado->alumno_id,$cursoalumnoasignado->curso_id])}}"  onclick="return confirm('Seguro que quiere eliminar esta calificación?')" class="btn btn-danger btn-delete">Eliminar</a>
						</div>

					</td>

				</tr>
				@endif
			@endforeach
		</tbody>
	</table>
	@else
	<table class="table table-striped">
		<thead>
			<th>Carnet</th>
			<th>Alumno</th>
      <th>Curso_id</th>
					<th class="col-sm-1">Bim1</th>
					<th class="col-sm-1">Bim2</th>
		      <th class="col-sm-1">Bim3</th>
		      <th class="col-sm-1">Promedio</th>
      <th>Acción</th>
		</thead>
		<tbody>

		@foreach($cursosalumnosasignados as $cursoalumnoasignado)

				@if($cursoalumnoasignado->curso_id==$cursos->id)
					{!!Form::open(['route'=>['admin.calificaciones.update', $cursoalumnoasignado->curso_id, $cursoalumnoasignado->alumno_id], 'method'=>'PUT']) !!}
					 <tr data-alumnoid="{{$cursoalumnoasignado->alumno_id}}" data-cursoid="{{$cursoalumnoasignado->curso_id}}">
					<td>{{$cursoalumnoasignado->carnet}}</td>
					<td>{{$cursoalumnoasignado->nombres . " " . $cursoalumnoasignado->apellidos}}</td>
					<td>{{$cursoalumnoasignado->curso_id}}</td>

					<td><div class="form-group">
						{!!Form::text('bim1',$cursoalumnoasignado->bim1,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
							{!!Form::text('bim2',$cursoalumnoasignado->bim2,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::text('bim3',$cursoalumnoasignado->bim3,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::label('promedio',$cursoalumnoasignado->promedio,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td>
						<div class="form-group">
						{!!Form::submit('Editar',['class'=>'btn btn-info'])!!}
						{!!Form::close()!!}
						<a href="{{route('admin.calificaciones.destroy', [$cursoalumnoasignado->alumno_id,$cursoalumnoasignado->curso_id])}}"  onclick="return confirm('Seguro que quiere eliminar esta calificación?')" class="btn btn-danger btn-delete">Eliminar</a>
						</div>

					</td>

				</tr>
				@endif
			@endforeach
		</tbody>
	</table>
	@endif

@if($grados->cantidadbimestres==4)
	<h3 class="text-center">Alumnos sin  notas</h3>
	<table class="table table-striped">
		<thead>
			<th>Carnet</th>
			<th>Alumno</th>
			<th>Curso_id</th>
			<th class="col-sm-1">Bim1</th>
			<th class="col-sm-1">Bim2</th>
			<th class="col-sm-1">Bim3</th>
			<th class="col-sm-1">Bim4</th>
			<th>Acción</th>
		</thead>
		<tbody>
	<tr>
	@foreach($cursos_alumnos as $curso_alumno)

					@if($curso_alumno->grado_id==$grados->id)

					{!!Form::open(['route'=>['admin.calificaciones.store', $cursos->id, $curso_alumno->id], 'method'=>'POST']) !!}

					<td>{{$curso_alumno->carnet}}</td>
					<td>{{$curso_alumno->nombres . " " . $curso_alumno->apellidos}}</td>
					<td>{{$cursos->id}}</td>

					<td><div class="form-group">
						{!!Form::text('bim1',null,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
							{!!Form::text('bim2',null,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::text('bim3',null,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td><div class="form-group">
								{!!Form::text('bim4',null,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div></td>

					<td>
						<div class="form-group">
						{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
						{!!Form::close()!!}
						</div>
					</td>

			</tr>
				@endif
				@endforeach


	</tbody>

</table>
@else
<h3 class="text-center">Alumnos sin  notas</h3>
<table class="table table-striped">
	<thead>
		<th>Carnet</th>
		<th>Alumno</th>
		<th>Curso_id</th>
		<th class="col-sm-1">Bim1</th>
		<th class="col-sm-1">Bim2</th>
		<th class="col-sm-1">Bim3</th>
		<th>Acción</th>
	</thead>
	<tbody>
<tr>
@foreach($cursos_alumnos as $curso_alumno)

				@if($curso_alumno->grado_id==$grados->id)

				{!!Form::open(['route'=>['admin.calificaciones.store', $cursos->id, $curso_alumno->id], 'method'=>'POST']) !!}

				<td>{{$curso_alumno->carnet}}</td>
				<td>{{$curso_alumno->nombres . " " . $curso_alumno->apellidos}}</td>
				<td>{{$cursos->id}}</td>

				<td><div class="form-group">
					{!!Form::text('bim1',null,['class'=>'form-control','placeholder'=> '', ''])!!}
				</div></td>

				<td><div class="form-group">
						{!!Form::text('bim2',null,['class'=>'form-control','placeholder'=> '', ''])!!}
				</div></td>

				<td><div class="form-group">
							{!!Form::text('bim3',null,['class'=>'form-control','placeholder'=> '', ''])!!}
				</div></td>

				<td>
					<div class="form-group">
					{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
					{!!Form::close()!!}
					</div>
				</td>

		</tr>
			@endif
			@endforeach


</tbody>

</table>
@endif
{!!Form::open(['route'=>['admin.calificaciones.destroy',':ALUMNOID', ':CURSOID'], 'method'=>'DELETE', 'id'=>'form-delete'])!!}
{!!Form::close()!!}

{!!Form::open(['route'=>['admin.calificaciones.update', ':ALUMNOID', ':CURSOID'], 'method'=>'PUT', 'id'=>'form-update']) !!}
{!!Form::close()!!}

@endsection

@section('scripts')
<script>
$(document).ready(function(){
	$('.btn-delete2').click(function(e){
		e.preventDefault();
		var row=$(this).parents('tr');
		var alumnoid= row.data('alumnoid');
		var cursoid=row.data('cursoid');
		var form=$('#form-delete');
		var url=form.attr('action').replace(':ALUMNOID',alumnoid). replace(':CURSOID', cursoid);
		var data=form.serialize();
		row.fadeOut();
		$.post(url,data, function(result)
		{
			alert(result);
		});
	});
});
</script>
@endsection
