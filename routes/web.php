<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/event/index', 'EventsController@index');

Route::get('/', 'EventsController@index');
Route::get('/event/new', 'EventsController@new');
Route::post('/event/create', 'EventsController@create');
Route::get('/event/show/{id}', 'EventsController@show');
Route::get('/event/createTask/{id}', 'EventsController@create_tasks');
Route::post('/event/addTask/{id}', 'EventsController@add_tasks');
Route::get('/task/auction/{id}', 'TasksController@auction');
Route::post('/task/bid/{id}', 'TasksController@bid');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');