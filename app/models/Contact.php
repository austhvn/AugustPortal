<?php

class Contact extends Eloquent {

	public static $rules = array(
		'first_name'=>'required|alpha|min:2',
		'last_name'=>'required|alpha|min:2',
		'email'=>'required|email|unique:contacts',
		'client_id'=>'required'
	);

	public function client()
	{
		return $this->belongsTo('Client');
	}

	public function projects()
	{
		return $this->hasMany('Project');
	}

}