<?php
class ProjectController extends BaseController {
	public function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth');
	}

	public function getIndex()
	{
		$projects = Project::all();
		return View::make('projects.home')->with('projects', $projects);
	}

	public function getNew()
	{
		$contacts = array();
		foreach(Contact::all() as $c)
		{
			$contacts[$c->id] = $c->first_name.' '.$c->last_name;
		}
		return View::make('projects.new')->with('contacts', $contacts);
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
				case 'retainer':
					$req_arr[$k] = $v;
					unset($input[$k]);
				break;
			}
		}
		$details = serialize($input);
		$req_arr['details'] = $details;
		error_log(print_r($req_arr,1));

		$validator = Validator::make($req_arr, Project::$rules);
		if($validator->passes())
		{
			$request = new Project;
			$request->status = 'submitted';
			$request->title = Input::get('title');
			$request->due_date = Input::get('due_date');
			$request->contact_id = Input::get('contact_id');
			$request->retainer = Input::get('retainer');

			$request->details = $req_arr['details'];
			$request->save();

			$m = 'Created new request for: '.$request->title;
			return Redirect::to('projects')->with('message', $m);
		} else {
			return Redirect::to('projects/new')
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