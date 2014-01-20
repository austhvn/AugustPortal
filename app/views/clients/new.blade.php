@extends('layouts.master')

@section('content')
	{{ Form::open() }}
		<h1>Create Client</h1>

		@if(count($errors) > 0)
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif

		<div class="form-group">
			{{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Company Name')) }}
		</div>

		{{ Form::submit('Add Client', array('class'=>'btn btn-large btn-primary btn-block')) }}
	{{ Form::close() }}
@stop