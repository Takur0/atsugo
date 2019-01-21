<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Event;
use App\Task;
use Auth;

class EventsController extends Controller
{
  //

  public function index(){
    $events = Event::where('id', '>=', 1)->latest()->get();
    return view('events.index')->with('events', $events);
  }

  public function new(){
    return view('events.new')->with('now', Carbon::now()->toDateString());
  }

  public function create(Request $request){
    $event = new Event();
    $event->title = $request->title;
    $event->eventer_id = Auth::user()->id;
    $event->held_at = $request->held_at;
    $event->is_bided_by_all = 0;
    $event->save();
    return redirect('/');
  }

  public function show($id){
    $event = Event::where('id', $id)->first();
    $tasks = Task::where('event_id', $id)->get();
    return view('events.show')->with('event', $event)->with('tasks', $tasks);
  }

  public function create_tasks($id){
    $event = Event::where('id', $id)->first();
    $tasks = Task::where('event_id', $id)->get();
    return view('events.createTasks')->with('event', $event)->with('tasks', $tasks);
  }

  public function add_tasks(Request $request, $id){
    $event = Event::where('id', $id)->first();
    $task = new Task();
    $task->title = $request->title;
    $task->description = $request->description;
    $task->event_id = $id;
    $task->save();
    $tasks = Task::where('event_id', $id)->get();
    return view('events.createTasks')->with('event', $event)->with('tasks', $tasks);
  }


}