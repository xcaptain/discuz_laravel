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

Carbon::setLocale(config('app.locale')); //设置中文语言

Route::get('/', function () {
    if (Auth::user()) {
        return redirect('/home');
    } else {
        return redirect('/welcome');
    }
});

Route::get('/home', 'HomeController@index');
Route::get('/welcome', 'WelcomeController@index');

Route::get('/thread-{tid}-{page}.html', 'ThreadController@show')
    ->where(['tid' => '^[1-9]\d*', 'page' => '^[1-9]\d*']);
Route::get('/thread/create/{fid}', 'ThreadController@create')
    ->where(['fid' => '[1-9]+']);
Route::post('/thread', 'ThreadController@store');


Route::get('/forum.php', 'ForumController@index');
Route::get('/forum-{fid}-{page}.html', 'ForumController@show')
    ->where(['fid' => '[0-9]+', 'page' => '^[1-9]\d*']);


Route::get('/hispage-{uid}-{typeid}-{page}.html', 'HispageController@index')
    ->where(['uid' => '[0-9]+', 'typeid' => '[0|1]', 'page' => '^[1-9]\d*']);


Route::get('/auth/login/', 'Auth\AuthController@getLogin');
Route::post('/auth/login/', 'Auth\AuthController@postLogin');
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');
Route::get('/auth/logout/', 'Auth\AuthController@getLogout');
