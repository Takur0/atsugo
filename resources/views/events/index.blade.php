@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    <div id="event-list">
    　<div class="event-list-h">
    　	参加中のイベント
    　</div>
      @foreach ($events as $event)
      	<div class="card mb-4">
         	 <a href="/event/show/{{$event->id}}">
          		<div class="card-header">
					<div class="event-title">{{$event->title}}</div>
					<div class="event-eventer"> イベンター:{{$event->eventer->screen_name}}</div>
				</div>
         	 </a> 
      	</div>  
      @endforeach
      </div>
      <a href="http://127.0.0.1:8000/event/new" class="dropdown-item">
      <div class="add-tasks-button"><span class="brand-plus">+</span> 新規イベント</div>
                                    </a>
    </div>
  </div>
</div>
@endsection