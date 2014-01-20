<?php

class ContactController extends BaseController {

	public function getIndex()
	{
		$contacts = Contact::all();
		return View::make('contacts.showall')->with('contacts', $contacts);
	}

	public function getNew()
	{
		$clients = array();
		foreach (Client::all() as $client)
		{
			$clients[$client->id] = $client->name;
		}

		return View::make('contacts.new')->with('clients', $clients);
	}

	public function postNew()
	{
		$validator = Validator::make(Input::all(), Contact::$rules);
		if($validator->passes())
		{
			$contact = new Contact;
			$contact->first_name = Input::get('first_name');
			$contact->last_name = Input::get('last_name');
			$contact->email = Input::get('email');
			$contact->client_id = Input::get('client_id');
			$contact->save();

			$m = 'Created new contact: '.$contact->first_name.' '.$contact->last_name;
			return Redirect::to('contacts')->with('message', $m);
		} else {
			return Redirect::to('contacts/new')
				->with('message', 'You did not fill out the required information.')
				->withErrors($validator)
				->withInput();
		}
	}
}