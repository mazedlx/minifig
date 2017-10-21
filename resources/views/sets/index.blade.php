@extends('layouts.app')
@section('title', 'Sets')

@section('content')
	<a href="{{ url("sets/create") }}" class="btn btn-primary">
		<i class="fa fa-fw fa-plus"></i> Create a new set
	</a>

	<table class="table table-striped table-sm mt-3">
		<thead>
			<tr>
				<th>Name</th>
				<th>Number</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
		@foreach($sets as $set)
			<tr>
				<td>
					<a href="{{ url("/sets/{$set->id}") }}">{{ $set->name }}</a>
				</td>
				<td>
					<a href="{{ url("/sets/{$set->id}") }}">{{ $set->number }}</a>
				</td>
				@if($set->filename)
					<td>
						<a href="{{ url("sets/{$set->id}") }}">
							<img src="{{ url("/storage/{$set->filename}") }}" class="rounded" width="200px">
						</a>
					</td>
				@else
					<td>No picture</td>
				@endif
			</tr>
		@endforeach
		</tbody>
	</table>
	<div class="d-flex justify-content-center">
		{!! $sets->render() !!}
	</div>
 @stop

