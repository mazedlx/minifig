@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
      @if($minifig->images->count())
        <img class="card-img-top" src="{{ url("/storage/{$minifig->images()->first()->filename}") }}" alt="{{ $minifig->name }}">
      @endif
        <h4 class="card-header">{{ $minifig->name }} <a href="{{ url("/minifigs/{$minifig->id}/edit") }}" class="btn btn-default">Edit</a></h4>
        <div class="card-body">

          <p class="card-text">Belongs to <a href="/sets/{{ $minifig->set_id }}">{{ $minifig->set->name }}</a>.</p>

          <p class="card-text">
          @foreach($images as $image)
              <img src="{{ url("/storage/{$image->filename}") }}" class="rounded" width="200px">
          @endforeach
          </p>
      </div>
  </div>
</div>
@stop

