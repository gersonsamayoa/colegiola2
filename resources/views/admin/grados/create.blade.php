@extends ('admin.template.main')
@section('title', 'Crear Grado')
@section('content')
{!! Form::open(['route'=>'admin.grados.store', 'method'=>'POST']) !!}

<div class="form-group">
{!!Form::label('name', 'Nombre')!!}
{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=> 'Nombre', 'required'])!!}
</div>

<div class="form-group">
  {!!Form::label('cantidadbimestres', 'Cantidad de bimestres')!!}
  {!!Form::text('cantidadbimestres',null,['class'=>'form-control', 'placeholder'=>'Cantidad de Bimestres','required'])!!}
</div>

<div class="form-group">
{!!Form::label('nivel_id', 'Nivel')!!}
{!!Form::select('nivel_id', $niveles, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione un Nivel', 'required'])!!}
</div>

<div class="form-group">
{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
<a class="btn btn-danger" href="{{route('admin.grados.index')}}" role="button">Cancelar</a>
</div>



{!!Form::close()!!}
@endsection
