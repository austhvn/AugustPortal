@extends('layouts.master')

@section('content')
	<h1>New Project Request</h1>

	<div class="panel panel-default">
		<div class="panel-body">
			{{ Form::open() }}

			<div class="form-group">
				{{ Form::label('title', 'Project Title') }}
				{{ Form::text('title', null, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('due_date', 'Final Due Date') }}
				{{ Form::text('due_date', null, array('class'=>'form-control', 'placeholder'=>'YYYY-MM-DD')) }}
			</div>
			<div class="form-group">
				{{ Form::label('contact_id', 'Requestor') }}
				{{ Form::select('contact_id', $contacts, null, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('retainer', 'In Retainer?') }}
				<label>
				{{ Form::radio('retainer', 'yes', array('class'=>'form-control')) }} Yes</label>
				<label>
				{{ Form::radio('retainer', 'no', array('class'=>'form-control')) }} No</label>
			</div>

			<div class="form-group">
				{{ Form::label('extra_data1', 'Another Field') }}
				{{ Form::text('extra_data1', null, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('extra_data2', 'Notes') }}
				{{ Form::textarea('extra_data2', null, array('class'=>'form-control')) }}
			</div>

			{{ Form::submit('Add Contact', array('class'=>'btn btn-large btn-primary btn-block')) }}

			{{ Form::close() }}
		</div>
	</div>
@stop