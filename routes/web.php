<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','HomeController@welcome');

//用户登录注册路由组
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/projects','ProjectsController');

Route::resource('/tasks','TasksController');

Route::post('tasks/{id}/check',['as'=>'tasks.check','uses'=>'TasksController@check']);
