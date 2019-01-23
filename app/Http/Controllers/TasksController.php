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
      $event = $task->event;
      $tasks = Task::where('event_id', $event->id)->get();
      return view('events.show')->with('event', $event)->with('tasks', $tasks);
    }
    
}
