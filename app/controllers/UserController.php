<?php

class UserController extends BaseController
{
	public function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}

	public function getRegister()
	{
		return View::make('users.new');
	}

	public function getSignin()
	{
		return View::make('users.login');
	}

	public function getSignout()
	{
		Auth::logout();
		return Redirect::to('users/signin')->with('message', 'You have signed out!');
	}

	public function getDashboard()
	{
		return View::make('users.dashboard');
	}

	public function postSignin()
	{
		if(Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password'))))
		{
			return Redirect::to('users/dashboard')->with('message', 'Logged in!');
		} else {
			return Redirect::to('users/signin')
				->with('message', 'Your email/password combination was incorrect.')
				->withInput();
		}
	}

	public function postCreate()
	{
		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->passes()) {
			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			$m = 'Created new user: '.$user->first_name.' '.$user->last_name;
			return Redirect::to('users/signin')->with('message', $m);
		} else {
			return Redirect::to('users/register')->with('message', 'You did not complete your information to my satisfaction.')->withErrors($validator)->withInput();
		}
	}
}
