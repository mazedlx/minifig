@extends('layouts.master')
@section('title', 'Minifigs')
@section('content')
<div class="row">
{!!Form::open(['route' => ['minifigs.store'], 'class' => 'form form-horizontal', 'method' => 'POST', 'files' => true]);!!}
    @include('errors.form')
	@include('_minifig', ['labelSubmitButton' => 'Create', 'images' => false])
{!!Form::close()!!}
</div>
 @stop
