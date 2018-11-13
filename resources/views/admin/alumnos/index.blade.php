@extends ('admin.template.main')
@section('title', 'Listado de Alumnos')
@section('content')
<a href="{{route('admin.alumnos.create')}}" class="btn btn-info">Nuevo alumno</a><br><br>
<!--Buscador-->
	{!!Form::model(Request::all(),['route'=>'admin.alumnos.index','method'=>'GET', 'class'=>'navbar-form pull-left'])!!}
	 Buscar: <div class="input-group">
		  {!!Form::text('nombres', null, ['class'=>'form-control', 'placeholder'=>'Nombre o Carné'])!!}
			 <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
	 		 </div>
	por Grado: <div class="input-group">
		{!!Form::select('grado_id', $grados,null,['class'=>'form-control', 'placeholder'=>'Seleccione un Grado'])!!}	
	</div>
	{!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
    {!!Form::close()!!}
<br><br><br>
@include('flash::message')
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<th>No.</th>
			<th class="col-sm-2">Apellidos</th>
			<th class="col-sm-2">Nombres</th>
			<th>Carné</th>
			<th class="col-sm-1">Encargado</th>
			<th>Telefono</th>
			<th class="col-sm-3">Grado</th>
			<th class="col-sm-3">Acción</th>
		</thead>
		<tbody>
			
			@foreach($alumnos as $alumno)
			<tr>
					<td>{{ $contador }}</td> <?php $contador++; ?>
					<td>{{$alumno->apellidos}}</td>
					<td>{{$alumno->nombres}}</td>
					<td>{{$alumno->carnet}}</td>
					<td>{{$alumno->encargado}}</td>
					<td>{{$alumno->telefono}}</td>
					<td width=400>{{$alumno->grado->grado . " " . $alumno->grado->nombre}}</td>
					<td>
						@if(Auth::user()->admin() OR Auth::user()->secretaria())
						<a href="{{route('admin.alumnos.edit', $alumno->id)}}" class="btn btn-primary glyphicon glyphicon-pencil" title="Editar">
						</a>
						@endif
						@if(Auth::user()->admin() OR Auth::user()->secretaria())
						<a href="{{route('admin.alumnos.destroy', $alumno->id)}}" onclick="return confirm ('Seguro que deseas elimnarlo?')" class="btn btn-danger glyphicon glyphicon-remove" title="Eliminar"></a>
						@endif
						@if(Auth::user()->admin() OR Auth::user()->contador())
						<a href="{{route('admin.colegiaturas.detalles', $alumno->id)}}" class="btn btn-info glyphicon glyphicon-usd" title="Colegiaturas"></a>
						@endif
						@if(Auth::user()->admin() OR Auth::user()->secretaria() OR Auth::user()->director() OR Auth::user()->contador())
						<a href="{{route('admin.boleta', $alumno->id)}}" class="btn btn-success glyphicon glyphicon-education" title="Boleta de Calificaciones"></a>
						<a href="{{route('admin.alumnos.compromiso', $alumno->id)}}" class="btn btn-warning glyphicon glyphicon-file" title="Compromiso de Estudios"></a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
	{!!$alumnos->appends(Request::all())->render()!!}
@endsection
