@extends('layouts.master')

@section('content')
	<h1>Requests</h1>
	<div class="btn-group">
		{{ HTML::link('requests/new', 'Start A New Request', array('class'=>'btn btn-large btn-default')) }}
		{{ HTML::link('#', 'View Saved Requests', array('class'=>'btn btn-large btn-default')) }}
	</div>
@stop