@extends ('admin.template.main')
@section('title', 'Editar '. $alumno->nombres)
@section('content')

{!! Form::open(['route'=>['admin.alumnos.update', $alumno], 'method'=>'PUT']) !!}

<div class="form-group">
	{!!Form::label('nombres', 'Nombres')!!}
	{!!Form::text('nombres',$alumno->nombres,['class'=>'form-control','placeholder'=> 'Nombres', 'required'])!!}
	</div>
	<div class="form-group">
	{!!Form::label('apellidos', 'Apellidos')!!}
	{!!Form::text('apellidos',$alumno->apellidos,['class'=>'form-control','placeholder'=> 'Apellidos', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('codigopersonal', 'Codigo Personal')!!}
	{!!Form::text('codigopersonal',$alumno->codigopersonal,['class'=>'form-control','placeholder'=> 'Codigo Personal', 'required'])!!}
	</div>



	<div class="form-group">
	{!!Form::label('carrera_id', 'Carrera')!!}
	{!!Form::select('carrera_id', $carreras, $alumno->carrera_id, ['class'=>'form-control', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.alumnos.index')}}" role="button">Cancelar</a>
	</div>



{!!Form::close()!!}



@endsection
