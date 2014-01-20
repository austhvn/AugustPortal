<?php

class RequestController extends BaseController {

	public function getIndex()
	{
		return View::make('requests.home');
	}

	public function getNew()
	{
		$contacts = array();
		foreach(Contact::all() as $c)
		{
			$contacts[$c->id] = $c->first_name.' '.$c->last_name;
		}
		return View::make('requests.new')->with('contacts', $contacts);
	}

	public function postNew()
	{
		$input = Input::all();
		foreach($input as $k=>$v)
		{
			switch($k)
			{
				case 'title':
				case 'due_date':
				case 'contact_id':
				case 'retainer':
					$validate[$k] = $v;
					unset($input[$k]);
				break;
			}
		}
		$details = serialize($input);
		error_log(print_r($validate,1));
		$validator = Validator::make($validate, Request::$rules);
		if($validator->passes())
		{
			$request = new Request;
			$request->status = 'submitted';
			$request->title = Input::get('title');
			$request->due_date = Input::get('due_date');
			$request->contact_id = Input::get('requestor');
			$request->retainer = Input::get('retainer');

			$request->details = $details;
			$request->save();

			$m = 'Created new request for: '.$request->title;
			return Redirect::to('requests')->with('message', $m);
		} else {
			return Redirect::to('requests/new')
				->with('message', 'You did not fill out all of the required information')
				->withErrors($validator)
				->withInput();
		}
	}
}