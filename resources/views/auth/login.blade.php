@extends('layouts.master')
@section('title', 'Login')
@section('content')
<div class="row">
    <div class="col-md-6">
    {!! Form::open(array('url' => '/auth/login', 'class' => 'form form-horizontal')) !!}
    <div class="form-group">
        {!! Form::label('email', 'Username', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-6">
            {!! Form::text('email', '', array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'Username')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password', array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-6">
            {!! Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')) !!}
        </div>
    </div>

    <button type="submit" class="btn btn-default">Login</button>
    {!! Form::close() !!}
    </div>
</div>
 @stop


