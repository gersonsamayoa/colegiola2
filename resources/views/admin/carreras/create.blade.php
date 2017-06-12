@extends ('admin.template.main')
@section('title', 'Crear Carrera')
@section('content')
{!! Form::open(['route'=>'admin.carreras.store', 'method'=>'POST']) !!}

<div class="form-group">
{!!Form::label('name', 'Nombre')!!}
{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>

<div class="form-group">
{!!Form::label('grado', 'Grado')!!}
{!!Form::select('grado', [''=>'Seleccione un grado','Primero'=>'Primero','Segundo'=>'Segundo','Tercero'=>'Tercero','Cuarto'=>'Cuarto','Quinto'=>'Quinto','Sexto'=>'Sexto'],null,['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.carreras.index')}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}


@endsection
