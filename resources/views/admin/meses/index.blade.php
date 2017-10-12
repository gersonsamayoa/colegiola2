@extends ('admin.template.main')
@section('title', 'Listado de Carreras')
@section('content')
<a href="{{route('admin.meses.create')}}" class="btn btn-info">Nuevo Mes</a>
<hr>
@include('flash::message')
	<table class="table table-striped table-hover">
		<thead>
			<th>ID</th>
			<th>Mes</th>
			<th>Operaciones</th>
		</thead>
		<tbody>
			@foreach($meses as $mes)
				<tr>
					<td>{{$mes->id}}</td>
					<td>{{$mes->nombre}}</td>
					<td><a href="{{route('admin.meses.edit', $mes->id)}}" class="btn btn-primary">Editar
					</a> <a href="{{route('admin.meses.destroy', $mes->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>

	</table>

	{!!$meses->render()!!}

@endsection
