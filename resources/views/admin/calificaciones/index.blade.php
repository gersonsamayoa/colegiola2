@extends ('admin.template.main')
@section('title', 'Edición de Notas del Curso de: '. $cursos->id)
@section('subtitle', 'Grado: '.$grados->nombre)

@section('content')
<hr>
@include('flash::message')

	<table class="table table-striped">
		<thead>
			<th>ID</th>
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

      @foreach($calificaciones as $calificacion)

        <tr>
          {!!Form::open(['route'=>['admin.calificaciones.update', $calificacion], 'method'=>'PUT']) !!}
          <td>{{$calificacion->id}}</td>
        <td><div class="form-group">
					{!!Form::label('', $calificacion->alumno->nombres . " " . $calificacion->alumno->apellidos)!!}
					{!!Form::hidden('alumno_id',$calificacion->alumno_id,['class'=>'form-control','placeholder'=> '', 'required'])!!}
				</div></td>

					<td><div class="form-group">
						{!!Form::text('curso_id',$calificacion->curso_id,['class'=>'form-control','placeholder'=> '', 'required'])!!}</div></td>

          <td><div class="form-group">
          	{!!Form::text('bim1',$calificacion->bim1,['class'=>'form-control','placeholder'=> '', ''])!!}</div></td>

            <td><div class="form-group">
          	{!!Form::text('bim2',$calificacion->bim2,['class'=>'form-control','placeholder'=> '', ''])!!}</div></td>

            <td><div class="form-group">
          	{!!Form::text('bim3',$calificacion->bim3,['class'=>'form-control','placeholder'=> '', ''])!!}</div></td>

            <td><div class="form-group">
          	{!!Form::text('bim4',$calificacion->bim4,['class'=>'form-control','placeholder'=> '', ''])!!}</div></td>

						<td><div class="form-group">
          	{!!Form::text('promedio',$calificacion->promedio,['class'=>'form-control','placeholder'=> '', ''])!!}</div></td>

            <td><div class="form-group">
            	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
              {!!Form::close()!!}
						</div></td>

				</tr>

        @endforeach
		</tbody>

	</table>


	<hr>


	@endsection
