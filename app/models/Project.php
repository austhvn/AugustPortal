<?php
class Project extends \Eloquent {

	public static $rules = array(
		'title'=>'required',
		'due_date'=>'required',
		'contact_id'=>'required',
		'retainer'=>'required'
	);

	public function contact()
	{
		return $this->belongsTo('Contact');
	}

}