@extends('layouts.master')
@section('title', 'Minifigs')

@section('content')
	<a href="{{ url()->to('minifigs/create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Create a new minifig</a>
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
							<img src="{{ url()->to('/storage/' . $minifig->images->first()->filename) }}" class="img img-thumbnail" width="150px">
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
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!! $minifigs->render() !!}
		</div>
	</div>
@stop
