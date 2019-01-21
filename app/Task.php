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
      $bids = $this->bids();
      $lowest_amount = $bids->min('amount');
      $lowest_bids = Bid::where('amount', $lowest_amount)->get();
      if($lowest_bids->count() == 1){
        return User::where("id", $lowest_bids->bidder_id)->first();
      } else {
        return User::where("id", $lowest_bids->bidder_id)->first();
      } 
    }
}
