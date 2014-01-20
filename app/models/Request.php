<?php

class Request extends Eloquent {

	public static $rules = array(
		'title'=>'required',
		'due_date'=>'required',
		'contact_id'=>'required',
		'retainer'=>'required'
	);

	public function requestor()
	{
		return $this->belongsTo('Contact');
	}

}