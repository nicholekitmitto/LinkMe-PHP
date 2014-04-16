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

/*Route::controller('users', 'UsersController');*/
Route::get('users/register', 'UsersController@getRegister');

Route::get('users/create', 'UsersController@getCreate');

Route::get('users/login', 'UsersController@getLogin');

Route::post('users/signin', 'UsersController@postSignin');

Route::get('users/{id}/dashboard', 'UsersController@getDashboard');

Route::get('users/logout', 'UsersController@getLogout');

Route::get('users/{id}/show', 'UsersController@getShow');
