<?php
class ProjectRequest extends Eloquent {

	public static $rules = array(
		'title'=>'required',
		'due_date'=>'required',
		'client_id'=>'required',
		'contact_id'=>'required',
		'retainer'=>'required'
	);

	public function contact()
	{
		return $this->belongsTo('Contact');
	}

	public function client()
	{
		return $this->belongsTo('Client');
	}

}