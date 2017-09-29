@extends ('admin.template.main')

@section('title', 'Agregar Cursos')

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

{!!Form::open(['route'=>'admin.cursos.store', 'method'=>'POST']) !!}
	<div class="form-group">
	{!!Form::label('nombre', 'Nombre del Curso')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=> 'Nombres', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('nivel_id', 'Nivel')!!}
	{!!Form::select('Nivel', $niveles, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'id'=>'Nivel'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('grado_id', 'Grado')!!}
	{!!Form::select('grado_id', $grados, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Grado', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.cursos.index')}}" role="button">Cancelar</a>
	</div>

{!!Form::close()!!}

@endsection
