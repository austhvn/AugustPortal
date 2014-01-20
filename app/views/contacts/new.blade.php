@extends('layouts.master')

@section('content')
	<h1 style="margin-bottom: 30px">Create Contact</h1>

	@if(count($errors) > 0)
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif

	{{ Form::open() }}
		<div class="form-group">
			{{ Form::label('first_name', 'First Name') }}
			{{ Form::text('first_name', null, array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('last_name', 'Last Name') }}
			{{ Form::text('last_name', null, array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email Address') }}
			{{ Form::text('email', null, array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('client_id', 'Company') }}
			{{ Form::select('client_id', $clients, null, array('class'=>'form-control')) }}
		</div>
		{{ Form::submit('Add Contact', array('class'=>'btn btn-large btn-primary btn-block')) }}
	{{ Form::close() }}
@stop