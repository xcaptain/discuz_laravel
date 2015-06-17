<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');
Route::get('/thread-{tid}-{page}.html', 'ThreadController@show')
    ->where(['tid' => '^[1-9]\d*', 'page' => '^[1-9]\d*']);
Route::get('/forum-{fid}-{page}.html', 'ForumController@show')
    ->where(['fid' => '[0-9]+', 'page' => '^[1-9]\d*']);