<?php
use App\Services\Twitter;
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
// app()->singleton('twitter',function(){
//     return new \App\Services\Twitter('fjhfhjfd');
// });


// Route::get('/', function(Twitter $twitter){
//     dd($twitter);
// });


Route::get('/', 'PagesController@home');


Route::get('/contact', 'PagesController@contact');

Route::get('/about', 'PagesController@about');

Route::get('/projects', 'ProjectsController@index');

Route::get('/projects/create', 'ProjectsController@create');

Route::get('/projects/{project}', 'ProjectsController@show');

Route::post('/projects', 'ProjectsController@store');

Route::get('/projects/{project}/edit', 'ProjectsController@edit');

Route::patch('/projects/{project}', 'ProjectsController@update');

Route::delete('/projects/{project}', 'ProjectsController@destroy');

Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
