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
	{!!Form::label('carnet', 'Carnet')!!}
	{!!Form::text('carnet',$alumno->carnet,['class'=>'form-control','placeholder'=> 'Carnet', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('encargado', 'Encargado')!!}
	{!!Form::text('encargado',$alumno->encargado,['class'=>'form-control','placeholder'=> 'Encargado', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('telefono', 'Telefono')!!}
	{!!Form::text('telefono',$alumno->telefono,['class'=>'form-control','placeholder'=> 'Telefono', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::label('nivel_id', 'Nivel')!!}
	{!!Form::select('Nivel', $niveles, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'required', 'id'=>'Nivel'])!!}
	</div>
	
	<div class="form-group">
	{!!Form::label('grado_id', 'Grado')!!}
	{!!Form::select('grado_id', $grados, $alumno->grado_id, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Grado', 'required'])!!}
	</div>

	<div class="form-group">
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	<a class="btn btn-danger" href="{{route('admin.alumnos.index')}}" role="button">Cancelar</a>
	</div>



{!!Form::close()!!}



@endsection
