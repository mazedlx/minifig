@extends('layouts.app')
@section('title', 'Minifigs')

@section('content')
	<a href="{{ url("sets/create") }}" class="btn btn-primary">
		<i class="fa fa-fw fa-plus"></i> Create a new set
	</a>

	<table class="table table-striped table-sm mt-3">
		<thead>
			<tr>
				<th>Name</th>
				<th>Set</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
		@foreach($sets as $key => $set)
			<tr is="set-table-item" :set="{{ $set }}"></tr>
		@endforeach
		</tbody>
	</table>
	<div class="d-flex justify-content-center">
		{!! $sets->render() !!}
	</div>
@stop

