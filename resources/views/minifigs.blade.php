@extends('layouts.master')
@section('title', 'Minifigs')

@section('content')
	<a href="{{ url()->to('minifigs/create') }}" class="btn btn-default">Create</a>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Set</th>
				<th>Image</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<tbody>
		@foreach($minifigs as $key => $minifig)
			<tr>
				<td>{{ $minifig->name }}</td>
				<td>{{ $minifig->set->name }} ({{ $minifig->set->number }})</td>
				@if($minifig->images->first())
					<td>
						<a href="{{ url()->to('minifigs/' . $minifig->id) }}">
							<img src="{{ url()->to('uploads/' . $minifig->images->first()->filename) }}" class="img img-thumbnail" width="150px">
						</a>
					</td>
				@else
					<td>No Minifig Picture</td>
				@endif
				<td><a href="{{ url()->to('minifigs/' . $minifig->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="left" title="edit"></span></a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<a href="{{ url()->to('minifigs/create') }}" class="btn btn-default">Create</a>
	<nav>
	{!! $minifigs->render() !!}
	</nav>
 @stop

