@extends ('admin.template.main')
@section('title', 'Listado de Cursos')
@section('content')

{!!Form::model(Request::only(['Nivel', 'grado_id']),['route'=>'admin.cursos.index','method'=>'GET', ])!!}
<div class="form-group">
{!!Form::label('nivel_id', 'Nivel')!!}
{!!Form::select('Nivel', $niveles, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'id'=>'Nivel'])!!}
</div>

<div class="form-group">
{!!Form::label('grado_id', 'Grado')!!}
{!!Form::select('grado_id', $grados, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Grado'])!!}
</div>
{!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
<hr>
@include('flash::message')

	<table class="table table-striped table-hover">
		<thead>
			<th>ID</th>
			<th>Curso</th>
			<th>Grado</th>
			<th>Operaciones</th>
		</thead>
		<tbody>
			@foreach($cursos as $curso)
				<tr>
					<td>{{$curso->id}}</td>
					<td>{{$curso->nombre}}</td>
					<td>{{$curso->grado->nombre}}</td>
					<td>
						<a href="{{route('admin.calificaciones.listCalificaciones', $curso->id)}}" class="btn btn-info">Ingresar Notas</a>
						<a href="{{route('admin.cursos.edit', $curso->id)}}" class="btn btn-primary">Editar</a>
					 <a href="{{route('admin.cursos.destroy', $curso->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>

	</table>

	<a href="{{route('admin.cursos.create')}}" class="btn btn-info">Nuevo Curso</a>
	<hr>

	{!!$cursos->appends(Request::only(['Nivel', 'grado_id']))->render()!!}
	@endsection
