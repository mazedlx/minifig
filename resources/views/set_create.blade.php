@extends('layouts.master')
@section('title', 'Sets')

@section('content')
<div class="row">
{!!Form::open(array('url' => 'sets', 'class' => 'form form-horizontal', 'files' => true));!!}
	<div class="form-group">
		{!! Form::label('name', 'Name', array('class' => 'col-md-2 control-label')) !!}
		<div class="col-md-6">
			{!! Form::text('name', '', array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name')) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('number', 'Number', array('class' => 'col-md-2 control-label')) !!}
		<div class="col-md-6">
			{!! Form::text('number', '', array('id' => 'number', 'class' => 'form-control', 'placeholder' => 'Number')) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('file', 'Files', array('class' => 'col-md-2 control-label')); !!}
		<div class="col-md-6">
			{!! Form::file('file', array('class' => 'form-control', 'multiple' => 'multiple')); !!}
		</div>
	</div>	
	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">
			<button type="submit" class="btn btn-primary">Create</button>
		</div>
	</div>
{!!Form::close()!!}
</div>
@endsection