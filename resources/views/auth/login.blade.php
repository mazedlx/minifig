@extends('layouts.app')

@section('content')

<form method="POST" action="/login" class="ml-auto mr-auto col-md-4">
    {{ csrf_field() }}
    <div class="form-group row">
        <label class="sr-only" for="email">Email</label>
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-envelope-o"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" autofocus required>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="sr-only" for="password">Password</label>
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </div>
</form>
@stop
