@extends('layouts.master')
@section('title', 'Minifigs')

@section('content')
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Set</th>
				<th>Image</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<tbody>
		@foreach($minifigs as $key => $minifig)
			<tr>
				<td>{{ $minifig->id }}</td>
				<td>{{ $minifig->name }}</td>
				<td>{{ $minifig->set->name }} ({{ $minifig->set->number }})</td>
				@if($minifig->images->first())
					<td><a href="{{ URL::to('minifigs/' . $minifig->id) }}">{!! HTML::image('uploads/' . $minifig->images->first()->filename, '', array('class' => 'img img-thumbnail', 'width' => '150px')) !!}</a></td>
				@else
					<td>No Minifig Picture</td>
				@endif
				<td><a href="{{ URL::to('minifigs/' . $minifig->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="edit"></span></a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<a href="{{ URL::to('minifigs/create') }}" class="btn btn-default">Create</a>
 @stop

