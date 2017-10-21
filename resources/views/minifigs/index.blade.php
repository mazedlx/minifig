@extends('layouts.app')
@section('title', 'Minifigs')

@section('content')
	<a href="{{ url("minifigs/create") }}" class="btn btn-primary">
		<i class="fa fa-fw fa-plus"></i> Create a new minifig
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
		@foreach($minifigs as $key => $minifig)
			<tr>
				<td>
					<a href="{{ url("/minifigs/{$minifig->id}") }}">{{ $minifig->name }}</a>
				</td>
				<td>
					<a href="{{ url("/minifigs/{$minifig->id}") }}">{{ $minifig->set->name }} ({{ $minifig->set->number }})</a>
				</td>
			@if($minifig->images->first())
				<td>
					<a href="{{ url("minifigs/{$minifig->id}") }}">
						<img src="{{ url("/storage/{$minifig->images->first()->filename}") }}" class="rounded" width="200px">
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
		{!! $minifigs->render() !!}
	</div>
@stop

