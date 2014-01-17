@extends('layouts.master')

@section('content')
	{{ Form::open(array('url'=>'users/signin')) }}
		<h1>Login</h1>

		@if(count($errors) > 0)
		<div class="alert alert-warning">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<div class="form-group">
			{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
		</div>
		<div class="form-group">
			{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		</div>

		{{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block')) }}
	{{ Form::close() }}
@stop