<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showInputMatrix');
Route::post('/', 'HomeController@calculateMatrix');
Route::get('get', 'HomeController@showGet');
Route::get('json', 'HomeController@showJson');
Route::get('all', 'HomeController@showAll');
