<?php

class Client extends Eloquent {

	public static $rules = array(
		'name'=>'required|min:2',
	);

	public function contacts()
	{
		return $this->hasMany('Contact');
	}

}