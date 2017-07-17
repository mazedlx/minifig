@extends('layouts.app')
@section('title', 'Lego Minifigs')

@section('content')
<h3>{{ $minifigs }} Minifigs (with {{ $images }} images) in {{ $sets }} Sets</h3>
<div class="row">
    <div class="col-md-6">
        <h4>Latest Minifig: {{ $latestMinifig->name }}</h4>
        <a href="{{ url()->to('minifigs/' . $latestMinifig->id) }}">
        @if($latestMinifig->images->first())
            <img src="{{ url()->to('/storage/' . $latestMinifig->images->first()->filename) }}" class="img img-thumbnail" width="300px">
        @else
            No Image
        @endif
        </a>
    </div>
    <div class="col-md-6">
        <h4>Latest Model: {{ $latestSet->name }} ({{ $latestSet->number }})</h4>
        <a href="{{ url()->to('sets/' . $latestSet->id) }}">
        @if($latestSet->filename)
            <img src="{{ url()->to('/storage/' . $latestSet->filename) }}" class="img img-thumbnail" width="300px">
        @else
            No Image
        @endif
        </a>
    </div>
</div>
 @stop
