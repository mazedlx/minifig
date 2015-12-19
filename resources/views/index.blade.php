@extends('layouts.master')
@section('title', 'Lego Minifigs')

@section('content')
<h3>{{ $minifigs }} Minifigs (with {{ $images }} images) in {{ $sets }} Sets</h3>
@endsection