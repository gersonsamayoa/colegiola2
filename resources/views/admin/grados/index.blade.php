@extends ('admin.template.main')
@section('title', 'Listado de grados')
@section('content')
<a href="{{route('admin.grados.create')}}" class="btn btn-info">Nuevo Grado</a>
<hr>
@include('flash::message')
	<table class="table table-striped table-hover">
		<thead>
			<th>ID</th>
			<th>Grados</th>
			<th>CantidadBimestres</th>
			<th>Nivel</th>
			<th>Operaciones</th>
		</thead>
		<tbody>
			@foreach($grados as $grado)
				<tr>
					<td>{{$grado->id}}</td>
					<td>{{$grado->nombre}}</td>
					<td>{{$grado->cantidadbimestres}}</td>
					<td>{{$grado->nivel->nombre}}</td>
					<td><a href="{{route('admin.grados.edit', $grado->id)}}" class="btn btn-primary">Editar
					</a> <a href="{{route('admin.grados.destroy', $grado->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a>
					<a href="{{route('admin.grados.boleta', $grado->id)}}" class="btn btn-success glyphicon glyphicon-education" title="Imprimir Boletas de Calificaciones"></a></td>
				</tr>
			@endforeach
		</tbody>

	</table>

	{!!$grados->render()!!}
	@endsection
