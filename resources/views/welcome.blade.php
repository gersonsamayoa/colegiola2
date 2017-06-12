@extends('admin.template.main')

@section('title', '') 


@section('content')
<div class="jumbotron">
  <h1 class="text-center"><span style="color:#2e6da4">Bienvenidos a Colegio CTS</span></h1>
  <p class="text-center">Sistema de Control de Pagos</p>
 </div>
 <div class="row">
<div class="col-md-6">
<h2 style="color:#e69900">Carreras</h2>
<p>En esta vista, se mostrarán todos las <span style="color:#e69900">Carreras</span> que han
sido creadas y se podrán <span style="color:#f40700">Modificar</span>, si fuese necesario.
</p>
<p><a class="btn btn-default" href="{{route('admin.carreras.index')}}" role="button">Ver Carreras &raquo;</a></p>
</div>
<div class="col-md-6">
<h2 style="color:#f40700">Alumnos</h2>
<p>En esta vista, se mostrarán todos los <span style="color:#f40700">Alumnos</span> que han
sido creados y se podrán <span style="color:#f40700">Modificar</span>, si fuese necesario.
</p>
<a class="btn btn-default" href="{{route('admin.alumnos.index')}}" role="
button">Ver Alumnos &raquo;</a></p>
</div>

</div>
<hr>

@endsection



