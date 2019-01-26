<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Join;

class Event extends Model
{
    //
    public function eventer(){
      return $this->belongsTo('App\User', 'eventer_id', 'id');
    }

    public function tasks(){
      return $this->hasMany('App\Task', 'event_id', 'id');
    }

    public function count_members(){
      $count = Join::where('event_id', $this->id)->count();
      return $count;
    }
}
