@extends ('admin.template.main')
@section('title', 'Consulta de Colegiaturas ')
@section('content')

<!--Buscador-->
	{!!Form::open(['route'=>'admin.colegiaturas.consultagrado','method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
	 Buscar por Nombre: <div class="input-group">
		 {!!Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Buscar alumno..', 'aria-describedby'=>'search'])!!}
			 <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	 </div>
		Buscar por Grado: <div class="input-group">
		{!!Form::select('grado_id', $grados,null,['class'=>'form-control', 'placeholder'=>'Seleccione un Grado'])!!}
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
			@foreach($meses as $mes)
			<th>{{$mes}}</th>
			@endforeach
		</thead>
		<tbody>
			@foreach($groupcolegiaturas as $alumnos)
			@foreach($alumnos as $alumno)
	        <tr>
			<td>{{$alumno->nombres . " " . $alumno->apellidos}}
		        @foreach($colegiaturas as $colegiatura)
			    @if($colegiatura->alumno->nombres==$alumno->nombres)
				<td><a href="{{ route('admin.colegiaturas.alumnocolegiatura', $colegiatura->id) }}" target="_blank">
				{{$colegiatura->mes->nombre}}</a></td>
				@endif
				@endforeach
			</td>
	        </tr>
			@endforeach
			@endforeach
		</tbody>

	</table>

@endsection
