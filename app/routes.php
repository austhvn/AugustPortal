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
	return View::make('hello');
});

Route::controller('users', 'UserController');

Route::get('clients', function()
{
	return 'TODO: Clients';
});
Route::get('contacts', function()
{
	return 'TODO: Contacts';
});
Route::get('requests', function()
{
	return 'TODO: Requests';
});