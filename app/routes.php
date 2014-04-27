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

Route::filter('isOwnUser', function()
{
    if (Route::Input('id') != Auth::user()->id) {
        return Redirect::to('users/' . Auth::user()->id . '/dashboard')
        ->with('message', "Sorry! You don't have permissions to view that page!");
    }
});

Route::get('users/register', 'UsersController@getRegister');

Route::post('users/create', 'UsersController@postCreate');

Route::get('users/login', 'UsersController@getLogin');

Route::post('users/signin', 'UsersController@postSignin');

Route::get('users/{id}/dashboard', 'UsersController@getDashboard');

Route::get('users/logout', 'UsersController@getLogout');

Route::get('users/{id}/show', 'UsersController@getShow');

Route::get('users/{id}/sendlink', 'UsersController@getSendLink');

Route::post('users/{id}/links/create', 'LinksController@postCreate');

Route::get('users/index', 'UsersController@getIndex');

Route::post('users/{id}/links/{linkid}/viewed', 'LinksController@postViewed');

Route::post('users/{id}/links/viewed', 'LinksController@postAllViewed');

Route::get('users/{id}/dashboardviewed', 'UsersController@getDashboardViewed');

Route::get('users/{id}/updateprofile', 'UsersController@getUpdate');

Route::post('users/{id}/update', 'UsersController@postUpdate');

Route::get('users/{id}/links/{linkid}/view', 'LinksController@getVisitAndViewed');

Route::get('migrate', function() {
  Artisan::call('migrate');
});
