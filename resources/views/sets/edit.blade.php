@extends('layouts.app')
@section('title', 'Sets')

@section('content')
<div class="row">
    <form action="/sets/{{ $set->id }}" method="POST" enctype="multipart/form-data" class="ml-auto mr-auto">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        @include('errors.form')

        @include('sets._form')

        <div class="form-group row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <form method="POST" action="/sets/{{ $set->id }}" class="ml-auto mr-auto">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div class="form-group row">
            <div class="col-md-12">
                <button class="btn btn-danger btn-link" type="submit">Delete (including all related minifigs and images)</button>
            </div>
        </div>
    </form>
</div>
 @stop

