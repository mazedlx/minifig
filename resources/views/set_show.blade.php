@extends('layouts.master')
@section('title', 'Sets')

@section('content')	
	<h3>Name: {{ $set->name }}</h3>
	<h3>Number: {{ $set->number }}</h3>
	{!! HTML::image('uploads/' . $set->filename, '', array('class' => 'img img-thumbnail', 'width' => '300px')) !!}
	<div class="row">
		<div class="col-md-6">
	@foreach($minifigs as $minifig)
		<h3><a href="{{ URL::to('minifigs/' . $minifig->id) }}">{{ $minifig->name }}</a></h3>
		<a href="{{ URL::to('minifigs/' . $minifig->id) }}">{!! HTML::image('uploads/' . $minifig->images->first()->filename, '', array('class' => 'img img-thumbnail', 'width' => '300px')) !!}</a>
	@endforeach
		</div>
	</div>
	<a href="{{ URL::to('sets/' . $set->id . '/edit') }}" class="btn btn-default">Edit</a>
@endsection