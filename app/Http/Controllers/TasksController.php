<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Bid;
use Auth;

class TasksController extends Controller
{
  //
  public function auction($id){
    $task = Task::where('id', $id)->first();
    return view('tasks.auction')->with('task', $task);
  }

  public function bid(Request $request, $id){
    $bid = new Bid;
    $bid->bidder_id = Auth::user()->id;
    $bid->task_id = $id;
    $bid->amount = $request->amount;
    $bid->save();

    $task = Task::where('id', $id)->first();
    if($task->bids->count() == $task->event->count_members()){
      $task->is_bided_by_all = true;
      $task->bidder_id = $task->user()->id;
      $task->amount = $task->salary();
      $task->save();
    }

    $tasks = Task::where('event_id', $task->event->id)->get();
    return redirect()->action(
      'EventsController@show', 
      ['id' => $task->event->id]
    );
  }
}
