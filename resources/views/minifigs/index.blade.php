@extends('layouts.app')

@section('content')
	<a href="{{ url("minifigs/create") }}" class="btn btn-primary">
		<i class="fa fa-fw fa-plus"></i> Create a new minifig
	</a>

	<minifigs-table></minifigs-table>
@stop

