@extends('layouts.master')
@section('title', 'Sets')

@section('content')
<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Number</th>
				<th>Image</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<tbody>
		@foreach($sets as $key => $set)
			<tr>
				<td>{{ $set->id }}</td>
				<td>{{ $set->name }}</td>
				<td>{{ $set->number }}</td>
				@if($set->filename) 
					<td><a href="{{ URL::to('sets/' . $set->id) }}">{!! HTML::image('uploads/' . $set->filename, '', array('class' => 'img img-thumbnail', 'width' => '150px')) !!}</a></td>
				@else
					<td>No Set Picture</td>
				@endif
				<td><a href="{{ URL::to('sets/' . $set->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="edit"></span></td>
			</tr>
		@endforeach	
		</tbody>
	</table>
	<a href="{{ URL::to('sets/create') }}" class="btn btn-default">Create</a>
@endsection