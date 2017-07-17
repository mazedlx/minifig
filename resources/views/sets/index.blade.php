@extends('layouts.app')
@section('title', 'Sets')

@section('content')
	<a href="{{ url()->to('sets/create') }}" class="btn btn-primary">
		<i class="fa fa-fw fa-plus"></i> Create a new set
	</a>

	<hr>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Number</th>
				<th>Image</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<tbody>
		@foreach($sets as $key => $set)
			<tr>
				<td>{{ $set->name }}</td>
				<td>{{ $set->number }}</td>
				@if($set->filename)
					<td>
						<a href="{{ url()->to('sets/' . $set->id) }}">
							<img src="{{ url()->to('/storage/' . $set->filename) }}" class="img img-thumbnail" width="150px">
						</a>
					</td>
				@else
					<td>No Set Picture</td>
				@endif
				<td>
					<a
						href="{{ url()->to('sets/' . $set->id . '/edit') }}"
						class="btn btn-default"
						data-toggle="tooltip"
						data-placement="left"
						title="edit"
					>
						<i class="fa fa-fw fa-pencil"></i>
					</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center">
			{!! $sets->render() !!}
		</div>
	</div>
 @stop

