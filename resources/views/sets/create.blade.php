@extends('layouts.app')
@section('title', 'Sets')

@section('content')
<div class="row">
{!!Form::open(['route' => 'sets.store', 'class' => 'form form-horizontal', 'method' => 'POST', 'files' => true]) !!}
	@include('errors.form')
	@include('sets._form')
{!!Form::close()!!}
</div>
 @stop

