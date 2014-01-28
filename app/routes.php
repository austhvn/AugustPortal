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

Route::get('/', function()
{
	// return View::make('hello');
	if(!Auth::check())
	{
		return View::make('users.login');
	} else {
		return View::make('users.dashboard');
	}
});

Route::controller('users', 'UserController');
Route::controller('clients', 'ClientController');
Route::controller('contacts', 'ContactController');
Route::controller('requests', 'ProjectRequestController');
