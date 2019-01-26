@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-4">
          <div class="card-header">{{$event->title}}  イベンター:{{$event->eventer->screen_name}}
            <a href="#" class="del" data-id="{{ $event->id }}">delete</a>
            <form method="post" action="/event/destroy/{{$event->id}}" id="form_{{ $event->id }}">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form>
          </div>
          @foreach ($tasks as $task)
            <p><a href="/task/auction/{{$task->id}}">{{$task->title}}</a> {{$task->description}}</p>
          @endforeach
      </div>
      <a class="add-tasks-button-link" href="/event/createTask/{{$event->id}}"><div class="add-tasks-button"><span class="brand-plus">+</span> タスクを追加</div></a>
    </div>
  </div>
</div>
@endsection