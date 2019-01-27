@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card mb-4">
        <div class="card-header">
          <div class="event-title">{{$event->title}} </div>
        </div>
        <div class="p-3">
          <p class="pb-2">タスク一覧</p>

          @foreach ($tasks as $task)
            @if (App\Bid::where('bidder_id', Auth::user()->id)->where('task_id', $task->id)->get() == '[]')
              <a href="/task/auction/{{$task->id}}">
                <div class="task-list">
                  <span class="task">{{$task->title}}:</span>
                  &nbsp;&nbsp;
                  {{$task->description}}
                </div>
              </a>
            @else
            <div class="task-list">
                  <span class="task">{{$task->title}}:</span>
                  &nbsp;&nbsp;
                  {{$task->description}}
                  @if ($task->is_bided_by_all)
                    {{$task->user()->screen_name}}によって 落札されました！
                  @else
                      
                  @endif
                </div>
            @endif
          @endforeach

        </div>
      </div>  

      <div>
        <a class="add-tasks-button-link" href="/event/createTask/{{$event->id}}">
          <div class="add-tasks-button"><span class="brand-plus">+</span>タスクを追加</div>
        </a>
        <!-- 金額を追加するページ -->
        <a class="add-money-button-link" href="/event/addCost/{{$event->id}}">
			<div class="add-money-button"><center><span class="brand-plus">+</span><span class="plus-sentence">金額を追加</span></center></div>
        </a>
      <div>

      <!-- 金額を表示するページ　-->
      <div class="display-money">
        <div class="display-money-amount">
          <div>費用の合計</div>
          <div class="display-money-show"><span>¥{{$costs->sum('amount')+$tasks->sum('amount')}}</span></div>
        </div>
        <div class="display-money-pay">
          <div>あなたが支払う金額</div>
          <div class="display-money-show"><span>¥{{( ($costs->sum('amount')+$tasks->sum('amount'))/$event->count_members() ) - App\Task::where('event_id', $event->id)->where('bidder_id', Auth::user()->id)->sum('amount') - App\Cost::where('event_id', $event->id)->where('contributor_id', Auth::user()->id)->sum('amount') }}</span></div>
        </div>
      </div>
      <center>
		<a href="#" class="del" data-id="{{ $event->id }}">イベントを消去</a>
          <form method="post" action="/event/destroy/{{$event->id}}" id="form_{{ $event->id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
          </form>
	</center>
    </div>
  </div>
</div>
@endsection