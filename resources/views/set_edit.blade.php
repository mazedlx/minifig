@extends('layouts.master')
@section('title', 'sets')

@section('content')
<div class="row">
{!! Form::model($set, array('route' => array('sets.update', $set->id), 'method' => 'PUT', 'class' => 'form form-horizontal', 'files' => true)) !!}
	<div class="form-group">
		{!! Form::label('name', 'Name', array('class' => 'col-md-2 control-label')) !!}
		<div class="col-md-6">
			{!! Form::text('name', $set->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name')) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('number', 'Number', array('class' => 'col-md-2 control-label')) !!}
		<div class="col-md-6">
			{!! Form::text('number', $set->number, array('id' => 'number', 'class' => 'form-control', 'placeholder' => 'Name')) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('file', 'file', array('class' => 'col-md-2 control-label')); !!}
		<div class="col-md-6">
			{!! Form::file('file[]', array('class' => 'form-control', 'multiple' => 'multiple')); !!}
		</div>
	</div>	
	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
{!!Form::close()!!}
</div>
<div class="row">
{!! Form::open(array('url' => 'sets/' . $set->id, 'method' => 'DELETE', 'class' => 'form form-horizontal')) !!}
	<div class="form-group">
		<div class="col-md-6 col-md-offset-2">
    	{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
    </div>
{!! Form::close() !!}
</div>
@endsection