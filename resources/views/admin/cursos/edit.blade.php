@extends ('admin.template.main')
@section('title', 'Editar '. $cursos->nombre)
@section('content')
{!! Form::open(['route'=>['admin.cursos.update', $cursos], 'method'=>'PUT']) !!}

<div class="form-group">
{!!Form::label('name', 'Nuevo Curso')!!}
{!!Form::text('nombre',$cursos->nombre,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>

<div class="form-group">
{!!Form::label('nivel_id', 'Nivel')!!}
{!!Form::select('Nivel', $niveles, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'id'=>'Nivel'])!!}
</div>

<div class="form-group">
{!!Form::label('grado_id', 'Grado')!!}
{!!Form::select('grado_id', $grados, $cursos->grado_id, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Grado', 'required'])!!}
</div>

<div class="form-group">
{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.grados.index')}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}


@endsection
