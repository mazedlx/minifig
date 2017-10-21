@extends('layouts.app')

@section('content')
<div class="row">
    <form method="POST" action="/minifigs" enctype="multipart/form-data" class="ml-auto mr-auto">
        {{ csrf_field() }}

        @include('errors.form')

        @include('minifigs._form')

        <div class="form-group row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-block" type="submit">Create</button>
            </div>
        </div>
    </form>
</div>
 @stop
