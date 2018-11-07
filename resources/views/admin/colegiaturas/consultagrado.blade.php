@extends ('admin.template.main')
@section('title', 'Consulta de Colegiaturas ')
@section('content')

<!--Buscador-->
	{!!Form::model(Request::all(),['route'=>'admin.colegiaturas.consultagrado','method'=>'GET', 'class'=>'navbar-form pull-left'])!!}
	 Buscar: <div class="input-group">
		 {!!Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Nombre o Carné', 'aria-describedby'=>'search'])!!}
			 <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	 </div>
		por Grado: <div class="input-group">
		{!!Form::select('grado_id', $grados,null,['class'=>'form-control', 'placeholder'=>'Seleccione un Grado'])!!}
	</div>
	{!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
	<br>
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
			@foreach($alumnos as $alumno)
	        <tr>
			<td>{{$alumno->nombres . " " . $alumno->apellidos}}</td>
		        @foreach($colegiaturas as $colegiatura)
		        
			    @if($colegiatura->alumno_id==$alumno->id)

			    	@foreach($meses as $mes)
			    		@if($mes==$colegiatura->mes->nombre)
						  <td><a href="{{route('admin.colegiaturas.detalles', $alumno->id)}}" target="_blank">
							{{$colegiatura->mes->nombre}}
							</a></td>
							@break
						@endif
					@endforeach
				@endif
				@endforeach
		
	        </tr>
			@endforeach
	
		</tbody>

	</table>

@endsection
