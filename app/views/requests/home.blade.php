@extends('layouts.master')

@section('content')
	<h1>Requests</h1>
	<p>{{ HTML::link('requests/new', 'Start a New Project', array('class'=>'btn btn-large btn-default')) }}</p>

	<table class="table">
		<thead>
			<tr>
				<th>Project Title</th>
				<th>Due Date</th>
				<th>Client</th>
				<th>Requestor</th>
				<th>In Retainer?</th>
			</tr>
		</thead>
		<tbody>
			@foreach($requests as $request)
			<tr>
				<td>{{ $request->title }}</td>
				<td>{{ $request->due_date }}</td>
				<td>{{ $request->client->name }}</td>
				<td>{{ $request->contact->first_name }} {{ $request->contact->last_name }}</td>
				<td>{{ $request->retainer }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@stop