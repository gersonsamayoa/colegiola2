<!DOCTYPE html>
<html>
<head>
	<title>@yield ('title', 'Home') | Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">

</head>
<body>
@include('admin.partials.nav')
	<div class="container">
	<h2>@yield('title')</h2>
	<h2>@yield('subtitle')</h2>
	</div>

<section class="container">
	@yield('content')
</section>

<script src="{{asset ('plugins/jquery/jquery.js')}}"></script>
<script src="{{asset ('plugins/jquery/dropdown.js')}}"></script>
<script src="{{asset ('plugins/bootstrap/js/bootstrap.js')}}"></script>

</body>

<footer>
<p class="text-center">&copy; 2017 Sistema Realizado por <a href="#">Tech-Tools </a>.</p>
</footer>
</html>
