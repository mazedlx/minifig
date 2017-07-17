@extends('layouts.app')
@section('title', 'Sets')

@section('content')
	<h3>Name: {{ $set->name }}</h3>
	<h3>Number: {{ $set->number }}</h3>
		<img src="{{ url()->to('/storage/' . $set->filename) }}" class="img img-thumbnail" width="300px">
	<div class="row">
		<div class="col-md-6">
	@forelse($minifigs as $minifig)
		<h3><a href="{{ url()->to('/minifigs/' . $minifig->id) }}">{{ $minifig->name }}</a></h3>
		<a href="{{ url()->to('/minifigs/' . $minifig->id) }}">
		@if($minifig->images->count() > 0)
			<img src="{{ url()->to('/storage/' . $minifig->images()->first()->filename) }}" class="img img-thumbnail" width="300px">
		@else
			No image
		@endif
		</a>
	@empty
		<h3>No minifigs in this set</h3>
	@endforelse
		</div>
	</div>
	<a href="{{ url()->to('sets/' . $set->id . '/edit') }}" class="btn btn-default">Edit</a>
 @stop

