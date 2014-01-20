@extends('layouts.master')

@section('content')
	<h1>Contacts</h1>
	<p>{{ HTML::link('contacts/new', 'Add a Contact') }}</p>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email Address</th>
				<th>Company</th>
			</tr>
		</thead>
		<tbody>
			@foreach($contacts as $contact)
			<tr>
				<td>{{ $contact->id }}</td>
				<td>{{ $contact->first_name }}</td>
				<td>{{ $contact->last_name }}</td>
				<td>{{ $contact->email }}</td>
				<td>{{ $contact->client->name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop