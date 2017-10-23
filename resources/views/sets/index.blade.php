@extends('layouts.app')
@section('title', 'Minifigs')

@section('content')
	<a href="{{ url("sets/create") }}" class="btn btn-primary">
		<i class="fa fa-fw fa-plus"></i> Create a new set
	</a>

	<sets-table></sets-table>
@stop

