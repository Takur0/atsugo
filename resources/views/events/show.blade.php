@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-4">
          <div class="card-header">{{$event->title}}  イベンター:{{$event->eventer->screen_name}}</div>
          @foreach ($tasks as $task)
          <p><a href="/task/auction/{{$task->id}}">{{$task->title}}</a> {{$task->description}}</p>
          @endforeach
      </div>  
      <a class="add-tasks-button-link" href="/event/createTask/{{$event->id}}"><div class="add-tasks-button"><span class="brand-plus">+</span> タスクを追加</div></a>
    </div>
  </div>
</div>

@endsection