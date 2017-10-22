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
			<tr is="minifig-table-item" :minifig="{{ $minifig }}"></tr>
		@endforeach
		</tbody>
	</table>
	<div class="d-flex justify-content-center">
		{!! $minifigs->render() !!}
	</div>
@stop

