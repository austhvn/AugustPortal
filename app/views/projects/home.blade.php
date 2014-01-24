@extends('layouts.master')

@section('content')
	<h1>Projects</h1>
	<p>{{ HTML::link('projects/new', 'Start a New Project', array('class'=>'btn btn-large btn-default')) }}</p>

	<table class="table">
		<thead>
			<tr>
				<th>Project Title</th>
				<th>Due Date</th>
				<th>Requestor</th>
				<th>In Retainer?</th>
			</tr>
		</thead>
		<tbody>
			@foreach($projects as $project)
			<tr>
				<td>{{ $project->title }}</td>
				<td>{{ $project->due_date }}</td>
				<td>{{ $project->contact->first_name }} {{ $project->contact->last_name }}</td>
				<td>{{ $project->retainer }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@stop