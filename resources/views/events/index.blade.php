@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @foreach ($events as $event)
      <div class="card mb-4">
          <div class="card-header"><a href="/event/show/{{$event->id}}">{{$event->title}}</a>  イベンター:{{$event->eventer->screen_name}}</div>
          <div></div>
      </div>  
      @endforeach
    </div>
  </div>
</div>
@endsection