@extends('layouts.master')
@section('title', 'Sets')

@section('content')
	<a href="{{ url()->to('sets/create') }}" class="btn btn-default">Create</a>
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
							<img src="{{ url()->to('uploads/' . $set->filename) }}" class="img img-thumbnail" width="150px">
						</a>
					</td>
				@else
					<td>No Set Picture</td>
				@endif
				<td><a href="{{ url()->to('sets/' . $set->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="edit"></span></td>
			</tr>
		@endforeach
		</tbody>
	</table>
	{{ $sets->links() }}
	<a href="{{ url()->to('sets/create') }}" class="btn btn-default">Create</a>
 @stop

