<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public function eventer(){
      return $this->belongsTo('App\User', 'eventer_id', 'id');
    }

    public function tasks(){
      return $this->hasMany('App\Task', 'event_id', 'id');
    }
}
