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
Route::get('/', function()
{
  if (Auth::check()) {
    return Redirect::to('users/' . Auth::user()->id . '/dashboard');
  } else {
    return Redirect::to('users/login');
  }
});

Route::get('users/register', 'UsersController@getRegister');

Route::post('users/create', 'UsersController@postCreate');

Route::get('users/login', 'UsersController@getLogin');

Route::post('users/signin', 'UsersController@postSignin');

Route::get('users/{id}/dashboard', 'UsersController@getDashboard');

Route::get('users/logout', 'UsersController@getLogout');

Route::get('users/{id}/show', 'UsersController@getShow');

Route::post('users/{id}/links/create', 'LinksController@postCreate');

Route::get('users/index', 'UsersController@getIndex');
