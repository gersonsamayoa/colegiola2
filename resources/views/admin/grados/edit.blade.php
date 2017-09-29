@extends ('admin.template.main')
@section('title', 'Editar '. $grados->nombre)
@section('content')
{!! Form::open(['route'=>['admin.grados.update', $grados], 'method'=>'PUT']) !!}

<div class="form-group">
{!!Form::label('name', 'Nuevo Grado')!!}
{!!Form::text('nombre',$grados->nombre,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>

<div class="form-group">
{!!Form::label('nivel_id', 'Nivel')!!}
{!!Form::select('nivel_id', $niveles, $grados->nivel_id, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'required'])!!}
</div>

<div class="form-group">
{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.grados.index')}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}


@endsection
