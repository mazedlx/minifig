<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<style>
		body {
			padding-top: 60px;
		}
		</style>
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
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script>
		$(function () {
  			$('[data-toggle="tooltip"]').tooltip()
		});
		</script>
	</body>
</html>