@extends ('admin.template.main')
@section('title', 'Detalle de Colegiaturas de: ')
@section('content')

<a href="{{route('admin.colegiaturas.show')}}" class="btn btn-info">Nuevo Pago</a>
<hr>
<!--Buscador de Tags-->
	 {!!Form::open(['route'=>'admin.colegiaturas.consultagrado','method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
		Filtrar por grado: <div class="input-group">
		{!!Form::select('carrera_id', $carreras,null,['class'=>'form-control', 'placeholder'=>'Seleccione Una Carrera'])!!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	</div>
	{!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
	<hr>
	<br>
	<br>
@include('flash::message')
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Pago 1</th>
			<th>Pago 2</th>
			<th>Pago 3</th>
			<th>Pago 4</th>
			<th>Pago 5</th>
			<th>Pago 6</th>
			<th>Pago 7</th>
			<th>Pago 8</th>
			<th>Pago 9</th>
			<th>Pago 10</th>
			<th>Pago 11</th>
			<th>Pago 12</th>
		</thead>
		<tbody>


			@foreach($groupcolegiaturas as $alumnos)

							@foreach($alumnos as $alumno)
              <tr>
							<td><strong>{{$alumno->nombres}} </strong>

                  @foreach($colegiaturas as $colegiatura)
	                  	@if($colegiatura->alumno->nombres==$alumno->nombres)
		        						<td>{{$colegiatura->mes}}
			                 @endif
		                		</td>
		            </td>
		            @endforeach
            		</tr>
								@endforeach

			@endforeach
		</tbody>

	</table>

@endsection
