@extends('layouts.master')

@section('content')
	<h1>Clients</h1>
	<p>{{ HTML::link('clients/new', 'Add a Client', array('class'=>'btn btn-large btn-default')) }}</p>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Contacts</th>
				<th>Project Requests</th>
			</tr>
		</thead>
		<tbody>
			@foreach($clients as $client)
			<tr>
				<td>{{ $client->id }}</td>
				<td>{{ $client->name }}</td>
				<td>{{ count($client->contacts) }}</td>
				<td>{{ count($client->requests) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop