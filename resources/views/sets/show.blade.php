@extends('layouts.app')

@section('content')
<div class="col-md-6">
	<div class="card">
		<img class="card-img-top" src="{{ url("/storage/{$set->filename}") }}" alt="{{ $set->name }}">
		<h4 class="card-header">
			{{ $set->name }} ({{ $set->number }}) <a href="{{ url("/sets/{$set->id}/edit") }}" class="btn btn-default">Edit</a>
		</h4>
		<div class="card-body">
			<p class="card-text">Minifigs belonging to this set:</p>
			<table class="table table-striped table-sm">
				<thead>
					<tr>
						<th>Name</th>
						<th>Image</th>
					</tr>
				</thead>
				<tbody>
				@forelse($minifigs as $minifig)
					<tr>
						<td><a href="{{ url("/minifigs/{$minifig->id}") }}">{{ $minifig->name }}</a></td>
						<td>
							<a href="{{ url()->to('/minifigs/' . $minifig->id) }}">
							@if($minifig->images->count() > 0)
								<img src="{{ url("/storage/{$minifig->images()->first()->filename}") }}" class="rounded" width="150px" alt="{{ $minifig->name }}">
							@endif
							</a>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="3">No sets belonging to this set.</td>
					</tr>
				@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
	@stop
