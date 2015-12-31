@extends('layouts.master')
@section('title', 'Minifigs')

@section('content')
	<h3>Name: {{ $minifig->name }}</h3>
	<h3>Set: <a href="{{ URL::to('sets/' . $minifig->set->id) }}">{{ $set->name }}</a></h3>
	<div class="row">
		<div class="col-md-3">
	@foreach($images as $image)
		{!! HTML::image('uploads/' . $image->filename, '', array('class' => 'img img-thumbnail', 'width' => '300px')) !!}
	@endforeach
		</div>
	</div>
	<a href="{{ URL::to('minifigs/' . $minifig->id . '/edit') }}" class="btn btn-default">Edit</a>
 @stop

