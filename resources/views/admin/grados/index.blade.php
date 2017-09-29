@extends ('admin.template.main')
@section('title', 'Listado de grados')
@section('content')
<a href="{{route('admin.grados.create')}}" class="btn btn-info">Nuevo Grado</a>
<hr>
@include('flash::message')
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Grados</th>
			<th>Nivel</th>
			<th>Carrera</th>
			<th>Operaciones</th>
		</thead>
		<tbody>
			@foreach($grados as $grado)
				<tr>
					<td>{{$grado->id}}</td>
					<td>{{$grado->nombre}}</td>
					<td>{{$grado->nivel->nombre}}</td>
					<td><a href="{{route('admin.grados.edit', $grado->id)}}" class="btn btn-primary">Editar
					</a> <a href="{{route('admin.grados.destroy', $grado->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>

	</table>

	{!!$grados->render()!!}
	@endsection
