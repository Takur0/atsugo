@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-4">
          <div class="card-header h4">{{$event->title}}</div>
            <p class="p-3 h6">タスク一覧</p>
            @foreach ($tasks as $task)
              <p class="p-3"><span class="h5">{{$task->title}}:</span>
              &nbsp;&nbsp;
              {{$task->description}}
            </p>
            @endforeach

          </div>  
      <form method="POST" action="/event/addTask/{{$event->id}}">
        @csrf

        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('タスク名') }}</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('タスクの説明') }}</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description" value="" required>

                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="text-center pt-4">
            <button type="submit" class="btn btn-primary pl-5 pr-5 pt-2 pb-2">
                {{ __('Create') }}
            </button>
            <div>
                <a href="/event/show/{{$event->id}}" class="btn btn-primary mt-4 pl-5 pr-5 pt-2 pb-2 event-back">イベントページに戻る</a>
            </div>
        </div>
        
        </form>
    </div>
  </div>
</div>
@endsection