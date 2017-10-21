@extends('layouts.app')

@section('content')
<div class="row">
    <form method="POST" action="/minifigs/{{ $minifig->id }}" enctype="multipart/form-data" class="ml-auto mr-auto">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        @include('errors.form')

        @include('minifigs._form')

        <div class="form-group row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-block" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <form method="POST" action="/minifigs/{{ $minifig->id }}" class="ml-auto mr-auto">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div class="form-group row">
            <div class="col-md-12">
                <button class="btn btn-danger btn-link" type="submit">Delete (including images)</button>
            </div>
        </div>
    </form>
</div>
 @stop
