@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card mb-4">
        <div class="card-header">
        	<div class="event-title">
        		{{$event->title}} 
        	</div>
        </div>
        <div class="p-3">
          <p class="pb-2">タスク一覧</p>

          @foreach ($tasks as $task)
          <a href="/task/auction/{{$task->id}}">
            <div class="task-list">
              <span class="task">{{$task->title}}:</span>
              &nbsp;&nbsp;
              {{$task->description}}
            </div>
          </a>
          @endforeach

        </div>
      </div>  

      <div>
        <a class="add-tasks-button-link" href="/event/createTask/{{$event->id}}">
          <div class="add-tasks-button"><span class="brand-plus">+</span> タスクを追加</div>
        </a>
        <!-- 金額を追加するページ -->
        <a class="add-money-button-link" href="#">
          <div class="add-money-button"><span class="brand-plus">+</span> 金額を追加</div>
        </a>
      <div>

      <!-- 金額を表示するページ　-->
      <div class="display-money">
        <div class="display-money-amount">
          <div>イベント総額</div>
          <div class="display-money-show">総額を表示</div>
        </div>
        <div class="display-money-pay">
          <div>あなたが支払う金額</div>
          <div class="display-money-show">支払金額を表示</div>
        </div>
      </div>


    </div>
  </div>
</div>

@endsection
