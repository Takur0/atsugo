@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">{{$task->title}} </div>
            </div>  
        <form method="POST" action="/task/bid/{{$task->id}}">
          @csrf
  
          <div class="form-group row">
              <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('落札価格') }}</label>
  
              <div class="col-md-6">
                  <input id="amount" type="number" class="form-control" name="amount" value="{{ old('amount') }}" required autofocus>
  
                  @if ($errors->has('amount'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('amount') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
  
          <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('OK') }}
                  </button>
  
              </div>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection