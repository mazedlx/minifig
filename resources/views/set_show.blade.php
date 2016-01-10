@extends('layouts.master')
@section('title', 'Sets')

@section('content')
	<h3>Name: {{ $set->name }}</h3>
	<h3>Number: {{ $set->number }}</h3>
		<img src="{{ url()->to('uploads/' . $set->filename) }}" class="img img-thumbnail" width="300px">
	<div class="row">
		<div class="col-md-6">
	@foreach($minifigs as $minifig)
		<h3><a href="{{ url()->to('minifigs/' . $minifig->id) }}">{{ $minifig->name }}</a></h3>
		<a href="{{ url()->to('minifigs/' . $minifig->id) }}">
			<img src="{{ url()->to('uploads/' . $minifig->images->first()->filename) }}" class="img img-thumbnail" width="300px">
		</a>
	@endforeach
		</div>
	</div>
	<a href="{{ url()->to('sets/' . $set->id . '/edit') }}" class="btn btn-default">Edit</a>
 @stop

