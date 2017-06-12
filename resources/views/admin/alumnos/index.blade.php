@extends ('admin.template.main')
@section('title', 'Listado de Alumnos')
@section('content')
<a href="{{route('admin.alumnos.create')}}" class="btn btn-info">Nuevo alumno</a><br><br>
<!--Buscador de Tags-->
	 {!!Form::open(['route'=>'admin.alumnos.index','method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
	Buscar por Nombre: <div class="input-group">
		{!!Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Buscar alumno..', 'aria-describedby'=>'search'])!!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	</div>
	Filtrar por grado: <div class="input-group">
		{!!Form::select('carrera_id', $carreras,null,['class'=>'form-control', 'placeholder'=>'Seleccione Una Carrera'])!!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	</div>
	{!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
	<hr>
	<br>

@include('flash::message')
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Codigo Personal</th>
			<th>Grado</th>
			<th>Carrera</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($alumnos as $alumno)
				<tr>
					<td>{{$alumno->id}}</td>
					<td>{{$alumno->nombres}}</td>
					<td>{{$alumno->apellidos}}</td>
					<td>{{$alumno->codigopersonal}}</td>
					<td>{{$alumno->carrera->grado}}</td>
					<td>{{$alumno->carrera->nombre}}</td>
					<td><a href="{{route('admin.alumnos.edit', $alumno->id)}}" class="btn btn-primary">Editar
					</a> <a href="{{route('admin.alumnos.destroy', $alumno->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a>
					<a href="{{route('admin.colegiaturas.detalles', $alumno->id)}}" class="btn btn-info">Colegiaturas</a>
					</td>
				</tr>
			@endforeach
		</tbody>

	</table>

	{!!$alumnos->render()!!}

@endsection
