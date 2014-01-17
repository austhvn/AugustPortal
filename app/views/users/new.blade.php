@extends('layouts.master')

@section('content')
	{{ Form::open(array('url'=>'users/create')) }}
		<h1>Create User</h1>

		@if(count($errors) > 0)
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif

		<div class="form-group">
			{{ Form::text('first_name', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}
		</div>
		<div class="form-group">
			{{ Form::text('last_name', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
		</div>
		<div class="form-group">
			{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
		</div>
		<div class="form-group">
			{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		</div>
		<div class="form-group">
			{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
		</div>

		{{ Form::submit('Create', array('class'=>'btn btn-large btn-primary btn-block')) }}
	{{ Form::close() }}
@stop