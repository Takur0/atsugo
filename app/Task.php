<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bid;
use App\User;

class Task extends Model
{
    //
    public function event(){
      return $this->belongsTo('App\Event', 'event_id', 'id');
    }

    public function bids(){
      return $this->hasMany('App\Bid', 'task_id', 'id');
    }
    
    public function user(){
      $bids = $this->hasMany('App\Bid', 'task_id', 'id');
      $lowest_amount = $bids->min('amount');
      $lowest_bids = Bid::where('amount', $lowest_amount)->where('task_id', $this->id)->first();
      return User::where("id", $lowest_bids->bidder_id)->first();
    }

    public function salary(){
      $bids = $this->hasMany('App\Bid', 'task_id', 'id');
      $lowest_amount = $bids->min('amount');
      return $lowest_amount;
    }
}
