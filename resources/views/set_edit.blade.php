@extends('layouts.master')
@section('title', 'sets')

@section('content')
<div class="row">
{!! Form::model($set, ['route' => ['sets.update', $set->id], 'method' => 'PATCH', 'class' => 'form form-horizontal', 'files' => true]) !!}
	@include('errors.form')
	@include('_set', ['labelSubmitButton' => 'Edit'])
{!!Form::close()!!}
</div>
<div class="row">
{!! Form::open(['url' => 'sets/' . $set->id, 'method' => 'DELETE', 'class' => 'form form-horizontal']) !!}
	<div class="form-group">
		<div class="col-md-6 col-md-offset-2">
    	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    </div>
{!! Form::close() !!}
</div>
 @stop
