@extends('layouts.master')
@section('title', 'Lego Minifigs')

@section('content')
<h3>{{ $minifigs }} Minifigs (with {{ $images }} images) in {{ $sets }} Sets</h3>
<div class="row">
    <div class="col-md-6">
        <h4>Latest Minifig: {{ $latest_minifig->name }}</h4>
        <a href="{{ url()->to('minifigs/' . $latest_minifig->id) }}"><img src="{{ url()->to('uploads/' . $latest_minifig->images->first()->filename) }}" class="img img-thumbnail" width="300px"></a>
    </div>
    <div class="col-md-6">
        <h4>Latest Model: {{ $latest_set->name }} ({{ $latest_set->number }})</h4>
        <a href="{{ url()->to('sets/' . $latest_set->id) }}"><img src="{{ url()->to('uploads/' . $latest_set->filename) }}" class="img img-thumbnail" width="300px"></a>
    </div>
</div>
 @stop
