@extends('layouts.master')

@section('content')
	<h1>Dashboard</h1>

	<div class="col-sm-9 panel panel-default">
		<p>TODO: Dashboard Main Content Area</p>
	</div>

	<dv class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Random Data</h3>
			</div>
			<ul class="list-group">
				<li class="list-group-item"><span class="badge">{{ count(User::all()) }}</span>Users</li>
				<li class="list-group-item"><span class="badge">{{ count(Client::all()) }}</span>Clients</li>
				<li class="list-group-item"><span class="badge">{{ count(Contact::all()) }}</span>Contacts</li>
				<li class="list-group-item"><span class="badge">TODO</span>Requests</li>
			</ul>
		</div>
	</div>
@stop