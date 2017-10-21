@extends('layouts.app')
@section('title', 'Lego Minifigs')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <img class="card-img-top" src="{{ url("/storage/{$latestMinifig->images->first()->filename}") }}" alt="{{ $latestMinifig->name }}">
            <div class="card-header">
                Latest Minifig
            </div>
            <div class="card-body">
                <h4 class="card-title">{{ $latestMinifig->name }}</h4>
                <a href="/minifigs/{{ $latestMinifig->id }}" class="btn btn-primary">Show {{ $latestMinifig->name }}</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <img class="card-img-top" src="{{ url("/storage/{$latestSet->filename}") }}" alt="{{ $latestSet->name }}">
            <div class="card-header">
                Latest Set
            </div>

            <div class="card-body">
                <h4 class="card-title">{{ $latestSet->name }}</h4>
                <a href="/sets/{{ $latestSet->id }}" class="btn btn-primary">Show {{ $latestSet->name }}</a>
            </div>
        </div>
    </div>
</div>
@stop
