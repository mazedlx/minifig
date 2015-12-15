@extends('layouts.master')
@section('title', 'Minifigs')

@section('content')
<div class="row">
{!! Form::model($minifig, array('route' => array('minifigs.update', $minifig->id), 'method' => 'PUT', 'class' => 'form form-horizontal', 'files' => true)) !!}
	<div class="form-group">
		{!! Form::label('name', 'Name', array('class' => 'col-md-2 control-label')) !!}
		<div class="col-md-6">
			{!! Form::text('name', $minifig->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name')) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('set_id', 'Set', array('class' => 'col-md-2 control-label')); !!}
		<div class="col-md-6">
			{!! Form::select('set_id', $sets_id, $minifig->set_id, array('class' => 'form-control')); !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::label('files', 'Files', array('class' => 'col-md-2 control-label')); !!}
		<div class="col-md-6">
			{!! Form::file('files[]', array('class' => 'form-control', 'multiple' => 'multiple')); !!}
		</div>
	</div>	
	<div class="form-group">
		<div class="col-md-6 col-md-offset-2">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</div>
{!!Form::close()!!}
</div>
<div class="row">
{!! Form::open(array('url' => 'minifigs/' . $minifig->id, 'method' => 'DELETE', 'class' => 'form form-horizontal')) !!}
	<div class="form-group">
		<div class="col-md-6 col-md-offset-2">
    	{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
    </div>
{!! Form::close() !!}
</div>
@endsection