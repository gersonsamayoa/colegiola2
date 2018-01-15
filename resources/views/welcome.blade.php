@extends('admin.template.main')

@section('title', '')




@section('content')
<div class="jumbotron" style="background-image: url('{{asset('img/colegioctsaerio.png')}}'); background-repeat: no-repeat;
    background-position: center bottom;
    -webkit-background-size: cover;
    background-size: cover; text-shadow: 2px 2px 5px black; height: 325px; padding-top: 2cm;" >
  <h1 class="text-center"><span style="color:#ffffff;">Bienvenidos a Colegio CTS 2.0</span></h1>
  <p class="text-center" style="color:#00FFAA">Sistema de Control de Pagos y Calificaciones</p>
 </div>
 <div class="row">
<div class="col-md-6">
<h2 style="color:#e69900">Niveles</h2>
<p>En esta vista, se mostrarán todos las <span style="color:#e69900">Niveles</span> que han
sido creadas y se podrán <span style="color:#f40700">Modificar</span>, si fuese necesario.
</p>
<p><a class="btn btn-default" href="{{route('admin.niveles.index')}}" role="button">Ver Niveles &raquo;</a></p>
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
