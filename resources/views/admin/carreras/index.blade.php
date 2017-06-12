@extends ('admin.template.main')
@section('title', 'Listado de Carreras')
@section('content')
<a href="{{route('admin.carreras.create')}}" class="btn btn-info">Nueva Carrera</a>
<hr>
@include('flash::message')
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Grado</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($carreras as $carrera)
				<tr>
					<td>{{$carrera->id}}</td>
					<td>{{$carrera->nombre}}</td>
					<td>{{$carrera->grado}}</td>
					<td><a href="{{route('admin.carreras.edit', $carrera->id)}}" class="btn btn-primary">Editar
					</a> <a href="{{route('admin.carreras.destroy', $carrera->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>

	</table>

	{!!$carreras->render()!!}

@endsection
