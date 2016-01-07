<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="public/images/favicon.ico">
		<title>@yield('title')</title>
		{!! HTML::style('css/bootstrap.css', [], true) !!}
		{!! HTML::script('js/jquery-2.1.4.js', [], true) !!}
		{!! HTML::script('js/bootstrap.js', [], true) !!}
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navbar-header">
  				<a class="navbar-brand" href="#">
    				<img alt="Brand" src="<?php echo asset('images/lego.png'); ?>" />
  				</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      		<ul class="nav navbar-nav">
					<li class="{{ set_active('/') }}"><a href="{{ URL::to('/') }}">Home</a></li>
					<li class="{{ set_active('minifigs') }}"><a href="{{ URL::to('minifigs') }}">Minifigs</a></li>
					<li class="{{ set_active('sets') }}"><a href="{{ URL::to('sets') }}">Sets</a></li>
					<li class=""><a href="{{ URL::to('auth/logout') }}">Logout</a></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<div class="row">
			@if (Session::has('msg'))
    		<div class="alert alert-success alert-dismissible" role="alert">{{ Session::get('msg') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
			@endif
			@yield('content')
			</div>
		</div>
		<script>
		$(function () {
  			$('[data-toggle="tooltip"]').tooltip()
		});
		</script>
	</body>
</html>
