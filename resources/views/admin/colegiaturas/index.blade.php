@extends ('admin.template.main')
@section('title', 'Detalle de Colegiaturas de: '. $alumno->nombres . ' ' . $alumno->apellidos)
@section('content')

<a href="{{route('admin.colegiaturas.create', $alumno->id)}}" class="btn btn-info">Nuevo Pago</a>
<hr>
@include('flash::message')
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Fecha</th>
			<th>Nit</th>
			<th>Nombre</th>
			<th width="5">Num. de Documento</th>
			<th width="5">Num. de Factura</th>
			<th>Mes</th>
			<th>Monto</th>
			<th>Descripción</th>
			<th>Alumno</th>
			<th>Operaciones</th>
		</thead>
		<tbody>
			@foreach($colegiaturas as $colegiatura)
				<tr>
					<td>{{$colegiatura->id}}</td>
					<td>{{date("d-m-Y", strtotime($colegiatura->fecha))}}</td>
					<td>{{$colegiatura->nit}}</td>
					<td>{{$colegiatura->nombre}}</td>
					<td>{{$colegiatura->numerodocumento}}</td>
					<td>{{$colegiatura->numerofactura}}</td>
					<td>{{$colegiatura->mes->nombre}}</td>
					<td>Q{{number_format($colegiatura->monto, '2','.' , ',')}}</td>
					<td width="175px">{{$colegiatura->descripcion}}</td>
					<td>{{$colegiatura->alumno->nombres . " ". $colegiatura->alumno->apellidos}}</td>

					<td><a href="{{route('admin.colegiaturas.edit', $colegiatura->id)}}" class="btn btn-primary">Editar
					</a> <a href="{{route('admin.colegiaturas.destroy', $colegiatura->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger">Eliminar</a>
					<a href="{{route('admin.pdf', $colegiatura->id)}}" class="btn btn-primary">Imprimir
					</a>
					</td>
				</tr>
			@endforeach
		</tbody>

	</table>





	{!!$colegiaturas->render()!!}


@endsection
