@extends('layouts.master')
@section('title', 'Minifigs')

@section('content')
	<h3>Name: {{ $minifig->name }}</h3>
	<h3>Set: <a href="{{ url()->to('sets/' . $minifig->set->id) }}">{{ $set->name }}</a></h3>
	<div class="row">
		<div class="col-md-3">
	@foreach($images as $image)
		<img src="{{ url()->to('/storage/' . $image->filename) }}" class="img img-thumbnail" width="300px">
	@endforeach
		</div>
	</div>
	<a href="{{ url()->to('minifigs/' . $minifig->id . '/edit') }}" class="btn btn-default">Edit</a>
 @stop

