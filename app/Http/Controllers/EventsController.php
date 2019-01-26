<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Event;
use App\Task;
use App\Join;
use Auth;
use DateTime;

class EventsController extends Controller
{
  //

  public function index(){
    $events = Event::where('id', '>=', 1)->latest()->get();
    return view('events.index')->with('events', $events);
  }

  public function new(){
    $users = User::where('id', '>=', 1)->get();
    return view('events.new')->with('now', Carbon::now()->toDateString())->with('users', $users);
  }

  public function create(Request $request){
    $event = new Event();
    $event->title = $request->title;
    $event->eventer_id = Auth::user()->id;
    $event->held_at = $request->held_at;
    $event->is_ended = false;
    $event->save();
    $user = Auth::user();
    $join = new Join();
    $join->event_id = $event->id;
    $join->joiner_id = $user->id;
    $join->save();
    foreach($request->members as $added_member){
      $user = User::where('screen_name', $added_member)->first();
      if($user->id == Auth::user()->id){
        continue;
      }
      $join = new Join();
      $join->event_id = $event->id;
      $join->joiner_id = $user->id;
      $join->save();
    }
    return redirect('/');
  }

  public function show($id){
    $event = Event::where('id', $id)->first();
    $tasks = Task::where('event_id', $id)->get();
    $date = new DateTime($event->held_at);
    $date_string = $date->format('m/d');
    return view('events.show')->with('event', $event)->with('tasks', $tasks)->with('date', $date_string);
  }

  public function create_tasks($id){
    $event = Event::where('id', $id)->first();
    $tasks = Task::where('event_id', $id)->get();
    $date = new DateTime($event->held_at);
    $date_string = $date->format('m/d');
    return view('events.createTasks')->with('event', $event)->with('tasks', $tasks)->with('date', $date_string);
  }

  public function add_tasks(Request $request, $id){
    $event = Event::where('id', $id)->first();
    $task = new Task();
    $task->title = $request->title;
    $task->description = $request->description;
    $task->event_id = $id;
    $task->is_bided_by_all = false;
    $task->save();
    $tasks = Task::where('event_id', $id)->get();
    $date = new DateTime($event->held_at);
    $date_string = $date->format('m/d');
    return view('events.createTasks')->with('event', $event)->with('tasks', $tasks)->with('date', $date_string);
  }
}
