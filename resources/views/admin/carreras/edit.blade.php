@extends ('admin.template.main')
@section('title', 'Editar '. $carrera->nombre)
@section('content')
{!! Form::open(['route'=>['admin.carreras.update', $carrera], 'method'=>'PUT']) !!}

<div class="form-group">
{!!Form::label('name', 'Nuevo Nombre')!!}
{!!Form::text('nombre',$carrera->nombre,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>

<div class="form-group">
{!!Form::label('grado', 'Grado')!!}
{!!Form::select('grado', ['Primero'=>'Primero','Segundo'=>'Segundo','Tercero'=>'Tercero','Cuarto'=>'Cuarto','Quinto'=>'Quinto','Sexto'=>'Sexto'],$carrera->grado,['class'=>'form-control', 'required'])!!}
</div>

<div class="form-group">
{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.carreras.index')}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}


@endsection
