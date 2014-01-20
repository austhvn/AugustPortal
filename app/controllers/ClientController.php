<?php

class ClientController extends BaseController
{
	public function getIndex()
	{
		$clients = Client::all();
		return View::make('clients.showall')->with('clients', $clients);
	}

	public function getNew()
	{
		return View::make('clients.new');
	}

	public function postNew()
	{
		$validator = Validator::make(Input::all(), Client::$rules);
		if($validator->passes())
		{
			$client = new Client;
			$client->name = Input::get('name');
			$client->save();

			$m = 'Created new client: '.$client->name;
			return Redirect::to('clients')->with('message', $m);
		} else {
			return Redirect::to('clients/new')
				->with('message', 'You did not fill out the required information.')
				->withErrors($validator)
				->withInput();
		}
	}
}