<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    public $timestamps = false;
    //
    public function event(){
      return $this->belongsTo('App\Event', 'event_id', 'id');
    }

}
