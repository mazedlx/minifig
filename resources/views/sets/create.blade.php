@extends('layouts.app')
@section('title', 'Sets')

@section('content')
<div class="row">
    <form action="/sets" method="POST" enctype="multipart/form-data" class="ml-auto mr-auto">
        {{ csrf_field() }}

    	@include('errors.form')

        @include('sets._form')

        <div class="form-group row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Create</button>
            </div>
        </div>
    </form>
</div>
 @stop

