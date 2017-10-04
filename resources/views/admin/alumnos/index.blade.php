@extends ('admin.template.main')
@section('title', 'Listado de Alumnos')
@section('content')
<a href="{{route('admin.alumnos.create')}}" class="btn btn-info">Nuevo alumno</a><br><br>
<!--Buscador-->
	{!!Form::open(['route'=>'admin.alumnos.index','method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
	 Buscar por Nombre: <div class="input-group">
		 {!!Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Buscar alumno..', 'aria-describedby'=>'search'])!!}
			 <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	 </div>
		Buscar por Grado: <div class="input-group">
		{!!Form::select('grado_id', $grados,null,['class'=>'form-control', 'placeholder'=>'Seleccione un Grado'])!!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	</div>
	{!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
<br><br><br>
@include('flash::message')
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Apellidos</th>
			<th>Nombres</th>
			<th>Carnet</th>
			<th>Encargado</th>
			<th>Telefono</th>
			<th>Grado</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($alumnos as $alumno)
			<tr>
					<td>{{$alumno->id}}</td>
					<td>{{$alumno->apellidos}}</td>
					<td>{{$alumno->nombres}}</td>
					<td>{{$alumno->carnet}}</td>
					<td>{{$alumno->encargado}}</td>
					<td>{{$alumno->telefono}}</td>
					<td width=400>{{$alumno->grado->nombre}}</td>
					<td><a href="{{route('admin.alumnos.edit', $alumno->id)}}" alt="Agregar" class="btn btn-primary">Editar
					</a> <a href="{{route('admin.alumnos.destroy', $alumno->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a>
					<a href="{{route('admin.colegiaturas.detalles', $alumno->id)}}" class="btn btn-info">Colegiaturas</a>
					</td>
				</tr>
			@endforeach
		</tbody>

	</table>

	{!!$alumnos->render()!!}


@endsection
