@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('イベントを作ろう！') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ url('/event/create') }}">
              @csrf
              <div class="form-group row">
                  <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('イベントの名前') }}</label>
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
                <label for="search-user" class="col-md-4 col-form-label text-md-right">{{ __('招待するメンバー') }}</label>

                <div class="col-md-6">
                  <input id="search-user" type="text" class="form-control" name="search-user" placeholder="メンバーのIDを入力して追加してください" required>

                  @if ($errors->has('search-user'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('search-user') }}</strong>
                    </span>
                  @endif
                  <div class="search-result__hit-num mt-3"></div>
                  <div id="search-result__list"></div>
                  <div id="added-members" class="p-2"></div>
                  <div id="added-inputs"></div>
                </div>
              </div>

              <div class="form-group row">
                  <label for="held_at" class="col-md-4 col-form-label text-md-right">{{ __('開催する日時') }}</label>
                  <div class="col-md-6">
                      <input id="held_at" type="date" class="form-control" name="held_at" value="{{$now}}" required>
                      @if ($errors->has('held_at'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('held_at') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Create') }}
                      </button>

                  </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<table class="hidden　all-users-table">
  <tbody>
    @foreach ($users as $user)
      <tr>
        <td class="user-id">{{$user->id}}</td>
        <td class="user-screen_name">{{$user->screen_name}}</td>
      </tr>  
    @endforeach
  </tbody>
</table>
@endsection