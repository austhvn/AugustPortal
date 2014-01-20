@extends('layouts.master')

@section('content')
	<h1>Clients</h1>
	<p>{{ HTML::link('clients/new', 'Add a Client') }}</p>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Contacts</th>
			</tr>
		</thead>
		<tbody>
			@foreach($clients as $client)
			<tr>
				<td>{{ $client->id }}</td>
				<td>{{ $client->name }}</td>
				<td>{{ count($client->contacts) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop