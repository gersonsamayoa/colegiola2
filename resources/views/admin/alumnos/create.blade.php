@extends ('admin.template.main')

@section('title', 'Agregar Alumnos')

@section('content')

	@if(count($errors)>0)
	<div class="alert alert-danger" role="alert">
		<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
	@endif

{!!Form::open(['route'=>'admin.alumnos.store', 'method'=>'POST']) !!}
	<div class="form-group">
	{!!Form::label('nombres', 'Nombres')!!}
	{!!Form::text('nombres',null,['class'=>'form-control','placeholder'=> 'Nombres', 'required'])!!}
	</div>
	<div class="form-group">
	{!!Form::label('apellidos', 'Apellidos')!!}
	{!!Form::text('apellidos',null,['class'=>'form-control','placeholder'=> 'Apellidos', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('codigopersonal', 'Codigo Personal')!!}
	{!!Form::text('codigopersonal',null,['class'=>'form-control','placeholder'=> 'Codigo Personal', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('carrera_id', 'Carrera')!!}
	{!!Form::select('carrera_id', $carreras, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione una Carrera', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.alumnos.index')}}" role="button">Cancelar</a>
	</div>

{!!Form::close()!!}

@endsection
