@extends('layouts.master')
@section('title', 'Minifigs')

@section('content')
<div class="row">
{!!Form::open(array('url' => 'minifigs', 'class' => 'form form-horizontal', 'files' => true));!!}
	<div class="form-group">
		{!! Form::label('name', 'Name', array('class' => 'col-md-2 control-label')) !!}
		<div class="col-md-6">
			{!! Form::text('name', '', array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name')) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('set_id', 'Set', array('class' => 'col-md-2 control-label')); !!}
		<div class="col-md-6">
			{!! Form::select('set_id', $sets_id, '', array('class' => 'form-control')); !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('files', 'Files', array('class' => 'col-md-2 control-label')); !!}
		<div class="col-md-6">
			{!! Form::file('files[]', array('class' => 'form-control', 'multiple' => 'multiple')); !!}
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