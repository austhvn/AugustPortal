<?php
class ProjectRequestController extends BaseController {
	public function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth');
	}

	public function getIndex()
	{
		$requests = ProjectRequest::all();
		return View::make('requests.home')->with('requests', $requests);
	}

	public function getNew()
	{
		$contacts = array();
		foreach(Contact::all() as $c)
		{
			$contacts[$c->id] = $c->first_name.' '.$c->last_name;
		}
		$clients = array();
		foreach(Client::all() as $cl)
		{
			$clients[$cl->id] = $cl->name;
		}
		return View::make('requests.new', array('contacts'=>$contacts, 'clients'=>$clients));
	}

	public function postNew()
	{
		$input = Input::all();
		foreach($input as $k=>$v)
		{
			switch($k)
			{
				case '_token':
				case 'title':
				case 'due_date':
				case 'contact_id':
				case 'client_id':
				case 'retainer':
					$req_arr[$k] = $v;
					unset($input[$k]);
				break;
			}
		}
		$details = serialize($input);
		$req_arr['details'] = $details;
		// error_log(print_r($req_arr,1));

		$validator = Validator::make($req_arr, ProjectRequest::$rules);
		if($validator->passes())
		{
			$request = new ProjectRequest;
			$request->status = 'submitted';
			$request->title = Input::get('title');
			$request->due_date = Input::get('due_date');
			$request->contact_id = Input::get('contact_id');
			$request->client_id = Input::get('client_id');
			$request->retainer = Input::get('retainer');

			$request->details = $req_arr['details'];
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

	public function getView()
	{
		return 'TODO: View Requests';
	}

}