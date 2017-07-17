@extends('layouts.app')
@section('title', 'Minifigs')

@section('content')
	<a href="{{ url()->to('minifigs/create') }}" class="btn btn-primary">
		<i class="fa fa-fw fa-plus"></i> Create a new minifig
	</a>

	<hr>

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
				<td>
					<a
						href="{{ url()->to('minifigs/' . $minifig->id . '/edit') }}"
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
			{!! $minifigs->render() !!}
		</div>
	</div>
@stop

