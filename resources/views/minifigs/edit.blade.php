@extends('layouts.master')
@section('title', 'Minifigs')

@section('content')
<div class="row">
{!! Form::model($minifig, ['route' => ['minifigs.update', $minifig->id], 'method' => 'PATCH', 'class' => 'form form-horizontal', 'files' => true]) !!}
    @include('errors.form')

	@include('minifigs._form',['labelSubmitButton' => 'Edit'])
{!!Form::close()!!}
</div>
<div class="row">
{!! Form::open(['route' => ['minifigs.destroy', $minifig->id], 'method' => 'DELETE', 'class' => 'form form-horizontal']) !!}
	<div class="form-group">
		<div class="col-md-6 col-md-offset-2">
		{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
		</div>
	</div>
{!! Form::close() !!}
</div>
 @stop
