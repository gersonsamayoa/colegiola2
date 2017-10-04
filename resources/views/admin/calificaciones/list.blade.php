@extends ('admin.template.main')
@section('title', 'Ingreso de Notas del Curso de: '. $cursos->nombre)
@section('subtitle', 'Grado: '.$grados->nombre)

@section('content')
<hr>
@include('flash::message')

	<table class="table table-striped">
		<thead>
			<th>Alumno_id</th>
			<th>Alumno</th>
      <th>Curso_id</th>
			<th>Bim1</th>
			<th>Bim2</th>
      <th>Bim3</th>
      <th>Bim4</th>
      <th>Promedio</th>
      <th>Acción</th>
		</thead>
		<tbody>
      @foreach($alumnos as $alumno)
        <tr>
          {!!Form::open(['route'=>['admin.calificaciones.store', $cursos->id, $alumno->id], 'method'=>'POST']) !!}
          <td>{{$alumno->id}}</td>
          <td>{{$alumno->nombres. " ". $alumno->apellidos}}</td>

					<div class="form-group">
						{!!Form::hidden('alumno_id',$alumno->id,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div>
					<div class="form-group">
						{!!Form::hidden('curso_id',$cursos->id,['class'=>'form-control','placeholder'=> '', ''])!!}
					</div>

					<td><div class="form-group">
						{!!Form::label('curso_id', $cursos->id)!!}
						</div></td>
          <td><div class="form-group">
          	{!!Form::text('bim1',null,['class'=>'form-control','placeholder'=> '', ''])!!}
          	</div></td>
            <td><div class="form-group">
          	{!!Form::text('bim2',null,['class'=>'form-control','placeholder'=> '', ''])!!}
          	</div></td>
            <td><div class="form-group">
          	{!!Form::text('bim3',null,['class'=>'form-control','placeholder'=> '', ''])!!}
          	</div></td>
            <td><div class="form-group">
          	{!!Form::text('bim4',null,['class'=>'form-control','placeholder'=> '', ''])!!}
          	</div></td>
            <td><div class="form-group">
          	{!!Form::text('promedio',null,['class'=>'form-control','placeholder'=> '', ''])!!}
          	</div></td>
            <td>
              <div class="form-group">
            	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
              {!!Form::close()!!}
            	</div>
            </td>
				</tr>
        @endforeach
		</tbody>

	</table>


	<hr>


	@endsection
